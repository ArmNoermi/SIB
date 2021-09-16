<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('auth_menu_user');
        if ($id != null) {
            $this->db->where('id_menu', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_menu' => $post['nama_menu']
        ];
        $this->db->insert('auth_menu_user', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_menu' => $post['nama_menu'],
        ];
        $this->db->where('id_menu', $post['id_menu']);
        $this->db->update('auth_menu_user', $params);
    }

    public function del($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('auth_menu_user');
    }
}