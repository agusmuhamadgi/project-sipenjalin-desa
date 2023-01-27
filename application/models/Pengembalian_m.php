<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_m extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tb_pengembalian')
            ->join('tb_peminjaman', 'tb_pengembalian.id_peminjaman = tb_peminjaman.id_peminjaman')
            ->join('tb_pengguna', 'tb_peminjaman.id_pengguna = tb_pengguna.id_pengguna')
            ->join('tb_sarpras', 'tb_peminjaman.id_sarpras = tb_sarpras.id_sarpras');
        if ($id != null) {
            $this->db->where('id_pengembalian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pengembalian_available($id = null)
    {
        $query = $this->db->query("SELECT * FROM tb_peminjaman 
        JOIN tb_pengguna ON tb_peminjaman.id_pengguna = tb_pengguna.id_pengguna
        JOIN tb_sarpras ON tb_peminjaman.id_sarpras = tb_sarpras.id_sarpras
        WHERE id_peminjaman NOT IN (SELECT id_peminjaman FROM tb_pengembalian)
        AND tb_peminjaman.status_peminjaman = '1' ");
        return $query;
    }

    public function get_data_by_user()
    {
        $id = $this->fungsi->user_login()->id_pengguna;
        $query = $this->db->query("SELECT * FROM tb_pengembalian
        JOIN tb_peminjaman ON tb_pengembalian.id_peminjaman = tb_peminjaman.id_peminjaman
        JOIN tb_pengguna ON tb_peminjaman.id_pengguna = tb_pengguna.id_pengguna
        JOIN tb_sarpras ON tb_peminjaman.id_sarpras = tb_sarpras.id_sarpras
        WHERE tb_peminjaman.id_pengguna = '$id' ");
        return $query;
    }

    public function add_pengembalian($post)
    {
        $params = array(
            'id_peminjaman' => $post['pinjam'],
            'kondisi' => $post['kondisi'],
            'pencatat' => $this->fungsi->user_login()->nama_pengguna,
            'denda' => $post['denda']
        );
        $this->db->insert('tb_pengembalian', $params);
    }

    public function edit_pengembalian($post)
    {
        $params = array(
            'kondisi' => $post['kondisi'],
            'pencatat' => $this->fungsi->user_login()->nama_pengguna
        );

        $this->db->where('id_pengembalian', $post['id_pengembalian']);
        $this->db->update('tb_pengembalian', $params);
    }

    public function delete_pengembalian($id)
    {
        $this->db->where('id_pengembalian', $id);
        $this->db->delete('tb_pengembalian');
    }
}
