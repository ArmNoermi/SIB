<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['surat_pengadaan_model', 'ktgr_pengadaan_model', 'lemari_m', 'user_m', 'stts_m', 'bantex_model']);   
    }

    public function index()
    {
        $data['judul'] = 'Surat Pengadaan';
        $data['row'] = $this->surat_pengadaan_model->get();
        $this->template->load('template', 'dokumen/surat_pengadaan/surat_pengadaan_data', $data);
    }

    public function add()
    {
        $surat = new stdClass();
        $surat->id_surat = null;
        $surat->tgl_surat = null;
        $surat->pengirim = null;
        $surat->nmr_surat = null;
        $surat->nm_surat = null;
        $surat->id_kategori = null;
        $surat->user_id = null;

        $query_kategori = $this->ktgr_pengadaan_model->get();
        $query_user = $this->user_m->get();
        $query_lemari = $this->lemari_m->get();
        $query_bantex = $this->bantex_model->get();
        $query_status = $this->stts_m->get();

        $lemari[null] = '- Pilih -';
        foreach ($query_lemari->result() as $lmr) {
            $lemari[$lmr->id_lemari] = $lmr->kode_lemari;
        }

        $bantex[null] = '- Pilih -';
        foreach ($query_bantex->result() as $btx) {
            $bantex[$btx->id_bantex] = $btx->nmr_bantex;
        }

        $stts_surat[null] = '- Pilih -';
        foreach ($query_status->result() as $stts) {
            $stts_surat[$stts->id_stts] = $stts->stts_dokumen;
        }



        $data = array(
            'judul' => 'Surat Pengadaan',
            'page' => 'add',
            'row' => $surat,
            'kategori' => $query_kategori,
            'lemari' => $lemari,
            'bantex' => $bantex,
            'stts_surat' => $stts_surat,
            'user' => $query_user,
            'selectedlemari' => null,
            'selectedbantex' => null,
            'selectedstatus' => null
           
        );
        $this->template->load('template', 'dokumen/surat_pengadaan/surat_pengadaan_form', $data);
    }

    public function edit($id)
    {
        $query = $this->surat_pengadaan_model->get($id);
        if ($query->num_rows() > 0) {
            $surat = $query->row();
            $query_kategori = $this->ktgr_pengadaan_model->get();

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

            $query_status = $this->stts_m->get();
            $stts_surat[null] = '- Pilih -';
            foreach ($query_status->result() as $stts) {
            $stts_surat[$stts->id_stts] = $stts->stts_dokumen;
            }

            $query_user = $this->user_m->get();
            $data = array(
                'judul' => 'Surat Pengadaan',
                'page' => 'edit',
                'row' => $surat,
                'kategori' => $query_kategori,
                'lemari' => $lemari,
                'bantex' => $bantex,
                'stts_surat' => $stts_surat,
                'user' => $query_user,
                'selectedlemari' => $surat->id_lemari,
                'selectedbantex' => $surat->id_bantex,
                'selectedstatus' => $surat->id_stts
            );
            $this->template->load('template', 'dokumen/surat_pengadaan/surat_pengadaan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('surat_pengadaan') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        $config['upload_path']          = './uploads/file/';
        $config['allowed_types']        = 'pdf|jpg';
        $config['max_size']             = 2048;
        $config['file_name']            = $post['nm_surat'] . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (isset($_POST['add'])) {
            if ($this->surat_pengadaan_model->check_nmr_surat($post['nmr_surat'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor surat $post[nmr_surat] sudah ada");
                redirect('surat_pengadaan/add');
            } else {
                if (@$_FILES['file_surat']['name'] != null) {
                    if ($this->upload->do_upload('file_surat')) {
                        $post['file_surat'] = $this->upload->data('file_name');
                        $this->surat_pengadaan_model->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('surat_pengadaan');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('surat_pengadaan/add');
                    }
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->surat_pengadaan_model->check_nmr_surat($post['nmr_surat'], $post['id_surat'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor surat $post[nmr_surat] sudah ada");
                redirect('surat_pengadaan/edit/' . $post['id_surat']);
            } else {
                if (@$_FILES['file_surat']['name'] != null) {
                    if ($this->upload->do_upload('file_surat')) {

                        $surat = $this->surat_pengadaan_model->get($post['id_surat'])->row();
                        if ($surat->file != null) {
                            $target_file = './uploads/file/' . $surat->file;
                            unlink($target_file);
                        }

                        $post['file_surat'] = $this->upload->data('file_name');
                        $this->surat_pengadaan_model->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('surat_pengadaan');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('surat_pengadaan/edit');
                    }
                } else {
                    $post['file_surat'] = null;
                    $this->surat_pengadaan_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('surat_pengadaan');
                }
            }
        }
    }

    public function del($id)
    {
        $surat = $this->surat_pengadaan_model->get($id)->row();
        if ($surat->file != null) {
            $target_file = './uploads/file/' . $surat->file;
            unlink($target_file);
        }

        $this->surat_pengadaan_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('surat_pengadaan');
    }

}