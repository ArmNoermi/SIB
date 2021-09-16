<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['submenu_model', 'menu_model']);
    }

    public function index()
    {
		$data['judul'] = 'Manajemen Submenu';
        $data['row'] = $this->submenu_model->get();
        $this->template->load('template', 'submenu/submenu_data', $data);
	}
	
	public function add()
    {
        $submenu = new stdClass();
        $submenu->id_sub = null;
        // $submenu->id_menu = null;
        $submenu->judul = null;
        $submenu->url = null;
        $submenu->icon = null;
        $submenu->aktif = null;

        $query_menu = $this->menu_model->get();

        $menu[null] = '- Pilih -';
        foreach ($query_menu->result() as $m) {
            $menu[$m->id_menu] = $m->nama_menu;
        }

        $data = array(
            'judul' => 'Manajemen Submenu',
            'page' => 'add',
            'row' => $submenu,
            'menu' => $menu,
            'selectedmenu' => null,
        );
        $this->template->load('template', 'submenu/submenu_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->submenu_model->add($post);
            } else if (isset($_POST['edit'])) {
                $this->submenu_model->edit($post);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
        redirect('submenu');
    }

    public function edit($id)
    {
        $query = $this->submenu_model->get($id);
        if ($query->num_rows() > 0) {
            $submenu = $query->row();

            $query_menu = $this->menu_model->get();

            $menu[null] = '- Pilih -';
            foreach ($query_menu->result() as $m) {
            $menu[$m->id_menu] = $m->nama_menu;
            }

            $data = array(
                'judul' => 'Manajemen Menu',
                'page' => 'edit',
                'row' => $submenu,
                'menu' => $menu,
                'selectedmenu' => $submenu->id_menu,
            );
            $this->template->load('template', 'submenu/submenu_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('submenu') . "';</script>";
        }
    }

	public function del($id)
    {
        $this->submenu_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('submenu') . "';</script>";
    }
}