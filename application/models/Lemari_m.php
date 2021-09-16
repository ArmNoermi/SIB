<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lemari_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('lemari');
        if ($id != null) {
            $this->db->where('id_lemari', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'kode_lemari' => $post['kode_lemari']
        ];
        $this->db->insert('lemari', $params);
    }

    public function edit($post)
    {
        $params = [
            'kode_lemari' => $post['kode_lemari'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_lemari', $post['id_lemari']);
        $this->db->update('lemari', $params);
    }

    public function del($id)
    {
        $this->db->where('id_lemari', $id);
        $this->db->delete('lemari');
    }
}
