<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dkmn_klr_model extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('trx_dkmn_klr');
        $this->db->join('tbl_ktgr_dokumen', 'tbl_ktgr_dokumen.id_kategori = trx_dkmn_klr.id_kategori');
        $this->db->join('lemari', 'lemari.id_lemari = trx_dkmn_klr.id_lemari');
        $this->db->join('tbl_bantex', 'tbl_bantex.id_bantex = trx_dkmn_klr.id_bantex');
        $this->db->join('stts_dokumen', 'trx_dkmn_klr.id_stts = stts_dokumen.id_stts');
        $this->db->join('user', 'user.user_id = trx_dkmn_klr.user_id');
        if ($id != null) {
            $this->db->where('id_dokumen', $id);
        }
        $this->db->order_by('kode_dokumen', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'tgl_dokumen' => $post['tgl_dokumen'],
            'kode_dokumen' => $post['kode_dok'],
            'nama_dokumen' => $post['nama_dok'],
            'tujuan' => $post['tujuan'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_dokumen'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'file' => $post['file_dok'],
        ];
        $this->db->insert('trx_dkmn_klr', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_dokumen' => $post['tgl_dokumen'],
            'kode_dokumen' => $post['kode_dok'],
            'nama_dokumen' => $post['nama_dok'],
            'tujuan' => $post['tujuan'],
            'user_id' => $post['pengupload'],
            'id_kategori' => $post['kategori'],
            'id_stts' => $post['stts_dokumen'],
            'id_lemari' => $post['lemari'],
            'id_bantex' => $post['bantex'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['file_dok'] != null) {
            $params['file'] = $post['file_dok'];
        }
        $this->db->where('id_dokumen', $post['id_dok']);
        $this->db->update('trx_dkmn_klr', $params);
    }

    function check_kode_dokumen($kode, $id = null)
    {
        $this->db->from('trx_dkmn_klr');
        $this->db->where('kode_dokumen', $kode);
        if ($id != null) {
            $this->db->where('id_dokumen !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_dokumen', $id);
        $this->db->delete('trx_dkmn_klr');
    }

}