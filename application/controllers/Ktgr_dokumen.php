<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktgr_dokumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('ktgr_dokumen_model');
    }

    public function index()
    {
        $data['judul'] = 'Kategori Dokumen';
        $data['row'] = $this->ktgr_dokumen_model->get();
        $this->template->load('template', 'ktgr_dokumen/kategori_data', $data);
    }

    public function add()
    {
        $category = new stdClass();
        $category->id_kategori = null;
        $category->nama_kategori = null;
        $data = array(
            'judul' => 'Kategori Dokumen',
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'ktgr_dokumen/kategori_form', $data);
    }

    public function edit($id)
    {
        $query = $this->ktgr_dokumen_model->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'judul' => 'Kategori Dokumen',
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'ktgr_dokumen/kategori_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('ktgr_dokumen') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->ktgr_dokumen_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->ktgr_dokumen_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('ktgr_dokumen');
    }

    public function del($id)
    {
        $this->ktgr_dokumen_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('ktgr_dokumen');
    }

    // public function kategori_k()
    // {
    //     $data['row'] = $this->ktgr_dokumen_model->get();
    //     $this->template->load('template', 'kategori/kategori_k', $data);
    // }
}
