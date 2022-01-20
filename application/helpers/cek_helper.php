<?php
function login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_pengguna');
    if (!$user_session) {
        redirect('admin/login/index');
    }
}
function akses()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('username_admin');
    if (!$user_session) {
        redirect($_SERVER['HTTP_REFERER']);
    }
}