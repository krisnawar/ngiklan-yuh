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

    public function get_iklan_stat()
    {
        for($i = 1; $i <= date('n'); $i++)
        {
            $this->db->where("DATE_FORMAT(tanggal_masuk,'%c')", $i);
            $this->db->from('iklan');
            $query = $this->db->count_all_results();
            $data[$i-1] = [date('F', mktime(0, 0, 0, $i, 10)), $query];
        }

        return $data;
    }

    public function get_stat_tayang()
    {
        for($i = 1; $i <= date('n'); $i++)
        {
            $this->db->where("DATE_FORMAT(tanggal_mulai,'%c')", $i);
            $this->db->from('iklan');
            $query = $this->db->count_all_results();
            $data[$i-1] = [date('F', mktime(0, 0, 0, $i, 10)), $query];
        }

        return $data;
    }

    public function get_iklan_status($status_id)
    {
        $this->db->where('status_iklan', $status_id);
        $this->db->from('iklan');
        return $this->db->count_all_results();
    }
}