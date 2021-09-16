<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('menu_model');
    }

    public function index()
    {
		$data['judul'] = 'Manajemen Menu';
        $data['row'] = $this->menu_model->get();
        $this->template->load('template', 'menu/menu_data', $data);
	}
	
	public function add()
    {
        $menu = new stdClass();
        $menu->id_menu = null;
        $menu->nama_menu = null;
        $data = array(
            'judul' => 'Manajemen Menu',
            'page' => 'add',
            'row' => $menu
        );
        $this->template->load('template', 'menu/menu_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->menu_model->add($post);
            } else if (isset($_POST['edit'])) {
                $this->menu_model->edit($post);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
        redirect('menu');
    }

    public function edit($id)
    {
        $query = $this->menu_model->get($id);
        if ($query->num_rows() > 0) {
            $menu = $query->row();
            $data = array(
                'judul' => 'Manajemen Menu',
                'page' => 'edit',
                'row' => $menu
            );
            $this->template->load('template', 'menu/menu_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('lemari') . "';</script>";
        }
    }

	public function del($id)
    {
        $this->menu_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('menu') . "';</script>";
    }
}