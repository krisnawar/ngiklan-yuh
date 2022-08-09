<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_count_record($table)
  {
    if($table == 'iklan')
    {
      $query = $this->db->count_all($table);
    }
    else
    {
      $query = $this->db->count_all($table);
    }
    return $query;
  }

    public function ubahprofil (){

        $data = [
            "first_name" => $this->input->post('namadepan',true),
            "last_name" => $this->input->post('namabelakang',true),
            "username" => $this->input->post('username',true),
            "phone" => $this->input->post('notelpon',true),
            "email" => $this->input->post('email',true)
        ];
        $query = "SELECT count(*) FROM users WHERE users.email = '" . $this->input->post('email',true) . "' AND users.id != '".$this->input->post('id',true)."'";

        $count  = $this->db->query($query)->result_array();

        if($count[0]['count(*)'] > 0)
        {
            redirect('ubahprofil', 'refresh');
            return FALSE;
        }
        else {
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('users', $data);
            return TRUE;
        }
    }

 public function show_all ($table){

   return $this->db->get($table)->result_array();

 }


 public function count_iklan ($id_user) {

  $this->db->get_where('iklan',array('id_user' => $id_user));

  return $this->db->affected_rows();

}
public function count_iklan_by_status ($id_user,$status) {

  $this->db->get_where('iklan',array('id_user' => $id_user,'status_iklan' => $status));

  return $this->db->affected_rows();

}


 public function cek_organisasi () {

  $this->db->get_where('penanggungjawab',array('alamat_pj' => $this->input->post('alamat_pj',true) ,'nama_organisasi' => $this->input->post('nama_organisasi',true)));

  return $this->db->affected_rows();

}

public function ambil_id_organisasi () {

  $organisasi = $this->db->get_where('penanggungjawab',array('alamat_pj' => $this->input->post('alamat_pj',true) ,'nama_organisasi' => $this->input->post('nama_organisasi',true)))->row_array();

  return $organisasi['id_pj'];
}

public function upload_organisasi () {

  $data = [
     "nama_pj" => $this->input->post('nama_pj',true),
     "alamat_pj" => $this->input->post('alamat_pj',true),
     "no_tlp" => $this->input->post('no_tlp',true),
     "nama_organisasi" => $this->input->post('nama_organisasi',true),
     "jabatan" => $this->input->post('jabatan',true)
   ];
   $this->db->insert('penanggungjawab', $data);
}

public function ajukan_iklan ($id_pj,$namaFileBaru) {

  if ($this->input->post('pilih_paket',true) == 00) {

    $data = [
     "id_user" => $this->input->post('id_user',true),
     "nama_iklan" => $this->input->post('nama_iklan',true),
     "desc_iklan" => $this->input->post('desc_iklan',true),
     "desc_file_iklan" => $namaFileBaru,
     "id_pj" => $id_pj,
     "status_iklan" => '0',
     "id_paket" => '0',
     "id_nego" => '0',
     "tanggal_masuk" => $this->input->post('tanggal_masuk',true)
   ];
   $this->db->insert('iklan', $data);
 }
 else {

  $data = [
   "id_user" => $this->input->post('id_user',true),
   "nama_iklan" => $this->input->post('nama_iklan',true),
   "desc_iklan" => $this->input->post('desc_iklan',true),
   "desc_file_iklan" => $namaFileBaru,
   "id_pj" => $id_pj,
   "status_iklan" => '0',
   "id_paket" => $this->input->post('pilih_paket',true),
   "id_nego" => '0',
   "tanggal_masuk" => $this->input->post('tanggal_masuk',true)
    ];
 $this->db->insert('iklan', $data);
}


}

public function show_iklan_by_user_id ($id) {

  return $this->db->get_where('iklan',array('id_user' => $id ))->result_array();
}

public function show_iklan_by_id ($id) {

  return $this->db->get_where('iklan',array('id_iklan' => $id ))->row_array();
}

public function show_one_data_by_id ($table,$id,$namaid) {

  return $this->db->get_where($table,array($namaid => $id ))->row_array();
}

public function ubahiklan ($id_iklan,$stat){

    $data = [
     "status_iklan" => $stat
   ];
   $this->db->where('id_iklan',$id_iklan);
   $this->db->update('iklan', $data);
 }

 public function show_bayar_by_id_iklan ($id) {

  return $this->db->get_where('bayar',array('id_iklan' => $id ))->result_array();
}

public function show_siar_by_id_iklan ($id) {

  return $this->db->get_where('siar',array('id_iklan' => $id ))->result_array();
}

public function upload_bayar_iklan ($id_iklan,$namaFileBaru) {

    $data = [
     "id_iklan" => $id_iklan,
     "tanggal_bayar" => $this->input->post('tanggal_bayar',true),
     "jumlah_bayar" => $this->input->post('jumlah_bayar',true),
     "bukti_bayar" => $namaFileBaru,
     "verifikasi" => '0'
   ];
   $this->db->insert('bayar', $data);
 }




public function upload_nego () {

  $data = [
     "frekuensi_nego" => $this->input->post('frekuensi_nego',true),
     "bonus_nego" => $this->input->post('bonus_nego',true),
     "durasi_nego" => $this->input->post('durasi_nego',true),
     "harga_nego" => $this->input->post('harga_nego',true)
   ];
   $this->db->insert('penanggungjawab', $data);
}

public function ambil_id_nego () {

  $nego = $this->db->get_where('penanggungjawab',array('frekuensi_nego' => $this->input->post('frekuensi_nego',true) ,'bonus_nego' => $this->input->post('bonus_nego',true),'durasi_nego' => $this->input->post('durasi_nego',true),'harga_nego' => $this->input->post('harga_nego',true) ))->row_array();

  return $nego['id_nego'];
}


public function update_iklan_nego ($id_iklan,$namaFileBaru,$id_nego) {
    $data = [
     "periode_iklan_bulan" => $this->input->post('periode_iklan_bulan',true),
     "periode_iklan_hari" => $this->input->post('periode_iklan_hari',true),
     "mou" => $namaFileBaru,
     "id_nego" => $id_nego
   ];
   $this->db->where('id_iklan',$id_iklan);
   $this->db->update('iklan', $data);
 }

 public function update_iklan ($id_iklan,$namaFileBaru) {
    $data = [
     "periode_iklan_bulan" => $this->input->post('periode_iklan_bulan',true),
     "periode_iklan_hari" => $this->input->post('periode_iklan_hari',true),
     "mou" => $namaFileBaru
   ];
   $this->db->where('id_iklan',$id_iklan);
   $this->db->update('iklan', $data);
 }

public function upload_bukti_siar ($id_iklan,$namaFileBaru) {

  $data = [
     "id_iklan" => $id_iklan,
     "nama_bukti_siar" => $this->input->post('nama_bukti_siar',true),
     "bukti_siar" => $namaFileBaru
   ];
   $this->db->insert('siar', $data);
}



}