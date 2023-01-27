<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();
        check_is_admin();

        $this->load->model('kegiatan_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->kegiatan_m->get_data();
        $this->template->load('template', 'kegiatan/kegiatan_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required');
        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'kegiatan/kegiatan_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kegiatan_m->add_kegiatan($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
				alert('Data berhasil Disimpan')
				</script>";
                echo "<script>
				window.location='" . site_url('kegiatan') . "'
				</script>";
            } else {
                echo "<script>
				alert('Data gagal Disimpan')
				</script>";
                echo "<script>
				window.location='" . site_url('kegiatan/add') . "'
				</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required');
        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->kegiatan_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'kegiatan/kegiatan_edit', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('kegiatan') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kegiatan_m->edit_kegiatan($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil Diubah')
                </script>";
                echo "<script>
                window.location='" . site_url('kegiatan') . "'
                </script>";
            } else {
                echo "<script>
                alert('Data gagal Diubah')
                </script>";
                echo "<script>
                window.location='" . site_url('kegiatan/edit') . "'
                </script>";
            }
        }
    }

    public function delete($id)
    {
        $this->kegiatan_m->delete_kegiatan($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data berhasil Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('kegiatan') . "'
            </script>";
        } else {
            echo "<script>
            alert('Data gagal Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('kegiatan') . "'
            </script>";
        }
    }
}
