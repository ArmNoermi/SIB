<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 2);
    return $d . '/' . $m . '/' . $y;
}

// function is_logged_in()
// {
//     $ci = get_instance();
//     if (!$ci->session->userdata('userid')) {
//         redirect('auth/login');
//     } else {
//         $level = $ci->session->userdata('level');
//         $menu = $ci->uri->segment(1);

//         $queryMenu = $ci->db->get_where('auth_menu_user', ['nama_menu' => $menu])->row_array();
//         $id_menu = $queryMenu['id_menu'];

//         $userAccess = $ci->db->get_where('auth_akses_user', [
//             'id_level' => $level,
//             'id_menu' => $id_menu
//         ]);

//         if ($userAccess->num_rows() < 1) {
//             redirect('auth/blocked');
//         }
//     }
// }
