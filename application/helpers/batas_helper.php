<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/login');
    } else {
        $level = $ci->session->userdata('level');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('auth_sub_menu', ['judul' => $menu])->row_array();
        $id_menu = $queryMenu['id_menu'];

        $userAccess = $ci->db->get_where('auth_akses_user', [
            'id_level' => $level,
            'id_menu' => $id_menu
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}