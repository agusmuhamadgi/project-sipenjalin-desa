<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();
        check_is_admin();

        $this->load->model('pengembalian_m');
        $this->load->model('peminjaman_m');
        $this->load->model('sarpras_m');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['kembali'] = $this->pengembalian_m->get_data();
        $this->template->load('template', 'pengembalian/pengembalian_data', $data);
    }


    public function add($id)
    {
        $this->form_validation->set_rules('pinjam', 'Data Peminjaman', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi Peminjaman', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->peminjaman_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['pinjam'] = $query->row();
                $this->template->load('template', 'pengembalian/pengembalian_add', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('peminjaman') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengembalian_m->add_pengembalian($post);
            $this->sarpras_m->update_stock_in($post['pinjam']);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Berhasil konfirmasi pengembalian!')
                </script>";
                echo "<script>
                window.location='" . site_url('pengembalian') . "'
                </script>";
            } else {
                echo "<script>
                alert('Gagal konfirmasi pengembalian!')
                </script>";
                echo "<script>
                window.location='" . site_url('pengembalian/add') . "'
                </script>";
            }
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('kondisi', 'Kondisi Peminjaman', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->pengembalian_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'pengembalian/pengembalian_edit', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('pengembalian') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengembalian_m->edit_pengembalian($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Berhasil mengubah data!')
                </script>";
                echo "<script>
                window.location='" . site_url('pengembalian') . "'
                </script>";
            } else {
                echo "<script>
                alert('Gagal mengubah data!')
                </script>";
                echo "<script>
                window.location='" . site_url('pengembalian/edit') . "'
                </script>";
            }
        }
    }

    public function delete($id)
    {
        $this->pengembalian_m->delete_pengembalian($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data berhasil Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('pengembalian') . "'
            </script>";
        } else {
            echo "<script>
            alert('Data gagal Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('pengembalian') . "'
            </script>";
        }
    }

    public function print_pengembalian()
    {
        $data['row'] = $this->pengembalian_m->get_data();
        $fileHtml = $this->load->view('pengembalian/pengembalian_print', $data, true);
        $this->fungsi->pdfGenerator($fileHtml, 'Pengembalian', 'landscape', 'A4');
    }
}
