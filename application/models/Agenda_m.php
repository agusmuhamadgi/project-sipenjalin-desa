<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_m extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tb_agenda')
            ->join('tb_kegiatan', 'tb_agenda.id_kegiatan = tb_kegiatan.id_kegiatan')
            ->join('tb_pengguna', 'tb_agenda.id_pengguna = tb_pengguna.id_pengguna');
        $this->db->order_by("tgl_pelaksanaan", "asc");
        if ($id != null) {
            $this->db->where('id_agenda', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_data_available($id = null)
    {
        $this->db->from('tb_agenda')
            ->join('tb_kegiatan', 'tb_agenda.id_kegiatan = tb_kegiatan.id_kegiatan')
            ->join('tb_pengguna', 'tb_agenda.id_pengguna = tb_pengguna.id_pengguna');
        $this->db->where('tb_agenda.status', 'Belum');
        $this->db->order_by("tgl_pelaksanaan", "asc");
        if ($id != null) {
            $this->db->where('id_agenda', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_data_done($id = null)
    {
        $this->db->from('tb_agenda')
            ->join('tb_kegiatan', 'tb_agenda.id_kegiatan = tb_kegiatan.id_kegiatan')
            ->join('tb_pengguna', 'tb_agenda.id_pengguna = tb_pengguna.id_pengguna');
        // $this->db->where('tb_agenda.status', 'Selesai');
        $this->db->order_by("tgl_pelaksanaan", "asc");
        if ($id != null) {
            $this->db->where('id_agenda', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_agenda($post)
    {
        $params = array(
            'id_kegiatan' => $post['kegiatan'],
            'id_pengguna' => $post['pj'],
            'tujuan' => $post['tujuan'],
            'tgl_pelaksanaan' => $post['tgl'],
            'waktu_mulai' => $post['mulai'],
            'waktu_selesai' => $post['selesai'],
            'lokasi' => $post['lokasi'],
            'hadirin' => $post['hadirin'],
            'status' => $post['status']
        );
        $this->db->insert('tb_agenda', $params);
    }

    public function edit_agenda($post)
    {
        $params = array(
            'id_kegiatan' => $post['kegiatan'],
            'id_pengguna' => $post['pj'],
            'tujuan' => $post['tujuan'],
            'tgl_pelaksanaan' => $post['tgl'],
            'waktu_mulai' => $post['mulai'],
            'waktu_selesai' => $post['selesai'],
            'lokasi' => $post['lokasi'],
            'hadirin' => $post['hadirin'],
            'status' => $post['status']
        );
        $this->db->where('id_agenda', $post['id_agenda']);
        $this->db->update('tb_agenda', $params);
    }

    public function edit_notulen($post)
    {
        $params['notulen'] = $post['notulen'];

        $this->db->where('id_agenda', $post['id_agenda']);
        $this->db->update('tb_agenda', $params);
        // print_r($post);
    }

    public function delete_agenda($post)
    {
        $this->db->where('id_agenda', $post);
        $this->db->delete('tb_agenda');
    }
}
