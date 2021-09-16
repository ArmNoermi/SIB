<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bantex extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('bantex_model');
    }

    public function index()
    {
        $data['judul'] = 'Bantex Lemari';
        $data['row'] = $this->bantex_model->get();
        $this->template->load('template', 'bantex/bantex_data', $data);
    }

    public function add()
    {
        $bantex = new stdClass();
        $bantex->id_bantex = null;
        $bantex->nmr_bantex = null;
        $data = array(
            'judul' => 'Bantex Lemari',
            'page' => 'add',
            'row' => $bantex
        );
        $this->template->load('template', 'bantex/bantex_form', $data);
    }

    public function edit($id)
    {
        $query = $this->bantex_model->get($id);
        if ($query->num_rows() > 0) {
            $bantex = $query->row();
            $data = array(
                'judul' => 'Bantex Lemari',
                'page' => 'edit',
                'row' => $bantex
            );
            $this->template->load('template', 'bantex/bantex_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('bantex') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->bantex_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->bantex_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('bantex');
    }

    public function del($id)
    {
        $this->bantex_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('bantex');
    }
}