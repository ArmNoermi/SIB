<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dkmn_msk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['dkmn_msk_model', 'ktgr_dokumen_model', 'lemari_m', 'user_m', 'stts_m', 'bantex_model']);
    }

    function get_ajax()
    {
        $list = $this->dkmn_msk_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $dokumen) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $dokumen->kode_dokumen . '<br><a href="' . site_url('dokumen/barcode_qrcode/' . $dokumen->id_dokumen) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $dokumen->nama_dokumen;
            $row[] = $dokumen->name;
            $row[] = $dokumen->nama_kategori;
            $row[] = $dokumen->kode_lemari;
            // $row[] = indo_currency($dokumen->price);
            // $row[] = $dokumen->stock;
            $row[] = $dokumen->file != null ?  base_url('uploads/file/' . $dokumen->file) : null;
            // add html for action
            $row[] = '<a href="' . site_url('dokumen/edit/' . $dokumen->id_dokumen) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="' . site_url('dokumen/del/' . $dokumen->id_dokumen) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->dkmn_msk_model->count_all(),
            "recordsFiltered" => $this->dkmn_msk_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    public function index()
    {
        $data['judul'] = 'Dokumen Masuk';
        $data['row'] = $this->dkmn_msk_model->get();
        $this->template->load('template', 'dokumen/dkmn_msk/dkmn_msk_data', $data);
    }


    public function add()
    {
        $dokumen = new stdClass();
        $dokumen->id_dokumen = null;
        $dokumen->tgl_dokumen = null;
        $dokumen->kode_dokumen = null;
        $dokumen->asal_dokumen = null;
        // $dokumen->nmr_dokumen = null;
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
            'judul' => 'Dokumen Masuk',
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
        $this->template->load('template', 'dokumen/dkmn_msk/dkmn_msk_form', $data);
    }

    public function edit($id)
    {
        $query = $this->dkmn_msk_model->get($id);
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
                'judul' => 'Dokumen Masuk',
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
            $this->template->load('template', 'dokumen/dkmn_msk/dkmn_msk_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('dkmn_msk') . "';</script>";
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
            if ($this->dkmn_msk_model->check_kode_dokumen($post['kode_dok'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nomor dokumen $post[kode_dok] sudah ada");
                redirect('dkmn_msk/add');
            } else {
                if (@$_FILES['file_dok']['name'] != null) {
                    if ($this->upload->do_upload('file_dok')) {
                        $post['file_dok'] = $this->upload->data('file_name');
                        $this->dkmn_msk_model->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('dkmn_msk');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('dkmn_msk/add');
                    }
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->dkmn_msk_model->check_kode_dokumen($post['kode_dok'], $post['id_dok'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode dokumen $post[kode_dok] sudah ada");
                redirect('dkmn_msk/edit/' . $post['id_dok']);
            } else {
                if (@$_FILES['file_dok']['name'] != null) {
                    if ($this->upload->do_upload('file_dok')) {

                        $dokumen = $this->dkmn_msk_model->get($post['id_dok'])->row();
                        if ($dokumen->file != null) {
                            $target_file = './uploads/file/' . $dokumen->file;
                            unlink($target_file);
                        }

                        $post['file_dok'] = $this->upload->data('file_name');
                        $this->dkmn_msk_model->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('dkmn_msk');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('dkmn_msk/edit');
                    }
                } else {
                    $post['file_dok'] = null;
                    $this->dkmn_msk_model->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('dkmn_msk');
                }
            }
        }
    }

    public function del($id)
    {
        $dokumen = $this->dkmn_msk_model->get($id)->row();
        if ($dokumen->file != null) {
            $target_file = './uploads/file/' . $dokumen->file;
            unlink($target_file);
        }

        $this->dkmn_msk_model->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('dkmn_msk');
    }

    function barcode_qrcode($id)
    {
        $data['row'] = $this->dkmn_msk_model->get($id)->row();
        $this->template->load('template', 'dokumen/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['row'] = $this->dkmn_msk_model->get($id)->row();
        $html = $this->load->view('dokumen/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-', $data['row']->kode_dokumen, 'A4', 'landscape');
    }

    function qrcode_print($id)
    {
        $data['row'] = $this->dkmn_msk_model->get($id)->row();
        $html = $this->load->view('dokumen/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'qrcode-', $data['row']->kode_dokumen, 'A4', 'potrait');
    }

    // function view_dokumen($id)
    // {
    //     $data['row'] = $this->dkmn_msk_model->get($id)->row();
    //     $this->load->view('dokumen/view_dokumen');
    //     $this->fungsi->PdfGenerator($html, 'dokumen-pengadaan-', $data['row']->kode_dokumen, 'A4', 'potrait');
    // }
}
