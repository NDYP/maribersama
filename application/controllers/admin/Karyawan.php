<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        akses();
        $this->load->model('M_Pengguna');
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Karyawan";
        $data['title2'] = "Index Data";
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['index'] = $this->M_Pengguna->indexkaryawan();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/karyawan/index', $data);
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
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('salary', 'salary', 'required|trim', [
            'required' => 'Salary/Gaji Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['profil'] = $this->M_Profil->index();

            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $data['title'] = "Karyawan";
            $data['title2'] = "Tambah Data";
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/karyawan/tambah', $data);
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
                    $salary = $this->input->post('salary');
                    $jabatan = $this->input->post('jabatan');
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
                        'salary' => $salary,
                        'jabatan' => $jabatan,
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_akses' => 5,
                    );
                    $this->M_Pengguna->tambah('pengguna', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('admin/karyawan/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('admin/karyawan/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_hp = $this->input->post('no_hp');
                $jabatan = $this->input->post('jabatan');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tanggal = date('Y-m-d');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));
                $salary = $this->input->post('salary');
                $jabatan = $this->input->post('jabatan');
                $data = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'daftar' => $tanggal,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'salary' => $salary,
                    'jabatan' => $jabatan,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_akses' => 5,
                );
                $this->M_Pengguna->tambah('pengguna', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('admin/karyawan/index', 'refresh');
            }
        }
    }
    public function lihat($id_pengguna)
    {
        $data['index'] = $this->M_Pengguna->index();
        $data['profil'] = $this->M_Profil->index();

        $data['karyawan'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
        $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
        $data['gaji'] = $this->db->get_where('karyawan_gaji', array('id_pengguna' => $id_pengguna))->result_array();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        if ($data) {
            $data['title'] = "Karyawan";
            $data['title2'] = "Detail Data";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/karyawan/detail', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    public function edit()
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
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('salary', 'salary', 'required|trim', [
            'required' => 'Salary/Gaji Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $id_pengguna = $this->uri->segment(4, 0);
            $data['index'] = $this->M_Pengguna->index();
            $data['profil'] = $this->M_Profil->index();

            $data['karyawan'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            if ($data) {
                $data['title'] = "Karyawan";
                $data['title2'] = "Edit Data";
                $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
                $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/karyawan/edit', $data);
                $this->load->view('admin/template/footer', $data);
            } else {
                $this->session->set_flashdata('Info', 'Tidak Ada Data');
                redirect('admin/album/index', 'refresh');
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
                    $tanggal = date('Y-m-d');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $x = $this->input->post('tanggal_lahir');
                    $tanggal_lahir = date('Y-m-d', strtotime($x));
                    $id_pengguna = $this->input->post('id_pengguna');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $salary = $this->input->post('salary');
                    $jabatan = $this->input->post('jabatan');
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
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_akses' => 5,
                        'username' => $username,
                        'password' => $password,
                        'salary' => $salary,
                        'jabatan' => $jabatan,
                    );
                    $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                    $this->session->set_flashdata('success', 'Berhasil ubah data');
                    redirect('admin/karyawan/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal ubah data');
                    redirect('admin/karyawan/index', 'refresh');
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
                $salary = $this->input->post('salary');
                $jabatan = $this->input->post('jabatan');
                $data = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'daftar' => $tanggal,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'id_akses' => 5,
                    'username' => $username,
                    'password' => $password,
                    'salary' => $salary,
                    'jabatan' => $jabatan,
                );
                $this->M_Pengguna->update('pengguna', $data, array('id_pengguna' => $id_pengguna));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/karyawan/index', 'refresh');
            }
        }
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
            redirect('admin/karyawan/index', 'refresh');
        }
    }
    public function hapus_gaji($id_karyawan_gaji)
    {
        $data = $this->db->get_where('karyawan_gaji', array('id_karyawan_gaji' => $id_karyawan_gaji))->row_array();
        if ($data) {
            $this->M_Pengguna->hapusgaji($id_karyawan_gaji);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('admin/karyawan/index', 'refresh');
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
    function tambahberkas($id_pengguna)
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
            $data['profil'] = $this->M_Profil->index();
            $data['karyawan'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            if ($data) {
                $data['title'] = "Karyawan";
                $data['title2'] = "Upload Berkas";
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/karyawan/berkas', $data);
                $this->load->view('admin/template/footer', $data);
            } else {
                $this->session->set_flashdata('info', 'Tidak Ada Data');
                redirect($_SERVER['HTTP_REFERER']);
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
    public function cetak()
    {
        $data['profil'] = $this->M_Profil->index();
        $mulai = $this->input->post('mulai');
        $data['bulan1'] = date('Y-m-d H:i:s', strtotime($mulai));
        $akhir = $this->input->post('akhir');
        $data['bulan2'] = date('Y-m-d H:i:s', strtotime($akhir));

        $data['pengeluaran_karyawan'] = $this->M_Pengguna->cetak($data['bulan1'], $data['bulan2'])->result_array();
        $data['pengeluaran_karyawan_total'] = $this->M_Pengguna->total_keluar($data['bulan1'], $data['bulan2'])->result_array();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-Akhir-Bulan.pdf";
        $this->pdf->load_view('admin/karyawan/laporan', $data);
        // var_dump($data['pengeluaran_karyawan']);
    }
    public function gaji()
    {
        $this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('bulan', 'bulan', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('gaji', 'gaji', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $id_pengguna = $this->uri->segment(4, 0);
            $data['index'] = $this->M_Pengguna->index();
            $data['profil'] = $this->M_Profil->index();

            $data['karyawan'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            if ($data) {
                $data['title'] = "Karyawan";
                $data['title2'] = "Tambah Gaji";
                $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
                $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/karyawan/gaji', $data);
                $this->load->view('admin/template/footer', $data);
            } else {
                $this->session->set_flashdata('Info', 'Tidak Ada Data');
                redirect('admin/album/index', 'refresh');
            }
        } else {



            $id_pengguna = $this->input->post('id_pengguna');
            $bulan = $this->input->post('bulan');
            $x = date('Y-m-d', strtotime($bulan));
            $gaji = $this->input->post('gaji');
            $data = array(
                'bulan' => $x,
                'id_pengguna' => $id_pengguna,
                'gaji' => $gaji,

            );
            $this->M_Pengguna->tambah('karyawan_gaji', $data);
            $this->session->set_flashdata('success', 'Berhasil ubah data');
            redirect('admin/karyawan/index', 'refresh');
        }
    }
}