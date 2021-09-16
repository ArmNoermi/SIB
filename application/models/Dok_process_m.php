<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dok_process_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('dok_proses');
        if ($id != null) {
            $this->db->where('id_masuk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_masuk', $id);
        $this->db->delete('dok_proses');
    }

    public function get_dok_in()
    {
        $this->db->select('dok_proses.id_masuk, trx_dokumen.kode_dokumen, trx_dokumen.nama_dokumen, qty, date, dok_proses.diproses, trx_dokumen.id_dokumen');
        $this->db->from('dok_proses');
        $this->db->join('trx_dokumen', 'dok_proses.id_dokumen = trx_dokumen.id_dokumen');
        $this->db->where('type', 'in');
        $this->db->order_by('id_masuk', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_dok_in($post)
    {
        $params = [
            'id_dokumen' => $post['id_dokumen'],
            'type' => 'in',
            'qty' => $post['lem_suk'],
            'diproses' => 'selesai',
            'date' => $post['date'],
            'id_user' => $this->session->userdata('userid'),
        ];
        $this->db->insert('dok_proses', $params);
    }
}
