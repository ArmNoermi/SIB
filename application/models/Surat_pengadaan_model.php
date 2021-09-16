<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pengadaan_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('trx_surat_pengadaan');
        $this->db->join('tbl_ktgr_pengadaan', 'tbl_ktgr_pengadaan.id_kategori = trx_surat_pengadaan.id_kategori');
        $this->db->join('lemari', 'lemari.id_lemari = trx_surat_pengadaan.id_lemari');
        $this->db->join('tbl_bantex', 'tbl_bantex.id_bantex = trx_surat_pengadaan.id_bantex');
        $this->db->join('stts_dokumen', 'stts_dokumen.id_stts = trx_surat_pengadaan.id_stts');
        $this->db->join('user', 'user.user_id = trx_surat_pengadaan.user_id');
        if ($id != null) {
            $this->db->where('id_surat', $id);
        }
        $this->db->order_by('nmr_surat', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'tgl_surat' => $post['tgl_surat'],
            'nmr_surat' => $post['nmr_surat'],
            'nm_surat' => $post['nm_surat'],
            'pengirim' => $post['pengirim'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_surat'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'file' => $post['file_surat'],
        ];
        $this->db->insert('trx_surat_pengadaan', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_surat' => $post['tgl_surat'],
            'nmr_surat' => $post['nmr_surat'],
            'nm_surat' => $post['nm_surat'],
            'pengirim' => $post['pengirim'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_surat'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['file_surat'] != null) {
            $params['file'] = $post['file_surat'];
        }
        $this->db->where('id_surat', $post['id_surat']);
        $this->db->update('trx_surat_pengadaan', $params);
    }

    function check_nmr_surat($nmr, $id = null)
    {
        $this->db->from('trx_surat_pengadaan');
        $this->db->where('nmr_surat', $nmr);
        if ($id != null) {
            $this->db->where('id_surat !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_surat', $id);
        $this->db->delete('trx_surat_pengadaan');
    }
}