<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		check_not_login();
		// is_logged_in();
		$data['judul'] = 'Dashboard';
		$this->template->load('template', 'dashboard', $data);
	}

	function profil() {
		$this->template->load('template', 'profil');
	}
}
