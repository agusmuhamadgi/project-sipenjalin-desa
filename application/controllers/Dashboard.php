<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		check_is_not_login();
		$this->load->model('agenda_m');
		$this->load->model('peminjaman_m');
		$this->load->model('pengembalian_m');
		$data['agenda'] = $this->agenda_m->get_data_available();
		$data['pinjam'] = $this->peminjaman_m->get_data_by_user();
		$data['kembali'] = $this->pengembalian_m->get_data_by_user();
		$this->template->load('template', 'dashboard', $data);
	}
}
