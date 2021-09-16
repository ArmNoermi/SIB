<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['judul'] = 'Pengguna';
        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'users/users_data', $data);
    }

    public function add()
    {
        $users = new stdClass();
        $users->user_id = null;
        $users->username = null;
        $users->password = null;
        $users->name = null;
        $users->jeniskelamin = null;
        $users->jabatan = null;
        $users->email = null;
        $users->address = null;
        $users->level = null;
        $users->status = null;

        $query_users = $this->user_m->get();
        // $query_unit = $this->unit_m->get();
        // $unit[null] = '- Pilih -';
        // foreach ($query_unit->result() as $unt) {
        //     $unit[$unt->unit_id] = $unt->name;
        // }

        $data = array(
            'judul' => 'Pengguna',
            'page' => 'add',
            'row' => $users,
            'users' => $query_users,
            // 'unit' => $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'users/users_form', $data);
    }

    public function edit($id)
    {
        $query_users = $this->user_m->get($id);
        if ($query_users->num_rows() > 0) {
            $users = $query_users->row();

            $data = array(
                'judul' => 'Dokumen Masuk',
                'page' => 'edit',
                'row' => $users,
                'users' => $query_users,
            );
            $this->template->load('template', 'users/users_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('users') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);

        $config['upload_path']          = './uploads/profile/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|';
        $config['max_size']             = 2048;
        $config['file_name']            = $post['fullname'] . '-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (isset($_POST['add'])) {
           
                if (@$_FILES['file_foto']['name'] != null) {
                    if ($this->upload->do_upload('file_foto')) {
                        $post['file_foto'] = $this->upload->data('file_name');
                        $this->user_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('users');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('users/add');
                    }
                }
            
        } else if (isset($_POST['edit'])) {
            
                if (@$_FILES['file_foto']['name'] != null) {
                    if ($this->upload->do_upload('file_foto')) {

                        $users = $this->user_m->get($post['user_id'])->row();
                        if ($users->foto != null) {
                            $target_file = './uploads/profile/' . $users->foto;
                            unlink($target_file);
                        }

                        $post['file_foto'] = $this->upload->data('file_name');
                        $this->user_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('users');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('users/edit');
                    }
                } else {
                    $post['file_foto'] = null;
                    $this->user_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('users');
                }
            
        }
    }

    public function del($id)
    {
        $users = $this->user_m->get($id)->row();
        if ($users->foto != null) {
            $target_file = './uploads/profile/' . $users->foto;
            unlink($target_file);
        }

        $this->user_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('users');
    }

    public function profil_saya()
	{
        $data['judul'] = 'Profil Saya';
        $data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/profil_saya', $data);
	}

    // function barcode_qrcode($id)
    // {
    //     $data['row'] = $this->item_m->get($id)->row();
    //     $this->template->load('template', 'product/item/barcode_qrcode', $data);
    // }

    // function barcode_print($id)
    // {
    //     $data['row'] = $this->item_m->get($id)->row();
    //     $html = $this->load->view('product/item/barcode_print', $data, true);
    //     $this->fungsi->PdfGenerator($html, 'barcode-', $data['row']->barcode, 'A4', 'landscape');
    // }

    // function qrcode_print($id)
    // {
    //     $data['row'] = $this->item_m->get($id)->row();
    //     $html = $this->load->view('product/item/qrcode_print', $data, true);
    //     $this->fungsi->PdfGenerator($html, 'qrcode-', $data['row']->barcode, 'A4', 'potrait');
    // }
}
