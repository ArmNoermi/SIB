<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('auth_sub_menu');
        $this->db->join('auth_menu_user', 'auth_menu_user.id_menu = auth_sub_menu.id_menu');
        if ($id != null) {
            $this->db->where('id_sub', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_menu' => $post['menu'],
            'judul' => $post['judul'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'aktif' => $post['aktif'],
        ];
        $this->db->insert('auth_sub_menu', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_menu' => $post['menu'],
            'judul' => $post['judul'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'aktif' => $post['aktif'],
        ];
        $this->db->where('id_sub', $post['id_sub']);
        $this->db->update('auth_sub_menu', $params);
    }

    public function del($id)
    {
        $this->db->where('id_sub', $id);
        $this->db->delete('auth_sub_menu');
    }
}