<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs->unshift(1, lang('menu_iklan'), '#');
        $this->load->model('admin/iklan_model');
        $this->data['pagetitle']            = $this->page_title->show();
    }

    function index()
    {

    }    

    function pengajuan_iklan()
    {
        $this->page_title->push(lang('menu_iklan_pengajuan'));
        $this->breadcrumbs->unshift(2, lang('menu_iklan_pengajuan'), 'admin/iklan/pengajuan_iklan');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['iklan_diajukan']       = $this->iklan_model->get_iklan('diajukan');
        $this->template->admin_render('admin/iklan/pengajuan_iklan.php', $this->data);
    }

    function show_pengajuan($id)
    {
        $this->page_title->push(lang('menu_iklan_tampilkan'));
        $this->breadcrumbs->unshift(4, lang('menu_iklan_tampilkan'), 'admin/iklan/show_pengajuan/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['detail_iklan']         = $this->iklan_model->get_iklan('diajukan', $id);
        $this->template->admin_render('admin/iklan/show_pengajuan.php', $this->data);
    }

    function semua_iklan()
    {
        $this->page_title->push(lang('menu_iklan_semua'));
        $this->breadcrumbs->unshift(3, lang('menu_iklan_semua'), 'admin/iklan/show_all/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['iklan_all']            = $this->iklan_model->get_iklan('all');
        $this->template->admin_render('admin/iklan/show_all.php', $this->data);
    }

    function show_iklan($id)
    {
        $this->page_title->push(lang('menu_iklan_tampilkan'));
        $this->breadcrumbs->unshift(4, lang('menu_iklan_tampilkan'), 'admin/iklan/show_iklan/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['detail_iklan']         = $this->iklan_model->get_iklan('all', $id);
        $this->template->admin_render('admin/iklan/show_iklan.php', $this->data);
    }

    function show_proses($id)
    {
        $this->page_title->push(lang('menu_iklan_tampilkan'));
        $this->breadcrumbs->unshift(4, lang('menu_iklan_tampilkan'), 'admin/iklan/show_proses/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['detail_iklan']         = $this->iklan_model->get_iklan('all', $id);
        $this->data['cek_bayar']            = $this->iklan_model->cek_bayar($id);
        $this->data['bayars']               = $this->iklan_model->show_bayar_by_id_iklan($id);

        //$iklan = $this->dashboard_model->show_iklan_by_id($id);

        if ($this->data['detail_iklan']->row()->id_paket == 0) 
        {
            $this->form_validation->set_rules('periode_iklan_bulan', 'Periode Iklan (Bulan)', 'required');
            $this->form_validation->set_rules('periode_iklan_hari', 'Periode Iklan (Hari)', 'required');
            $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
            $this->form_validation->set_rules('frekuensi_nego', 'Frekuensi', 'required');
            $this->form_validation->set_rules('bonus_nego', 'Bonus', 'required');
            $this->form_validation->set_rules('durasi_nego', 'Durasi', 'required');
            $this->form_validation->set_rules('harga_nego', 'Harga', 'required|numeric');
            //$this->form_validation->set_rules('upload_mou', 'Upload Mou', 'required');


            if ($this->form_validation->run() == FALSE) 
            {
                $this->template->admin_render('admin/iklan/show_proses.php', $this->data);
            }
            else 
            {
                $ekstensi = $_FILES['upload_mou']['name'];
                $ekstensi = explode('.', $ekstensi);
                $ekstensi = strtolower(end($ekstensi));

                $namaFileBaru = uniqid() . '_MOU_' . $this->data['detail_iklan']->row()->nama_iklan .'_'. $this->data['detail_iklan']->row()->username;
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensi;

                $this->data['ekstensi'] = $ekstensi;
                $this->data['namaFileBaru'] = $namaFileBaru;

                $config['upload_path']        = './upload/mou/';
                $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
                $config['file_name']          = $namaFileBaru;
                $config['max_size']           = 4096;

                $this->load->library('upload', $config);
                $update = $this->iklan_model->set_status($id, 'do_upload');
                if ($this->upload->do_upload('upload_mou') && $update) {

                    $this->iklan_model->upload_nego();
                    $id_nego = $this->iklan_model->ambil_id_nego();

                    $this->iklan_model->update_iklan_nego($id, $namaFileBaru, $id_nego);
                    $this->iklan_model->get_tgl($id);
                    $this->session->set_flashdata('flash_berhasil' , 'Berhasil upload MoU');
                    redirect('admin/iklan/proses_iklan', 'refresh');
                }
                else {
                    $this->session->set_flashdata('flash_gagal' , 'Gagal Upload MoU');
                    //redirect('userdashboard', 'refresh');
                }

            }
        }
        elseif ($this->data['detail_iklan']->row()->id_paket > 0)
        {
            $this->form_validation->set_rules('periode_iklan_bulan', 'Ini ', 'required');
            $this->form_validation->set_rules('periode_iklan_hari', 'Ini ', 'required');
            $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
            //$this->form_validation->set_rules('upload_mou', 'Upload Menu', 'required');

            if ($this->form_validation->run() == FALSE) 
            {

                $this->template->admin_render('admin/iklan/show_proses.php', $this->data);

            }
            else 
            {
                $ekstensi = $_FILES['upload_mou']['name'];
                $ekstensi = explode('.', $ekstensi);
                $ekstensi = strtolower(end($ekstensi));

                $namaFileBaru = uniqid() . '_MOU_' . $this->data['detail_iklan']->row()->nama_iklan .'_'. $this->data['detail_iklan']->row()->username;
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensi;

                $this->data['ekstensi'] = $ekstensi;
                $this->data['namaFileBaru'] = $namaFileBaru;

                $config['upload_path']        = './upload/mou/';
                $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
                $config['file_name']          = $namaFileBaru;
                $config['max_size']           = 4096;

                $this->load->library('upload', $config);
                $update = $this->iklan_model->set_status($id, 'do_upload');
                if ($this->upload->do_upload('upload_mou') && $update)
                {
                    $this->iklan_model->update_iklan($id, $namaFileBaru);
                    $this->iklan_model->get_tgl($id);
                    $this->session->set_flashdata('flash_berhasil' , 'Berhasil Upload MoU');
                    redirect('admin/iklan/proses_iklan', 'refresh');
                }
                else {
                    $this->session->set_flashdata('flash_gagal' , 'Gagal Upload MoU');
                    //redirect('userdashboard', 'refresh');
                }
            }
        }        
    }

    function hapus_Paket_Iklan($id)
    {
        $this->iklan_model->hapus_paket_iklan($id);
        redirect('admin/iklan/lihat_paket', 'refresh');
    }

    function show_tayang($id)
    {
        $this->page_title->push(lang('menu_iklan_tampilkan'));
        $this->breadcrumbs->unshift(4, lang('menu_iklan_tampilkan'), 'admin/iklan/show_proses/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['detail_iklan']         = $this->iklan_model->get_iklan('all', $id);
        $this->data['cek_bayar']            = $this->iklan_model->cek_bayar($id);
        $this->data['bayars']               = $this->iklan_model->show_bayar_by_id_iklan($id);

        if ($this->data['detail_iklan']->row()->kode_iklan == NULL && $this->data['detail_iklan']->row()->status_iklan == 4 && $this->data['detail_iklan']->row()->mou != NULL)
        {
            $this->form_validation->set_rules('kode_iklan', 'Kode Iklan ', 'required');
            //$this->form_validation->set_rules('bukti_siar', 'Bukti Siar ', 'required');

            if ($this->form_validation->run() == FALSE) 
            {
                $this->template->admin_render('admin/iklan/show_tayang.php', $this->data);
            }
            else
            {
                $set_kode = $this->iklan_model->set_kode($id);

                $ekstensi = $_FILES['bukti_siar']['name'];
                $ekstensi = explode('.', $ekstensi);
                $ekstensi = strtolower(end($ekstensi));

                $namaFileBaru = uniqid();
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensi;

                $this->data['ekstensi'] = $ekstensi;
                $this->data['namaFileBaru'] = $namaFileBaru;

                $config['upload_path']        = './upload/bukti_siar/';
                $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
                $config['file_name']          = $namaFileBaru;
                $config['max_size']           = 2048;

                $this->load->library('upload', $config);

                if ($set_kode && $this->upload->do_upload('bukti_siar'))
                {
                    $this->iklan_model->upload_bukti_siar($id, $namaFileBaru);
                    $this->session->set_flashdata('flash_berhasil' , 'Kode Berhasil & bukti siar berhasil diupdate');
                    redirect('admin/iklan/iklan_tayang', 'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flash_gagal' , 'Gagal Mengubah Kode Iklan');
                    redirect('admin/iklan/iklan_proses', 'refresh');
                }
            }
        }
        else
        {
            $this->template->admin_render('admin/iklan/show_tayang.php', $this->data);
        }
    }

    function tambah_paket()
    {
        $this->page_title->push(lang('menu_iklan_tambah'));
        $this->breadcrumbs->unshift(3, lang('menu_iklan_tambah'), 'admin/iklan/tambah_paket/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $this->form_validation->set_rules('kategori_paket', 'Kategori Paket', 'required');
        $this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required');
        $this->form_validation->set_rules('frekuensi_paket', 'Frekuensi Iklan', 'required');
        $this->form_validation->set_rules('bonus_paket', 'Bonus', 'required');
        $this->form_validation->set_rules('durasi_paket', 'Durasi Paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['berhasil'] = $this->session->flashdata('berhasil');
            $this->template->admin_render('admin/iklan/tambah_paket.php', $this->data);
        }
        if ($this->form_validation->run() == TRUE && $this->iklan_model->tambah_paket_iklan()) {
            redirect('admin/iklan/tambah_paket', 'refresh');
        }
    }

    function lihat_paket()
    {
        $this->page_title->push(lang('menu_iklan_lihat_paket'));
        $this->breadcrumbs->unshift(3, lang('menu_iklan_lihat_paket'), 'admin/iklan/lihat_paket/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $this->data['iklans'] = $this->iklan_model->lihat_paket_iklan();

        $this->template->admin_render('admin/iklan/lihat_paket.php', $this->data);
    }

    function ubah_Paket_Iklan($id_paket)
    {
        $this->page_title->push(lang('menu_ubah_paket'));
        $this->breadcrumbs->unshift(3, lang('menu_ubah_paket'), 'admin/iklan/lihat_paket/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        
        $this->form_validation->set_rules('kategori_paket', 'Kategori Paket', 'required');
        $this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required');
        $this->form_validation->set_rules('frekuensi_paket', 'Frekuensi Iklan', 'required');
        $this->form_validation->set_rules('bonus_paket', 'Bonus', 'required');
        $this->form_validation->set_rules('durasi_paket', 'Durasi Paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['berhasil'] = $this->session->flashdata('berhasil');
            $this->data['paket'] = $this->iklan_model->show_by_id($id_paket);
            $this->template->admin_render('admin/iklan/ubah_paket.php', $this->data);
        }
        if ($this->form_validation->run() == TRUE && $this->iklan_model->ubah_Paket_Iklan($id_paket)) {
            redirect('admin/iklan/ubah_Paket_Iklan/'.$id_paket, 'refresh');
        }
    }

    function proses_iklan()
    {
        $this->page_title->push(lang('menu_iklan_diproses'));
        $this->breadcrumbs->unshift(3, lang('menu_iklan_diproses'), 'admin/iklan/proses_iklan/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['iklan_proses']         = $this->iklan_model->get_iklan_and_bayar(); 
        $this->template->admin_render('admin/iklan/iklan_proses.php', $this->data);
    }

    function iklan_tayang()
    {
        $this->page_title->push(lang('menu_iklan_tayang'));
        $this->breadcrumbs->unshift(3, lang('menu_iklan_tayang'), 'admin/iklan/iklan_tayang/#');
        $this->data['pagetitle']            = $this->page_title->show();
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->data['iklan_tayang']            = $this->iklan_model->get_iklan('tayang');
        $this->template->admin_render('admin/iklan/iklan_tayang.php', $this->data);
    }

    function lanjut_proses($id)
    {
        $this->iklan_model->lanjut_proses($id);
        redirect('admin/iklan/proses_iklan', 'refresh');
    }

    function download($identifier, $namafile)
    {
        $this->load->helper('download');
        force_download('upload/'.$identifier. '/' .$namafile, NULL);
    }

    function accept($id)
    {
        $update = $this->iklan_model->set_status($id, 'accept');
        if($update)
        {
            redirect('admin/iklan/pengajuan_iklan', 'refresh');
        }
        else
        {
            redirect('admin/iklan/show_pengajuan' . $id, 'refresh');
        }
    }

    function decline($id)
    {
        $update = $this->iklan_model->set_status($id, 'decline');
        if($update)
        {
            redirect('admin/iklan/pengajuan_iklan', 'refresh');
        }
        else
        {
            redirect('admin/iklan/show_pengajuan' . $id, 'refresh');
        }
    }

}
