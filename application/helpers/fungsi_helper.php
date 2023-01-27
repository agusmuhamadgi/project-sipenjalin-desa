<?php

function check_is_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_pengguna');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_is_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_pengguna');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_is_admin()
{
    $ci = &get_instance();
    $level = $ci->fungsi->user_login()->level;
    if ($level == 'Warga') {
        redirect('dashboard');
    }
}
