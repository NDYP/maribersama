<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{
    public function hari_ini()
    {
        $date = date('Y-m-d');
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('tanggal', $date) //urut berdasarkan id
            ->group_by('ip')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function total()
    {
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->group_by('ip')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function online()
    {
        $batas_waktu = time() - 300;
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('online >', $batas_waktu) //urut berdasarkan id
            ->group_by('ip')
            ->get() //ditampilkan dalam bentuk array
            ->num_rows();
        return $query;
    }
}
