<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();
        check_is_admin();

        $this->load->model('pengguna_m');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['row'] = $this->pengguna_m->get_data();
        $this->template->load('template', 'pengguna/pengguna_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone Pengguna', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir Pengguna', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Akses Pengguna', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );
        $this->form_validation->set_message(
            'max_length',
            '%s Terlalu Panjang!'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'pengguna/pengguna_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengguna_m->add_pengguna($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            	alert('Data berhasil Disimpan')
            	</script>";
                echo "<script>
            	window.location='" . site_url('pengguna') . "'
            	</script>";
            } else {
                echo "<script>
            	alert('Data gagal Disimpan')
            	</script>";
                echo "<script>
            	window.location='" . site_url('pengguna/add') . "'
            	</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone Pengguna', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir Pengguna', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir Pengguna', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pengguna', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Akses Pengguna', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );
        $this->form_validation->set_message(
            'max_length',
            '%s Terlalu Panjang!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->pengguna_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'pengguna/pengguna_edit', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('pengguna') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengguna_m->edit_pengguna($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            	alert('Data berhasil Diubah')
            	</script>";
                echo "<script>
            	window.location='" . site_url('pengguna') . "'
            	</script>";
            } else {
                echo "<script>
            	alert('Data gagal Diubah')
            	</script>";
                echo "<script>
            	window.location='" . site_url('pengguna/edit') . "'
            	</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->pengguna_m->delete_pengguna($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data berhasil Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('pengguna') . "'
            </script>";
        } else {
            echo "<script>
            alert('Data gagal Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('pengguna') . "'
            </script>";
        }
    }

    public function edit_profile()
    {
        $post = $this->input->post(null, TRUE);
        $this->pengguna_m->edit_pengguna($post);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            	alert('Data berhasil Diubah')
            	</script>";
            echo "<script>
            	window.location='" . site_url('dashboard') . "'
            	</script>";
        } else {
            echo "<script>
            	alert('Data gagal Diubah')
            	</script>";
            echo "<script>
            	window.location='" . site_url('dashboard') . "'
            	</script>";
        }
    }

    public function print_pengguna()
    {
        $data['row'] = $this->pengguna_m->get_data();
        $fileHtml = $this->load->view('pengguna/pengguna_print', $data, true);
        $this->fungsi->pdfGenerator($fileHtml, 'Pengguna', 'landscape', 'A4');
    }
}
