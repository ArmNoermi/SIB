<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bantex_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tbl_bantex');
        if ($id != null) {
            $this->db->where('id_bantex', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nmr_bantex' => $post['nmr_bantex']
        ];
        $this->db->insert('tbl_bantex', $params);
    }

    public function edit($post)
    {
        $params = [
            'nmr_bantex' => $post['nmr_bantex']
        ];
        $this->db->where('id_bantex', $post['id_bantex']);
        $this->db->update('tbl_bantex', $params);
    }

    public function del($id)
    {
        $this->db->where('id_bantex', $id);
        $this->db->delete('tbl_bantex');
    }
}