<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->message = '';
    }

    public function ubah_profil($id, $first_name, $last_name, $phone, $email)
    {
        $data = [
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'phone'         => $phone,
            'email'         => $email
        ];

        $query = "SELECT count(*) FROM users WHERE users.email = '" . $email . "' AND users.id != '".$id."'";

        $count  = $this->db->query($query)->result_array();

        if($count[0]['count(*)'] > 0)
        {
            $this->set_error('Profil gagal diubah. Email telah digunakan akun lain');
            return FALSE;
        }

        else
        {
            $this->db->where('id', $id);
            $this->db->update('users', $data);

            $this->set_error('Profil berhasil diubah');
            
            return TRUE;
        }
    }

    public function set_error($message)
    {
        $this->message = $message;
    }

    public function get_error()
    {
        return $this->message;
    }

}