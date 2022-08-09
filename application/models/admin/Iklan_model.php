<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_iklan($identifier, $id = NULL)
    {
        $this->db->select('iklan.*, users.username, penanggungjawab.*');
        $this->db->select('paket_iklan.*, nego_iklan.*');
        $this->db->from('iklan');
        $this->db->join('users', 'users.id = iklan.id_user');
        $this->db->join('penanggungjawab', 'iklan.id_pj = penanggungjawab.id_pj');
        $this->db->join('paket_iklan', 'iklan.id_paket = paket_iklan.id_paket', 'left');        
        $this->db->join('nego_iklan', 'iklan.id_nego = nego_iklan.id_nego', 'left');        
        if($id)
        {            
            $this->db->select('users.phone');
            //if ($identifier == 'diajukan')
            //{
                $this->db->where('(iklan.id_iklan)', $id);
            //}
        }
        if ($identifier == 'all')
        {
            
        }
        if ($identifier == 'proses')
        {
            $this->db->where("((iklan.status_iklan = 2) OR (iklan.status_iklan = 3))");
        }
        if ($identifier == 'tayang')
        {
            $this->db->where("iklan.status_iklan = 4");
        }
        if ($identifier == 'diajukan')
        {            
            $this->db->where("((iklan.status_iklan = 0) OR (iklan.status_iklan = 1))");
        }
        $query = $this->db->get();
        return $query;
    }

    function show_bayar_by_id_iklan($id) 
    {
        return $this->db->get_where('bayar',array('id_iklan' => $id ))->result_array();
    }

    function get_iklan_and_bayar()
    {
        $this->db->select('iklan.*, users.username, penanggungjawab.*');
        $this->db->select('paket_iklan.*, nego_iklan.*, bayar.id_bayar');
        $this->db->from('iklan');
        $this->db->join('users', 'users.id = iklan.id_user');
        $this->db->join('penanggungjawab', 'iklan.id_pj = penanggungjawab.id_pj');
        $this->db->join('paket_iklan', 'iklan.id_paket = paket_iklan.id_paket', 'left');        
        $this->db->join('nego_iklan', 'iklan.id_nego = nego_iklan.id_nego', 'left');
        $this->db->join('bayar', 'bayar.id_iklan = iklan.id_iklan', 'left');
        $this->db->group_by('id_iklan');
        $this->db->where("((iklan.status_iklan = 2) OR (iklan.status_iklan = 3))");
        $query = $this->db->get();
        return $query;
    }

    function cek_bayar($id)
    {
        $this->db->where('id_iklan', $id);
        $this->db->from('bayar');
        return $this->db->count_all_results();
    }

    function set_kode($id)
    {
        $kode = $this->input->post('kode_iklan',true);
        $this->db->set('kode_iklan', $kode);
        $this->db->where('id_iklan', $id);
        $this->db->update('iklan');
        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function upload_bukti_siar ($id_iklan,$namaFileBaru) 
    {
        $data = [
            "id_iklan" => $id_iklan,
            "nama_bukti_siar" => 'Bukti Siar '.$this->data['detail_iklan']->row()->nama_iklan,
            "bukti_siar" => $namaFileBaru
        ];
        $this->db->insert('siar', $data);
    }

    function set_status($id, $identifier)
    {
        if ($identifier == 'accept')
        {
            $this->db->set('status_iklan', 1, FALSE);
        }
        elseif ($identifier == 'decline')
        {
            $this->db->set('status_iklan', 6, FALSE);
        }
        elseif ($identifier == 'do_upload')
        {
            $this->db->set('status_iklan', 3, FALSE);
        }
        $this->db->where('id_iklan', $id);
        $this->db->update('iklan');
        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function tambah_paket_iklan()
    {
         $data = [
            "kategori_paket"    => $this->input->post('kategori_paket',true),
            "jenis_paket"       => $this->input->post('jenis_paket',true),
            "frekuensi_paket"   => $this->input->post('frekuensi_paket',true),
            "bonus_paket"       => $this->input->post('bonus_paket',true),
            "durasi_paket"      => $this->input->post('durasi_paket',true),
            "harga_paket"       => $this->input->post('harga_paket',true),
            "status_paket"      => $this->input->post('status_paket',true)
            ];
        $this->db->insert('paket_iklan', $data);
        if ($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('berhasil', 'Paket berhasil ditambahkan');
            return TRUE;
        }
        else
        {
            $this->session->set_flashdata('message', 'Paket gagal ditambahkan');
            return FALSE;
        }
    }

    public function hapus_paket_iklan ($id_paket)
    {
        $data = [
            "status_paket" => '0'
        ];

        $this->db->where('id_paket',$id_paket);
        $this->db->update('paket_iklan', $data);
    }


    public function ubah_Paket_Iklan ($id_paket)
    {
        $this->tambah_paket_iklan();
        $this->hapus_paket_iklan($id_paket);
        if ($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('berhasil', 'Data Paket berhasil diubah');
            return TRUE;
        }
        else
        {
            $this->session->set_flashdata('message', 'Data paket gagal diubah');
            return FALSE;
        }
    }

    function lihat_paket_iklan()
    {
        return $this->db->get_where('paket_iklan',array('status_paket' => 1))->result_array();
    }

    function show_by_id($id_paket)
    {
        return $this->db->get_where('paket_iklan', array('id_paket' => $id_paket))->row_array();
    }

    public function upload_nego () 
    {
        $data = [
            "frekuensi_nego"    => $this->input->post('frekuensi_nego',true),
            "bonus_nego"        => $this->input->post('bonus_nego',true),
            "durasi_nego"       => $this->input->post('durasi_nego',true),
            "harga_nego"        => $this->input->post('harga_nego',true)
        ];
        $this->db->insert('nego_iklan', $data);
    }

    public function ambil_id_nego () 
    {
        $nego = $this->db->get_where('nego_iklan',array('frekuensi_nego' => $this->input->post('frekuensi_nego',true) ,'bonus_nego' => $this->input->post('bonus_nego',true),'durasi_nego' => $this->input->post('durasi_nego',true),'harga_nego' => $this->input->post('harga_nego',true) ))->row_array();

        return $nego['id_nego'];
    }

    public function update_iklan_nego ($id_iklan, $namaFileBaru, $id_nego) 
    {
        $data = [
            "periode_iklan_bulan"   => $this->input->post('periode_iklan_bulan',true),
            "periode_iklan_hari"    => $this->input->post('periode_iklan_hari',true),
            "tanggal_mulai"         => $this->input->post('tanggal_mulai', true),
            "mou"                   => $namaFileBaru,
            "id_nego"               => $id_nego
        ];
        $this->db->where('id_iklan',$id_iklan);
        $this->db->update('iklan', $data);
    }

    public function update_iklan ($id_iklan,$namaFileBaru) 
    {
        $data = [
            "periode_iklan_bulan"   => $this->input->post('periode_iklan_bulan',true),
            "periode_iklan_hari"    => $this->input->post('periode_iklan_hari',true),
            "tanggal_mulai"         => $this->input->post('tanggal_mulai', true),
            "mou"                   => $namaFileBaru
        ];
        $this->db->where('id_iklan',$id_iklan);
        $this->db->update('iklan', $data);
    }

    public function get_tgl ($id_iklan)
    {
        $this->db->select('periode_iklan_bulan, periode_iklan_hari, tanggal_mulai');
        $this->db->where('id_iklan', $id_iklan);
        $query = $this->db->get('iklan')->row();
        $this->update_tanggal($id_iklan, $query);
    }

    public function update_tanggal ($id_iklan, $data)
    {
        $bulan      = $data->periode_iklan_bulan;
        $hari       = $data->periode_iklan_hari;
        $tgl_mulai  = $data->tanggal_mulai;
        $date = strtotime('+'.$bulan.' month '.$hari.' days', strtotime($tgl_mulai));
        $tgl_selesai = date('Y-m-d', $date);

        $data = [
            "tanggal_selesai" => $tgl_selesai
        ];

        $this->db->where('id_iklan', $id_iklan);
        $this->db->update('iklan', $data);
    }

    public function lanjut_proses ($id)
    {
        $data = [
            "status_iklan" => 4
        ];
        $this->db->where('id_iklan', $id);
        $this->db->update('iklan', $data);
    }
}