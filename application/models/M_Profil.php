<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Profil extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('profil')
            ->order_by('id_profil', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}
