<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita');
        $this->load->model('M_Profil');
    }
    function index()
    {
        $data['title'] = 'Berita';
        $data['berita'] = $this->M_Berita->index();
        $data['kontak'] = $this->M_Profil->index();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/berita/index', $data);
        $this->load->view('pengunjung/template/footer', $data);
    }
    function get($id_berita)
    {
        $data['id_berita'] = $this->M_Berita->get($id_berita);
        $url = $data['id_berita']['judul'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('berita/baca/' . $id_berita . '/' . $url_slug));
    }
    function baca($id_berita)
    {
        $data['title'] = 'Berita';
        $data['title1'] = 'Baca Berita';
        $data['berita'] = $this->M_Berita->get($id_berita);
        $data['kontak'] = $this->M_Profil->index();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/berita/detail', $data);
        $this->load->view('pengunjung/template/footer', $data);
    }
}