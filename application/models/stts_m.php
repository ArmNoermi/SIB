<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stts_m extends CI_Model
{
    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('stts_dokumen');
        // $this->db->join('trx_dokumen', 'trx_dokumen.id_kategori = kategori.id_kategori');
        if ($id != null) {
            $this->db->where('id_stts', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_jns($id = null)
    {
        // $this->db->select('*');
        $this->db->from('jns_dokumen');
        // $this->db->join('trx_dokumen', 'trx_dokumen.id_kategori = kategori.id_kategori');
        if ($id != null) {
            $this->db->where('id_jns', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}