<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_is_login();
        $this->load->view('login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model("pengguna_m");
            $query = $this->pengguna_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_pengguna' => $row->id_pengguna,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                alert('Login berhasil!');
                window.location='" . site_url('dashboard') . "'
                </script>";
            } else {
                echo "<script>
                alert('Login gagal!');
                window.location='" . site_url('auth/login') . "'
                </script>";
            }
        } else {
            echo "GAGAL LOGIN, HUBUNGI ADMIN.";
        }
    }

    public function logout()
    {
        $params    = array('id_pengguna', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
