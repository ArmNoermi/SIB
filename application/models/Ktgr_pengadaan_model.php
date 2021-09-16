<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktgr_pengadaan_model extends CI_Model
{
    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('tbl_ktgr_pengadaan');
        // $this->db->join('trx_dokumen', 'trx_dokumen.id_kategori = kategori.id_kategori');
        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kat']
        ];
        $this->db->insert('tbl_ktgr_pengadaan', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kategori' => $post['nama_kat'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_kategori', $post['id_kat']);
        $this->db->update('tbl_ktgr_pengadaan', $params);
    }

    public function del($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('tbl_ktgr_pengadaan');
    }
}