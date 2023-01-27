<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_m extends CI_Model
{
    public function login($post)
    {
        $this->db->from('tb_pengguna');
        $this->db->where('nik', $post['nik']);
        $this->db->where('tgl_lahir', $post['ttl']);
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id = null)
    {
        $this->db->from('tb_pengguna');
        if ($id != null) {
            $this->db->where('id_pengguna', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_pengguna($post)
    {
        $tgl = $post['tgl_lahir'];
        $char = "-";
        $trim = str_replace($char, '', $tgl);
        $d = substr($trim, 6, 2);
        $m = substr($trim, 4, 2);
        $y = substr($trim, 0, 4);
        $date = $d . $m . $y;
        $params = array(
            'NIK' => $post['nik'],
            'nama_pengguna' => $post['nama'],
            'jenis_kelamin' => $post['jk'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $date,
            'no_hp' => $post['no_hp'],
            'level' => $post['level'],
            'alamat' => $post['alamat']
        );
        $this->db->insert('tb_pengguna', $params);
    }

    public function edit_pengguna($post)
    {
        $tgl = $post['tgl_lahir'];
        $char = "-";
        $trim = str_replace($char, '', $tgl);
        $d = substr($trim, 6, 2);
        $m = substr($trim, 4, 2);
        $y = substr($trim, 0, 4);
        $date = $d . $m . $y;
        $params = array(
            'NIK' => $post['nik'],
            'nama_pengguna' => $post['nama'],
            'jenis_kelamin' => $post['jk'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $date,
            'no_hp' => $post['no_hp'],
            'level' => $post['level'],
            'alamat' => $post['alamat']
        );
        $this->db->where('id_pengguna', $post['id_pengguna']);
        $this->db->update('tb_pengguna', $params);
    }

    public function delete_pengguna($post)
    {
        $this->db->where('id_pengguna', $post);
        $this->db->delete('tb_pengguna');
    }
}
