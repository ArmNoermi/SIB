<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lemari extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('lemari_m');
    }

    public function index()
    {
        $data['judul'] = 'Lemari';
        $data['row'] = $this->lemari_m->get();
        $this->template->load('template', 'lemari/lemari_data', $data);
    }

    public function add()
    {
        $lemari = new stdClass();
        $lemari->id_lemari = null;
        $lemari->kode_lemari = null;
        $data = array(
            'judul' => 'Lemari',
            'page' => 'add',
            'row' => $lemari
        );
        $this->template->load('template', 'lemari/lemari_form', $data);
    }

    public function edit($id)
    {
        $query = $this->lemari_m->get($id);
        if ($query->num_rows() > 0) {
            $lemari = $query->row();
            $data = array(
                'judul' => 'Lemari',
                'page' => 'edit',
                'row' => $lemari
            );
            $this->template->load('template', 'lemari/lemari_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('lemari') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->lemari_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->lemari_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('lemari');
    }

    public function del($id)
    {
        $this->lemari_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('lemari');
    }

    public function lemari_k()
    {
        $data['row'] = $this->lemari_m->get();
        $this->template->load('template', 'lemari/lemari_k', $data);
    }
}
