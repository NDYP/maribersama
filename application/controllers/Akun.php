<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Akun');
    }
    function pengajuan()
    {
        $id_user = $this->session->userdata('id_pengguna');
        $data = array('id_akses' => 6);
        $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_user));
        $this->session->set_flashdata('success', 'Tunggu konfirmasi dan cek email anda');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
