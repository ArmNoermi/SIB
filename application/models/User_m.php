<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'jeniskelamin' => $post['jk'],
            'jabatan' => $post['jabatan'],
            'email' => $post['email'],
            'address' => $post['address'] != "" ? $post['address'] : null,
            'level' => $post['level'],
            'status' => $post['status'],
            'foto' => $post['file_foto'] != null ? $post['file_foto'] : 'default.jpg',
        ];
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['fullname'],
            'username' => $post['username'],
            'jeniskelamin' => $post['jk'],
            'jabatan' => $post['jabatan'],
            'email' => $post['email'],
            'address' => $post['address'] != "" ? $post['address'] : null,
            'level' => $post['level'],
            'status' => $post['status'],
        ];

        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }

        if ($post['file_foto'] != null) {
            $params['foto'] = $post['file_foto'];
        }
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
