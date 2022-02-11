<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Galeri');
        $this->load->model('M_Kontak');
        $this->load->model('M_Profil');
    }
    function index()
    {
        $config['base_url'] = site_url('galeri/index'); //site url
        $config['total_rows'] = $this->db->count_all('album'); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();


        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = 'Album';
        $data['kontak'] = $this->M_Profil->index();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();



        $data['album'] = $this->M_Galeri->pengunjung($config["per_page"], $data['page']);

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/galeri/index', $data);
        $this->load->view('pengunjung/template/footer', $data);
    }
    function get($id_album)
    {
        $data['id_album'] = $this->M_Galeri->get($id_album);
        $url = $data['id_album']['nama_album'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('galeri/album/' . $id_album . '/' . $url_slug));
    }
    function album($id_album)
    {
        $data['title'] = 'Galeri Album';
        $data['album'] = $this->M_Galeri->get($id_album);
        $data['galeri'] = $this->db->get_where('galeri', array('id_album' => $id_album))->result_array();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['kontak'] = $this->M_Profil->index();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/galeri/galeri', $data);
        $this->load->view('pengunjung/template/footer', $data);
    }
}