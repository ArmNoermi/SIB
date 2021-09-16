<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dkmn_klr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['dkmn_klr_model', 'ktgr_dokumen_model', 'lemari_m', 'user_m', 'stts_m', 'bantex_model']);    
    }

    public function index()
    {
        $data['judul'] = 'Dokumen Keluar';
        $data['row'] = $this->dkmn_klr_model->get();
        $this->template->load('template', 'dokumen/dkmn_klr/dkmn_klr_data', $data);
    }

    public function add()
    {
        $dokumen = new stdClass();
        $dokumen->id_dokumen = null;
        $dokumen->tgl_dokumen = null;
        $dokumen->kode_dokumen = null;
        $dokumen->tujuan = null;
        $dokumen->nmr_dokumen = null;
        $dokumen->nama_dokumen = null;
        $dokumen->id_kategori = null;
        $dokumen->id_stts = null;
        $dokumen->user_id = null;

        $query_kategori = $this->ktgr_dokumen_model->get();
        $query_stts = $this->stts_m->get();
        $query_user = $this->user_m->get();
        $query_lemari = $this->lemari_m->get();
        $query_bantex = $this->bantex_model->get();

        $lemari[null] = '- Pilih -';
        foreach ($query_lemari->result() as $lmr) {
            $lemari[$lmr->id_lemari] = $lmr->kode_lemari;
        }

        $bantex[null] = '- Pilih -';
        foreach ($query_bantex->result() as $btx) {
            $bantex[$btx->id_bantex] = $btx->nmr_bantex;
        }

        $stts_dokumen[null] = '- Pilih -';
        foreach ($query_stts->result() as $stts) {
            $stts_dokumen[$stts->id_stts] = $stts->stts_dokumen;
        }

        $data = array(
            'judul' => 'Dokumen Keluar',
            'page' => 'add',
            'row' => $dokumen,
            'kategori' => $query_kategori,
            'status' => $query_stts,
            'lemari' => $lemari,
            'bantex' => $bantex,
            'stts_dokumen' => $stts_dokumen,
            'user' => $query_user,
            'selectedlemari' => null,
            'selectedbantex' => null,
            'selected_stts_dokumen' => null
           
        );
        $this->template->load('template', 'dokumen/dkmn_klr/dkmn_klr_form', $data);
    }

    public function edit($id)
    {
        $query = $this->dkmn_klr_model->get($id);
        if ($query->num_rows() > 0) {
            $dokumen = $query->row();
            $query_kategori = $this->ktgr_dokumen_model->get();

            $query_lemari = $this->lemari_m->get();
            $lemari[null] = '- Pilih -';
            foreach ($query_lemari->result() as $lmr) {
                $lemari[$lmr->id_lemari] = $lmr->kode_lemari;
            }

            $query_bantex = $this->bantex_model->get();
            $bantex[null] = '- Pilih -';
            foreach ($query_bantex->result() as $btx) {
            $bantex[$btx->id_bantex] = $btx->nmr_bantex;
            }

            $query_stts = $this->stts_m->get();
            $stts_dokumen[null] = '- Pilih -';
            foreach ($query_stts->result() as $stts) {
            $stts_dokumen[$stts->id_stts] = $stts->stts_dokumen;
            }

            $query_user = $this->user_m->get();
            $data = array(
                'judul' => 'Dokumen Keluar',
                'page' => 'edit',
                'row' => $dokumen,
                'kategori' => $query_kategori,
                'status' => $query_stts,
                'lemari' => $lemari,
                'bantex' => $bantex,
                'stts_dokumen' => $stts_dokumen,
                'user' => $query_user,
                'selectedlemari' => $dokumen->id_lemari,
                'selectedbantex' => $dokumen->id_bantex,
                'selected_stts_dokumen' => $dokumen->id_stts
            );
            $this->template->load('template', 'dokumen/dkmn_klr/dkmn_klr_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('dkmn_klr') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        $config['upload_path']          = './uploads/file/';
        $config['allowed_types']        = 'pdf|jpg';
        $config['max_size']             = 2048;
        $config['file_name']            = $post['nama_dok'] . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (isset($_POST['add'])) {
            if ($this->dkmn_klr_model->check_kode_dokumen($post['kode_dok'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor dokumen $post[kode_dok] sudah ada");
                redirect('dkmn_klr/add');
            } else {
                if (@$_FILES['file_dok']['name'] != null) {
                    if ($this->upload->do_upload('file_dok')) {
                        $post['file_dok'] = $this->upload->data('file_name');
                        $this->dkmn_klr_model->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('dkmn_klr');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('dkmn_klr/add');
                    }
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->dkmn_klr_model->check_kode_dokumen($post['kode_dok'], $post['id_dok'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor dokumen $post[kode_dok] sudah ada");
                redirect('dokumen/edit/' . $post['id_dok']);
            } else {
                if (@$_FILES['file_dok']['name'] != null) {
                    if ($this->upload->do_upload('file_dok')) {

                        $dokumen = $this->dkmn_klr_model->get($post['id_dok'])->row();
                        if ($dokumen->file != null) {
                            $target_file = './uploads/file/' . $dokumen->file;
                            unlink($target_file);
                        }

                        $post['file_dok'] = $this->upload->data('file_name');
                        $this->dkmn_klr_model->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('dkmn_klr');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('dkmn_klr/edit');
                    }
                } else {
                    $post['file_dok'] = null;
                    $this->dkmn_klr_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('dkmn_klr');
                }
            }
        }
    }

    public function del($id)
    {
        $dokumen = $this->dkmn_klr_model->get($id)->row();
        if ($dokumen->file != null) {
            $target_file = './uploads/file/' . $dokumen->file;
            unlink($target_file);
        }

        $this->dkmn_klr_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('dkmn_klr');
    }
}