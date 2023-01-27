<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();
        check_is_admin();

        $this->load->model('sarpras_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->sarpras_m->get_data();
        $this->template->load('template', 'sarpras/sarpras_data', $data);
    }

    public function add()
    {
        $this->template->load('template', 'sarpras/sarpras_add');
        $this->form_validation->set_rules('nama', 'Nama Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Kepemilikan Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Sarana & Prasarana', 'required');
        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'sarpras/sarpras_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->sarpras_m->add_sarpras($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            	alert('Data berhasil Disimpan')
            	</script>";
                echo "<script>
            	window.location='" . site_url('sarpras') . "'
            	</script>";
            } else {
                echo "<script>
            	alert('Data gagal Disimpan')
            	</script>";
                echo "<script>
            	window.location='" . site_url('sarpras/add') . "'
            	</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Kepemilikan Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('stok', 'Stok Tersedia Sarana & Prasarana', 'required');
        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->sarpras_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'sarpras/sarpras_edit', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('sarpras') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->sarpras_m->edit_sarpras($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
				alert('Data berhasil Diubah')
				</script>";
                echo "<script>
				window.location='" . site_url('sarpras') . "'
				</script>";
            } else {
                echo "<script>
				alert('Data gagal Diubah')
				</script>";
                echo "<script>
				window.location='" . site_url('sarpras/edit') . "'
				</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->sarpras_m->delete_sarpras($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data berhasil Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('sarpras') . "'
            </script>";
        } else {
            echo "<script>
            alert('Data gagal Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('sarpras') . "'
            </script>";
        }
    }
}
