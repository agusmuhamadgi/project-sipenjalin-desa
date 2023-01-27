<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_m extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tb_peminjaman')
            ->join('tb_pengguna', 'tb_peminjaman.id_pengguna = tb_pengguna.id_pengguna')
            ->join('tb_sarpras', 'tb_peminjaman.id_sarpras = tb_sarpras.id_sarpras');
        if ($id != null) {
            $this->db->where('id_peminjaman', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_data_by_user()
    {
        $id = $this->fungsi->user_login()->id_pengguna;
        $query = $this->db->query("SELECT * FROM tb_peminjaman
        JOIN tb_pengguna ON tb_peminjaman.id_pengguna = tb_pengguna.id_pengguna
        JOIN tb_sarpras ON tb_peminjaman.id_sarpras = tb_sarpras.id_sarpras
        WHERE tb_peminjaman.id_pengguna = '$id' ");
        return $query;
    }

    public function add_peminjaman($post)
    {
        $params = array(
            'id_sarpras' => $post['sarpras'],
            'id_pengguna' => $post['nama'],
            'tgl_pinjam' => $post['pinjam'],
            'tgl_rencana_kembali' => $post['kembali'],
            'kegunaan' => $post['tujuan'],
            'jumlah_pinjam' => $post['jumlah']
        );
        $this->db->insert('tb_peminjaman', $params);
    }

    public function accept_peminjaman($id)
    {
        $params['status_peminjaman'] = '1';
        $params['penanggung_jawab'] = $this->fungsi->user_login()->nama_pengguna;

        $this->db->where('id_peminjaman', $id);
        $this->db->update('tb_peminjaman', $params);
    }

    public function reject_peminjaman($id)
    {
        $params['status_peminjaman'] = '0';
        $params['penanggung_jawab'] = $this->fungsi->user_login()->nama_pengguna;

        $this->db->where('id_peminjaman', $id);
        $this->db->update('tb_peminjaman', $params);
    }

    public function cancel_peminjaman($id)
    {
        $params['status_peminjaman'] = '3';
        $params['penanggung_jawab'] = $this->fungsi->user_login()->nama_pengguna;
        $params['keterangan'] = "Dibatalkan oleh " . $this->fungsi->user_login()->nama_pengguna;

        $this->db->where('id_peminjaman', $id);
        $this->db->update('tb_peminjaman', $params);
    }

    public function edit_keterangan($post)
    {
        $params['keterangan'] = $post['keteranganpinjam'];

        $this->db->where('id_peminjaman', $post['id_peminjaman']);
        $this->db->update('tb_peminjaman', $params);
    }
}
