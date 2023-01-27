<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_m extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tb_kegiatan');
        if ($id != null) {
            $this->db->where('id_kegiatan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_kegiatan($post)
    {
        $params['nama_kegiatan'] = $post['nama'];

        $this->db->insert('tb_kegiatan', $params);
    }

    public function edit_kegiatan($post)
    {
        $params['nama_kegiatan'] = $post['nama'];

        $this->db->where('id_kegiatan', $post['id_kegiatan']);
        $this->db->update('tb_kegiatan', $params);
    }

    public function delete_kegiatan($post)
    {
        $this->db->where('id_kegiatan', $post);
        $this->db->delete('tb_kegiatan');
    }
}
