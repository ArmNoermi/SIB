<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktgr_pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('ktgr_pengadaan_model');
    }

    public function index()
    {
        $data['judul'] = 'Kategori Pengadaan';
        $data['row'] = $this->ktgr_pengadaan_model->get();
        $this->template->load('template', 'ktgr_pengadaan/kategori_data', $data);
    }

    public function add()
    {
        $ktgr = new stdClass();
        $ktgr->id_kategori = null;
        $ktgr->nama_kategori = null;
        $data = array(
            'judul' => 'Kategori Pengadaan',
            'page' => 'add',
            'row' => $ktgr
        );
        $this->template->load('template', 'ktgr_pengadaan/kategori_form', $data);
    }

    public function edit($id)
    {
        $query = $this->ktgr_pengadaan_model->get($id);
        if ($query->num_rows() > 0) {
            $ktgr = $query->row();
            $data = array(
                'judul' => 'Kategori Pengadaan',
                'page' => 'edit',
                'row' => $ktgr
            );
            $this->template->load('template', 'ktgr_pengadaan/kategori_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('ktgr_pengadaan') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->ktgr_pengadaan_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->ktgr_pengadaan_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('ktgr_pengadaan');
    }

    public function del($id)
    {
        $this->ktgr_pengadaan_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('ktgr_pengadaan');
    }

    // public function kategori_k()
    // {
    //     $data['row'] = $this->ktgr_dokumen_model->get();
    //     $this->template->load('template', 'kategori/kategori_k', $data);
    // }
}
