<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras_m extends CI_Model
{
    public function get_data($id = null)
    {
        $this->db->from('tb_sarpras');
        if ($id != null) {
            $this->db->where('id_sarpras', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_sarpras($post)
    {
        $params = array(
            'nama_sarpras' => $post['nama'],
            'tgl_kepemilikan' => $post['tgl'],
            'jumlah' => $post['jumlah'],
            'stok_tersedia' => $post['jumlah']
        );
        $this->db->insert('tb_sarpras', $params);
        // print_r($params);
    }

    public function edit_sarpras($post)
    {
        $params = array(
            'nama_sarpras' => $post['nama'],
            'tgl_kepemilikan' => $post['tgl'],
            'jumlah' => $post['jumlah'],
            'stok_tersedia' => $post['stok']
        );
        $this->db->where('id_sarpras', $post['id_sarpras']);
        $this->db->update('tb_sarpras', $params);
    }

    public function delete_sarpras($post)
    {
        $this->db->where('id_sarpras', $post);
        $this->db->delete('tb_sarpras');
    }

    public function update_stock_out($id)
    {
        $query = $this->db->query("update tb_sarpras set tb_sarpras.stok_tersedia = tb_sarpras.stok_tersedia - (SELECT tb_peminjaman.jumlah_pinjam FROM tb_peminjaman where id_peminjaman = '$id' )");
        return $query;
    }

    public function update_stock_in($id)
    {
        $query = $this->db->query("update tb_sarpras set tb_sarpras.stok_tersedia = tb_sarpras.stok_tersedia + (SELECT tb_peminjaman.jumlah_pinjam FROM tb_peminjaman where id_peminjaman = '$id' )");
        return $query;
    }
}
