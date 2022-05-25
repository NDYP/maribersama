<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-p8HicFth7JQ3nLckYISkoYLF', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('M_Transaksi');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		$id_mobil
			= $this->input->post('id_mobil');
		$x = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
		$tarif = $x['tarif'];
		$diskon = $x['diskon'];

		$id_penyewa = $this->session->userdata('id_pengguna');
		$alamat = $this->input->post('alamat');

		$opsi = $this->input->post('opsi');
		$tanggal_pinjam =
			date('Y-m-d', strtotime($this->input->post('tanggal_pinjam')));
		$tanggal_kembali =
			date('Y-m-d', strtotime($this->input->post('tanggal_kembali')));
		$diff = strtotime($tanggal_pinjam) - strtotime($tanggal_kembali);
		// 1 day = 24 hours 
		// 24 * 60 * 60 = 86400 seconds
		$berapa_hari = ceil(abs($diff / 86400));
		$tanggal_transaksi = date('Y-m-d');
		$dp = $this->input->post('dp');

		$jl_tarif = $tarif - (($tarif * $diskon) / 100);

		$xx = $jl_tarif * $berapa_hari;
		// Required
		$transaction_details = array(
			'order_id' => rand(), //id transaksi
			'gross_amount' => $dp, // jumlah bayar * hari
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $dp,
			'quantity' => 1,
			'name' => $x['jenis']
		);

		// Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 20000,
		// 	'quantity' => 2,
		// 	'name' => "Orange"
		// );

		// Optional
		$item_details = array($item1_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => $alamat,
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$shipping_address = array(
			'address'       => $alamat,
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $this->session->userdata('nama_lengkap'),
			'email'         => $this->session->userdata('email'),
			'phone'         => $this->session->userdata('no_hp'),
			// 'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
		// $this->_sendmail1($id_penyewa);
		// $this->session->set_flashdata('success', 'Tunggu konfirmasi pihak rental dan cek email');
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		$id_mobil
			= $this->input->post('id_mobil');
		$x = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
		$tarif = $x['tarif'];
		$diskon = $x['diskon'];

		$id_penyewa = $this->session->userdata('id_pengguna');
		$alamat = $this->input->post('alamat');

		$opsi = $this->input->post('opsi');
		$tanggal_pinjam =
			date('Y-m-d', strtotime($this->input->post('tanggal_pinjam')));
		$tanggal_kembali =
			date('Y-m-d', strtotime($this->input->post('tanggal_kembali')));
		$diff = strtotime($tanggal_pinjam) - strtotime($tanggal_kembali);
		// 1 day = 24 hours 
		// 24 * 60 * 60 = 86400 seconds
		$berapa_hari = ceil(abs($diff / 86400));
		$tanggal_transaksi = date('Y-m-d');
		$dp = $this->input->post('dp');

		$jl_tarif = $tarif - (($tarif * $diskon) / 100);
		$xx = $jl_tarif * $berapa_hari;
		$data = array(
			'id_penyewa' => $id_penyewa,
			'opsi' => $opsi,
			'tanggal_pinjam' => $tanggal_pinjam,
			'tanggal_kembali' => $tanggal_kembali,
			'dp' => $dp,
			'id_mobil' => $id_mobil,
			'alamat' => $alamat,

			'bank' => $result['va_numbers'][0]["bank"],
			'va' => $result['va_numbers'][0]["va_number"],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code'],
			'id_transaksi' => $result['order_id'],
			'payment_type' => $result['payment_type'],
			'bayar' => $xx - $dp,
			'status' => $result['transaction_status'], //diubah jadi pending
			'tanggal_transaksi' => $result['transaction_time'],
		);
		$this->M_Transaksi->tambah('transaksi', $data);
		$this->_sendmail1($id_penyewa);
		$this->session->set_flashdata('success', 'Tunggu konfirmasi pihak rental dan cek email');
		redirect('admin/transaksi/index');
		// echo json_encode($data);
	}
	private function _sendmail1($id_penyewa)
	{
		$id_penyewa = $this->session->userdata('id_pengguna');
		$user = $this->db->get_where('pengguna', ['id_pengguna' => $id_penyewa])->row_array();

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mailtrap.io',
			'smtp_port' => 2525,
			'smtp_user' => '43111cc6037b8d',
			'smtp_pass' => '8b752bd5412080',
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);

		$this->load->library('email', $config);
		$this->email->from('rental_maribersaudara@gmail.com');
		$this->email->to($user['email']);
		$this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
		$this->email->message('Pengajuan penyewaan telah terkirim.');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}