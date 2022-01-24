<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Akun');
        $this->load->model('M_Mobil');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
    }
    function profil()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Akun";
        $data['title2'] = "Kelola Akun";
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['akun'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
        $data['mobil'] = $this->db->get_where('mobil', array('id_pemilik' => $id_pengguna))->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/akun/detail', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function edit()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
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
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $id_pengguna = $this->session->userdata('id_pengguna');
            $data['index'] = $this->M_Pengguna->index();
            $data['index2'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            if ($data) {
                $data['profil'] = $this->M_Profil->index();

                $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
                $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
                $data['title'] = "Akun";
                $data['title2'] = "Edit Data";
                $id_pengguna = $this->session->userdata('id_pengguna');
                $data['akun'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
                $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
                $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
                $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
                $data['mobil'] = $this->db->get_where('mobil', array('id_pemilik' => $id_pengguna))->result_array();
                //var_dump($data['akun']);
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/akun/edit', $data);
                $this->load->view('admin/template/footer', $data);
            } else {
                $this->session->set_flashdata('info', 'Tidak Ada Data');
                redirect('admin/akun/profil', 'refresh');
            }
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
                    $tempat_lahir = $this->input->post('tempat_lahir');

                    $x = $this->input->post('tanggal_lahir');
                    $tanggal_lahir = date('Y-m-d', strtotime($x));
                    $id_pengguna = $this->session->userdata('id_pengguna');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $data = array(
                        'foto' => $file,
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'username' => $username,
                        'password' => $password,
                    );
                    $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                    $this->session->set_flashdata('success', 'Berhasil ubah data');
                    redirect('admin/akun/profil', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal ubah data');
                    redirect('admin/akun/profil', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');

                $no_hp = $this->input->post('no_hp');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));

                $id_pengguna = $this->session->userdata('id_pengguna');
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $data = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'username' => $username,
                    'password' => $password,
                );
                $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/akun/profil', 'refresh');
            }
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
            redirect('admin/profil/profil', 'refresh');
        }
    }
    function berkas()
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
            $id_pengguna = $this->session->userdata('id_pengguna');
            $data['index'] = $this->M_Pengguna->index();
            $data['index2'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            if ($data) {
                $data['profil'] = $this->M_Profil->index();

                $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
                $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
                $data['title'] = "Akun";
                $data['title2'] = "Upload Berkas";
                $id_pengguna = $this->session->userdata('id_pengguna');
                $data['akun'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
                $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
                $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
                $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
                $data['mobil'] = $this->db->get_where('mobil', array('id_pemilik' => $id_pengguna))->result_array();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/akun/berkas', $data);
                $this->load->view('admin/template/footer', $data);
            } else {
                $this->session->set_flashdata('info', 'Tidak Ada Data');
                redirect('admin/akun/profil', 'refresh');
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

                $id_pemilik = $this->session->userdata('id_pengguna');
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
    function mobil()
    {
        $this->form_validation->set_rules('tipe', 'tipe', 'required|trim', [
            'required' => 'Tipe Mobil Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Jenis Mobil Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('warna', 'warna', 'required|trim', [
            'required' => 'Warna Mobil Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jumlah_kursi', 'jumlah_kursi', 'required|trim', [
            'required' => 'Jumlah Kursi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('transmisi', 'transmisi', 'required|trim', [
            'required' => 'Jenis Transmisi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sewa', 'sewa', 'required|trim', [
            'required' => 'Biaya Sewa Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tarif', 'tarif', 'required|trim', [
            'required' => 'Tarif Sewa Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('info', 'Form Upload Tidak Boleh Kosong');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $config['upload_path'] = './assets/foto/mobil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] =
                $this->session->userdata('id_pengguna');
            $this->upload->initialize($config);
            if (!empty($_FILES['thumbnail']['name'])) {
                if ($this->upload->do_upload('thumbnail')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $id_pemilik =
                        $this->session->userdata('id_pengguna');
                    $tipe = $this->input->post('tipe');
                    $jenis = $this->input->post('jenis');
                    $warna = $this->input->post('warna');
                    $jumlah_kursi = $this->input->post('jumlah_kursi');
                    $transmisi = $this->input->post('transmisi');
                    $sewa = $this->input->post('sewa');
                    $tarif = $this->input->post('tarif');
                    $diskon = $this->input->post('tanggal_lahir');
                    $status = 'pengajuan';
                    $info = $this->input->post('info');
                    $daftar = date('Y-m-d');
                    $data = array(
                        'thumbnail' => $file,
                        'id_pemilik' => $id_pemilik,
                        'tipe' => $tipe,
                        'warna' => $warna,
                        'jumlah_kursi' => $jumlah_kursi,
                        'jenis' => $jenis,
                        'transmisi' => $transmisi,
                        'sewa' => $sewa,
                        'tarif' => $tarif,
                        'diskon' => $diskon,
                        'status' => $status,
                        'info' => $info,
                        'daftar' => $daftar,
                    );
                    $this->M_Mobil->tambah('mobil', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('admin/akun/profil', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('admin/akun/profil', 'refresh');
                }
            } else {
                $id_pemilik =
                    $this->session->userdata('id_pengguna');
                $tipe = $this->input->post('tipe');
                $jenis = $this->input->post('jenis');
                $warna = $this->input->post('warna');
                $jumlah_kursi = $this->input->post('jumlah_kursi');
                $transmisi = $this->input->post('transmisi');
                $sewa = $this->input->post('sewa');
                $tarif = $this->input->post('tarif');
                $diskon = $this->input->post('tanggal_lahir');
                $status = 'pengajuan';
                $info = $this->input->post('info');
                $daftar = date('Y-m-d');
                $data = array(
                    'id_pemilik' => $id_pemilik,
                    'tipe' => $tipe,
                    'warna' => $warna,
                    'jumlah_kursi' => $jumlah_kursi,
                    'jenis' => $jenis,
                    'transmisi' => $transmisi,
                    'sewa' => $sewa,
                    'tarif' => $tarif,
                    'diskon' => $diskon,
                    'status' => $status,
                    'info' => $info,
                    'daftar' => $daftar,
                );
                $this->M_Mobil->tambah('mobil', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('admin/akun/profil', 'refresh');
            }
        }
    }
    public function hapusmobil($id_mobil)
    {
        $data =
            $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
        if ($data) {
            $this->M_Akun->hapusmobil($id_mobil);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login/index', 'refresh');
    }
    function download($id_pengguna)
    {
        //download foto
        //$data = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        // force_download('assets/foto/mobil/' . $data['thumbnail'], NULL);
        //download berkas
        $data = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
        force_download('assets/foto/pengguna/' . $data['foto'], NULL);
    }
}