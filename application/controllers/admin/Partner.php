<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        akses();
        $this->load->model('M_Partner');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Index Partner";
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['index'] = $this->M_Partner->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/partner/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[pengguna.nik]', [
            'required' => 'NIK Tidak Boleh Kosong!',
            'is_unique' => 'NIK Telah Terdaftar'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Domisili Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim', [
            'required' => 'Nomor Telepon/HP/WA Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['profil'] = $this->M_Profil->index();

            $data['title'] = "Tambah data partner";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/partner/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $nik = $this->input->post('nik');
                    $nama_lengkap = $this->input->post('nama_lengkap');
                    $email = $this->input->post('email');
                    $alamat = $this->input->post('alamat');
                    $no_hp = $this->input->post('no_hp');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tanggal = date('Y-m-d');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $x = $this->input->post('tanggal_lahir');
                    $tanggal_lahir = date('Y-m-d', strtotime($x));
                    $password = $this->input->post('password');
                    $username = $this->input->post('username');
                    $data = array(
                        'foto' => $file,
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'daftar' => $tanggal,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'password' => $password,
                        'username' => $username,
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_akses' => 4,
                    );
                    $this->M_Pengguna->tambah('pengguna', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('admin/partner/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('admin/partner/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_hp = $this->input->post('no_hp');

                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tanggal = date('Y-m-d');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));
                $password = $this->input->post('password');
                $username = $this->input->post('username');
                $data = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,

                    'daftar' => $tanggal,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'password' => $password,
                    'username' => $username,
                    'id_akses' => 4,
                );
                $this->M_Pengguna->tambah('pengguna', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('admin/partner/index', 'refresh');
            }
        }
    }
    public function edit($id_pengguna)
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|trim', [
            'required' => 'NIK Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Domisili Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim', [
            'required' => 'Nomor Telepon/HP/WA Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['index'] = $this->M_Pengguna->index();
            $data['partner'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            $data['profil'] = $this->M_Profil->index();
            $data['title'] = "Partner";
            $data['title2'] = "Edit Data";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/partner/edit', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            $config['upload_path'] = './assets/foto/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    $nik = $this->input->post('nik');
                    $nama_lengkap = $this->input->post('nama_lengkap');
                    $email = $this->input->post('email');
                    $alamat = $this->input->post('alamat');
                    $no_hp = $this->input->post('no_hp');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tanggal = date('Y-m-d');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $x = $this->input->post('tanggal_lahir');
                    $tanggal_lahir = date('Y-m-d', strtotime($x));
                    $id_pengguna = $this->input->post('id_pengguna');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $data = array(
                        'foto' => $file,
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'daftar' => $tanggal,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'username' => $username,
                        'password' => $password,
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_akses' => 4,
                    );
                    $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                    $this->session->set_flashdata('success', 'Berhasil ubah data');
                    redirect('admin/partner/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal ubah data');
                    redirect('admin/partner/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_hp = $this->input->post('no_hp');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tanggal = date('Y-m-d');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));
                $id_pengguna = $this->input->post('id_pengguna');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(

                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'daftar' => $tanggal,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'username' => $username,
                    'password' => $password,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_akses' => 4,
                );
                $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/partner/index', 'refresh');
            }
        }
    }
    public function detail($id_pengguna)
    {
        $data['index'] = $this->M_Pengguna->index();
        $data['partner'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
        $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();

        $data['profil'] = $this->M_Profil->index();

        $data['title'] = "Partner";
        $data['title2'] = "Detail Data";
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/partner/detail', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function hapus()
    {
        $id_pengguna = $this->uri->segment(4, 0);
        $data = $this->M_Pengguna->get($id_pengguna);
        if ($data) {
            $this->M_Pengguna->hapus($id_pengguna);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('admin/partner/index', 'refresh');
        }
    }
    public function hapusberkas($id_berkas)
    {
        $data =
            $this->db->get_where('berkas', array('id_berkas' => $id_berkas))->row_array();
        if ($data) {
            $this->M_Pengguna->hapusberkas($id_berkas);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    function tambahberkas()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Judul Berkas Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['berkas']['name'])) {
            $this->form_validation->set_rules('berkas', 'berkas', 'required', [
                'required' => 'File Tidak Boleh Kosong!'
            ]);
        }
        if ($this->form_validation->run() == FALSE) {
            $id_pengguna = $this->uri->segment(4);
            $data['index'] = $this->M_Pengguna->index();
            $data['index2'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            if ($data) {
                $data['title'] = "Edit data admin";
                $this->session->set_flashdata('info', 'Form Upload Tidak Boleh Kosong');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('info', 'Tidak Ada Data');
                redirect('admin/album/index', 'refresh');
            }
        } else {
            $config['upload_path'] = './assets/berkas/pengguna/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('berkas')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/berkas/pengguna/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/berkas/pengguna/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $id_pemilik = $this->input->post('id_pemilik');
                $judul = $this->input->post('judul');
                $tanggal = date('Y-m-d');
                $data = array(
                    'berkas' => $file,
                    'judul' => $judul,
                    'daftar' => $tanggal,
                    'id_pemilik' => $id_pemilik,
                );
                $this->M_Pengguna->tambah('berkas', $data);
                $this->session->set_flashdata('success', 'Berhasil Upload Berkas');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('info', 'Gagal Upload Berkas');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
    function ubah()
    {
        $config['upload_path'] = './assets/foto/pengguna/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] = $this->input->post('nik');
        $this->upload->initialize($config);
        $config['upload_path'] = './assets/foto/pengguna/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] = $this->input->post('nik');
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_hp = $this->input->post('no_hp');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tanggal = date('Y-m-d');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));
                $id_pengguna = $this->input->post('id_pengguna');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'foto' => $file,
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'daftar' => $tanggal,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'username' => $username,
                    'password' => $password,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_akses' => 4,
                );
                $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/partner/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal ubah data');
                redirect('admin/partner/index', 'refresh');
            }
        } else {
            $nik = $this->input->post('nik');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal = date('Y-m-d');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $x = $this->input->post('tanggal_lahir');
            $tanggal_lahir = date('Y-m-d', strtotime($x));
            $id_pengguna = $this->input->post('id_pengguna');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(

                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'email' => $email,
                'daftar' => $tanggal,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'username' => $username,
                'password' => $password,
                'jenis_kelamin' => $jenis_kelamin,
                'id_akses' => 4,
            );
            $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
            $this->session->set_flashdata('success', 'Berhasil ubah data');
            redirect('admin/partner/index', 'refresh');
        }
    }
    function pengajuan()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Pengajuan Partner";
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['index'] = $this->M_Partner->pengajuan();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/partner/pengajuan', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function aktif($id_pengguna)
    {
        $data = array('id_akses' => 4);
        $this->M_Partner->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
        $this->_sendmail($id_pengguna);
        $this->session->set_flashdata('success', 'Pengguna telah menjadi partner');
        redirect($_SERVER['HTTP_REFERER']);
    }
    function tolak($id_pengguna)
    {
        $data = array('id_akses' => 3);
        $this->M_Partner->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
        $this->session->set_flashdata('success', 'Pengguna belum memenuhi kriteria');
        $this->_sendmail1($id_pengguna);
        redirect($_SERVER['HTTP_REFERER']);
    }
    private function _sendmail($id_pengguna)
    {
        //$customer = $this->session->userdata('id_pengguna');
        $user = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '59b2958d9247bd',
            'smtp_pass' => '20abef486bad12',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from('rental_maribersaudara@gmail.com');
        $this->email->to($user['email']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Selamat anda telah diterima menjadi martner dari Mari Bersaudara Rent, segera ajukan mobil yang ingin disewakan.');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    private function _sendmail1($id_pengguna)
    {
        $customer = $this->session->userdata('id_pengguna');
        $user = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '59b2958d9247bd',
            'smtp_pass' => '20abef486bad12',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from('rental_maribersaudara@gmail.com');
        $this->email->to($user['email']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Pengajuan menjadi partner Mari Bersaudara ditolak.');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    function downloadfoto($id_pengguna)
    {
        $data = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
        force_download(
            'assets/foto/pengguna/' . $data['foto'],
            NULL
        );
    }
    function downloadktp($id_pengguna)
    {
        //download foto
        //$data = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        // force_download('assets/foto/mobil/' . $data['thumbnail'], NULL);

        //download ktp
        $data = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
        force_download('assets/foto/ktp/' . $data['ktp'], NULL);
    }
}