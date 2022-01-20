<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        akses();
    }
    function download($id_pemilik)
    {
        //download foto
        //$data = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        // force_download('assets/foto/mobil/' . $data['thumbnail'], NULL);
        //download berkas
        $data = $this->db->get_where('berkas', ['id_pemilik' => $id_pemilik])->row_array();
        force_download('assets/berkas/pengguna/' . $data['berkas'], NULL);
    }
}