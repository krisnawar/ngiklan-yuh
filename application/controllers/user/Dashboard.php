<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends User_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('number');
        $this->load->model('user/dashboard_model');
    }

    function index() {
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        
        $user_login   = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

        $user_id = $user_login["id"];

        $this->data['iklans'] = $this->dashboard_model->show_iklan_by_user_id($user_id);

        $this->data['jumlah_iklan'] = $this->dashboard_model->count_iklan($user_id);
        $this->data['iklan_diajukan'] = $this->dashboard_model->count_iklan_by_status($user_id,'0');
        $this->data['iklan_tayang'] = $this->dashboard_model->count_iklan_by_status($user_id,'4');
        $this->data['iklan_menunggu_persetujuan'] = $this->dashboard_model->count_iklan_by_status($user_id,'2');

        //model / dashobiard model

        $this->template->user_render('user/dashboard/index', $this->data);
        //admin render = library/template
    }

    function profil() {
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, 'Info Profil', 'user/dashboard/profil');
        $this->breadcrumbs->unshift(2, 'Lihat Profil', 'user/dashboard/profil');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->template->user_render('user/dashboard/profil', $this->data);
        //admin render = library/template
    }

    function ubah_profil() {

        $this->form_validation->set_rules('namadepan', 'Nama Depan', 'trim|required|alpha');
        $this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'trim|required|alpha');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('notelpon', 'Nomor Telpon', 'required|numeric|regex_match[/^[0-9]+$/]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show(); 
            $this->breadcrumbs->unshift(1, 'Info Profil', 'user/dashboard/profil');           
            $this->breadcrumbs->unshift(2, 'Ubah Profil', 'user/dashboard/profil');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->template->user_render('user/dashboard/ubah_Profil', $this->data);
        //admin render = library/template
        }
        else {
            $this->dashboard_model->ubahprofil();
            $this->session->set_flashdata('flash_berhasil' , 'Profil Berhasil Diubah');
            redirect('userdashboard', 'refresh');
        }
    }

    function ajukan_iklan() {

        $this->form_validation->set_rules('nama_iklan', 'Nama Iklan', 'required');
        $this->form_validation->set_rules('desc_iklan', 'Deskripsi iklan', 'required');

        $this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'required');
        $this->form_validation->set_rules('nama_pj', 'Nama Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan Penanggung Jawab', 'required');
        $this->form_validation->set_rules('alamat_pj', 'Alamat Penanggung Jawab', 'required');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telpon Penanggung Jawab', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->breadcrumbs->unshift(1, 'Ajukan Iklan', 'user/dashboard/ajukan_iklan');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['iklans'] = $this->dashboard_model->show_all('paket_iklan');

            $this->template->user_render('user/dashboard/ajukan_iklan', $this->data);
        //admin render = library/template
        }
        else {

            if ($_FILES['desc_file_iklan']['name']) {

                $ekstensi = $_FILES['desc_file_iklan']['name'];
                $ekstensi = explode('.', $ekstensi);
                $ekstensi = strtolower(end($ekstensi));

                $namaFileBaru = uniqid();
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensi;

                $this->data['ekstensi'] = $ekstensi;
                $this->data['namaFileBaru'] = $namaFileBaru;

                $config['upload_path']        = './upload/desc_iklan/';
                $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf|txt';
                $config['file_name']          = $namaFileBaru;
                $config['max_size']           = 2048;

                $this->load->library('upload', $config);


                if ($this->upload->do_upload('desc_file_iklan')) {

                    //FUNGSI YG DI GUNAKAN

                 $cek = $this->dashboard_model->cek_organisasi();
                 if ($cek == 1) {
                    $id_pj = $this->dashboard_model->ambil_id_organisasi();
                    $this->dashboard_model->ajukan_iklan($id_pj,$namaFileBaru);

                    $this->session->set_flashdata('flash_berhasil' , 'Iklan berhasil diajukan.');//berhasil dengan file
                    redirect('userdashboard', 'refresh');

                }
                else {
                    $id_pj = $this->dashboard_model->upload_organisasi();
                    $id_pj = $this->dashboard_model->ambil_id_organisasi();
                    $this->dashboard_model->ajukan_iklan($id_pj,$namaFileBaru);

                    $this->session->set_flashdata('flash_berhasil' , 'Iklan berhasil diajukan.');//berhasil dengan file dan upload
                    redirect('userdashboard', 'refresh');
                }
            }
            else {
                $this->session->set_flashdata('flash_gagal' , 'Iklan Gagal Diajukan');
                redirect('ajukaniklan', 'refresh');
            }
        }

        else {
            $namaFileBaru = "";

            $cek = $this->dashboard_model->cek_organisasi();
            if ($cek == 1) {
                $id_pj = $this->dashboard_model->ambil_id_organisasi();
                $this->dashboard_model->ajukan_iklan($id_pj,$namaFileBaru);

                $this->session->set_flashdata('flash_berhasil' , 'Iklan berhasil diajukan.');//berhasil tanpa file
                redirect('userdashboard', 'refresh');

            }
            else {
                $id_pj = $this->dashboard_model->upload_organisasi();
                $id_pj = $this->dashboard_model->ambil_id_organisasi();
                $this->dashboard_model->ajukan_iklan($id_pj,$namaFileBaru);

                $this->session->set_flashdata('flash_berhasil' , 'Iklan berhasil diajukan.');//berhasil tanpa file dan upload
                redirect('userdashboard', 'refresh');
            }
        }
    }
}

function informasi_paket() {

    $this->page_title->push(lang('menu_dashboard'));
    $this->data['pagetitle'] = $this->page_title->show();
    $this->breadcrumbs->unshift(1, 'Tentang Iklan', 'user/dashboard/informasi_paket');
    $this->breadcrumbs->unshift(2, 'Informasi Paket', 'user/dashboard/informasi_paket');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['pakets'] = $this->dashboard_model->show_all('paket_iklan');

    $this->template->user_render('user/dashboard/informasi_Paket', $this->data);
        //admin render = library/template

}

function status_iklan() {

    $this->page_title->push(lang('menu_dashboard'));
    $this->data['pagetitle'] = $this->page_title->show();
    $this->breadcrumbs->unshift(1, 'Tentang Iklan', 'user/dashboard/status_iklan');
    $this->breadcrumbs->unshift(2, 'Status Iklan', 'user/dashboard/status_iklan');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $user_login   = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);

    $user_id = $user_login["id"];

    $this->data['iklans'] = $this->dashboard_model->show_iklan_by_user_id($user_id);

    $this->template->user_render('user/dashboard/status_iklan', $this->data);
        //admin render = library/template

}

function lihat_status_iklan($id_iklan) {

    $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required|regex_match[/^[0-9]+$/]');
    if ($this->form_validation->run() == FALSE) {

        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, 'Tentang Iklan', 'user/dashboard/status_iklan');
        $this->breadcrumbs->unshift(2, 'Status Iklan', 'user/dashboard/status_iklan');
        $this->breadcrumbs->unshift(3, 'Lihat Status Iklan', 'user/dashboard/lihat_status_iklan/'.$id_iklan);
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['iklan'] = $this->dashboard_model->show_iklan_by_id($id_iklan);

        $this->data['bayars'] = $this->dashboard_model->show_bayar_by_id_iklan($id_iklan);

        $this->data['siars'] = $this->dashboard_model->show_siar_by_id_iklan($id_iklan);


        $iklan = $this->dashboard_model->show_iklan_by_id($id_iklan);



        $pj = $iklan["id_pj"];
        $this->data['pj'] = $this->dashboard_model->show_one_data_by_id('penanggungjawab',$pj,'id_pj');

        if ($iklan["id_paket"] == 0) {
            $paket = $iklan["id_nego"];
            $this->data['paket'] = $this->dashboard_model->show_one_data_by_id('nego_iklan',$paket,'id_nego');
            $this->data['jenis_paket'] = 'nego';
            $this->template->user_render('user/dashboard/lihat_status_iklan', $this->data);
        }
        else{
            $paket = $iklan["id_paket"];
            $this->data['paket'] = $this->dashboard_model->show_one_data_by_id('paket_iklan',$paket,'id_paket');
            $this->data['jenis_paket'] = 'paket';
            $this->template->user_render('user/dashboard/lihat_status_iklan', $this->data);
        }

    }
    else {
        $ekstensi = $_FILES['bukti_pembayaran']['name'];
        $ekstensi = explode('.', $ekstensi);
        $ekstensi = strtolower(end($ekstensi));

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensi;

        $this->data['ekstensi'] = $ekstensi;
        $this->data['namaFileBaru'] = $namaFileBaru;

        $config['upload_path']        = './upload/bukti_bayar/';
        $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
        $config['file_name']          = $namaFileBaru;
        $config['max_size']           = 2048;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $this->dashboard_model->upload_bayar_iklan($id_iklan,$namaFileBaru);
            $this->session->set_flashdata('flash_berhasil' , 'Pembayaran Berhasil Ditambahkan');
            redirect('userdashboard', 'refresh');
        }
        else {
            $this->session->set_flashdata('flash_gagal' , 'Pembayaran Gagal Ditambahkan');
            redirect('userdashboard', 'refresh');
        }



    }
        //admin render = library/template

}
function download_deskripsi($namafile) {

    $this->load->helper('download');
    force_download( 'upload/desc_iklan/'. $namafile,NULL);
}

function download_mou($namafile) {

    $this->load->helper('download');
    force_download( 'upload/mou/'. $namafile,NULL);
}
function download_bukti_bayar($namafile) {

    $this->load->helper('download');
    force_download( 'upload/bukti_bayar/'. $namafile,NULL);
}

function download_bukti_siar($namafile) {

    $this->load->helper('download');
    force_download( 'upload/bukti_siar/'. $namafile,NULL);
}

function batalkan_iklan($id_iklan) {
    $this->dashboard_model->ubahiklan($id_iklan,'6');
    $this->session->set_flashdata('flash_berhasil' , 'Iklan berhasil dibatalkan');
    redirect('statusiklan', 'refresh');
}
function Lanjutkan_iklan($id_iklan) {
    $this->dashboard_model->ubahiklan($id_iklan,'2');
    $this->session->set_flashdata('flash_berhasil' , 'iklan berhasil dilanjutkan');
    redirect('statusiklan', 'refresh');
}




function mou($id_iklan) {


    $this->data['iklan'] = $this->dashboard_model->show_iklan_by_id($id_iklan);

    $iklan = $this->dashboard_model->show_iklan_by_id($id_iklan);

    if ($iklan["id_paket"] == 0) {

        $this->form_validation->set_rules('periode_iklan_bulan', 'Ini ', 'required');
        $this->form_validation->set_rules('periode_iklan_hari', 'Ini ', 'required');
        $this->form_validation->set_rules('frekuensi_nego', 'Ini ', 'required');
        $this->form_validation->set_rules('bonus_nego', 'Ini ', 'required');
        $this->form_validation->set_rules('durasi_nego', 'Ini ', 'required');
        $this->form_validation->set_rules('harga_nego', 'Ini ', 'required|numeric');
        $this->form_validation->set_rules('upload_mou', 'Ini ', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();

            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->template->user_render('user/dashboard/mou', $this->data);

        }
        else {
            $ekstensi = $_FILES['upload_mou']['name'];
            $ekstensi = explode('.', $ekstensi);
            $ekstensi = strtolower(end($ekstensi));

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensi;

            $this->data['ekstensi'] = $ekstensi;
            $this->data['namaFileBaru'] = $namaFileBaru;

            $config['upload_path']        = './upload/mou/';
            $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
            $config['file_name']          = $namaFileBaru;
            $config['max_size']           = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('upload_mou')) {

                $id_pj = $this->dashboard_model->upload_nego();
                $id_nego = $this->dashboard_model->ambil_id_nego();

                $this->dashboard_model->update_iklan($id_iklan,$namaFileBaru,$id_nego);
                $this->session->set_flashdata('flash_berhasil' , 'MOU Berhasil Ditambahkan');
                //redirect('userdashboard', 'refresh');
            }
            else {
                $this->session->set_flashdata('flash_gagal' , 'MOU Gagal Ditambahkan');
                //redirect('userdashboard', 'refresh');
            }

        }
    }
    else {
        $this->form_validation->set_rules('periode_iklan_bulan', 'Ini ', 'required');
        $this->form_validation->set_rules('periode_iklan_hari', 'Ini ', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();

            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->template->user_render('user/dashboard/mou', $this->data);

        }
        else {
            $ekstensi = $_FILES['upload_mou']['name'];
            $ekstensi = explode('.', $ekstensi);
            $ekstensi = strtolower(end($ekstensi));

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensi;

            $this->data['ekstensi'] = $ekstensi;
            $this->data['namaFileBaru'] = $namaFileBaru;

            $config['upload_path']        = './upload/mou/';
            $config['allowed_types']      = 'jpg|png|jpeg|doc|docx|pdf';
            $config['file_name']          = $namaFileBaru;
            $config['max_size']           = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('upload_mou')) {

                $this->dashboard_model->update_iklan($id_iklan,$namaFileBaru);
                $this->session->set_flashdata('flash_berhasil' , 'MOU Berhasil Ditambahkan');
                redirect('userdashboard', 'refresh');
            }
            else {
                $this->session->set_flashdata('flash_gagal' , 'MOU Gagal Ditambahkan');
                redirect('userdashboard', 'refresh');
            }



        }
    }
    
        //admin render = library/template

}
function bukti_siar($id_iklan) {
    $this->form_validation->set_rules('nama_bukti_siar', 'Ini ', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->template->user_render('user/dashboard/bukti_siar', $this->data);
    }
    else {

        $ekstensi = $_FILES['upload_bukti']['name'];
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
        if ($this->upload->do_upload('upload_bukti')) {

            $this->dashboard_model->upload_bukti_siar($id_iklan,$namaFileBaru);
            $this->session->set_flashdata('flash_berhasil' , 'Bukti Siar Berhasil Ditambahkan');
            redirect('userdashboard', 'refresh');
        }
        else {
            $this->session->set_flashdata('flash_gagal' , 'Bukti Siar Gagal Ditambahkan');
            redirect('userdashboard', 'refresh');
        }


    }
}

function cara_mengajukan_iklan() {

    $this->page_title->push(lang('menu_dashboard'));
    $this->data['pagetitle'] = $this->page_title->show();

    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->template->user_render('user/dashboard/cara_mengajukan_iklan', $this->data);

}

}