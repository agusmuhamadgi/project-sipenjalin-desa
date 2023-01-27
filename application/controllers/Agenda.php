<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();
        check_is_admin();
        $this->load->model('agenda_m');
        $this->load->model('kegiatan_m');
        $this->load->model('pengguna_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->agenda_m->get_data();
        $this->template->load('template', 'agenda/agenda_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('pj', 'Penanggung Jawab Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Kegiatan', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('mulai', 'Waktu Mulai Kegiatan', 'required');
        $this->form_validation->set_rules('selesai', 'Waktu Selesai Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Kegiatan', 'required');
        $this->form_validation->set_rules('hadirin', 'Hadirin Kegiatan', 'required');
        $this->form_validation->set_rules('status', 'Status Kegiatan', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['kegiatan'] = $this->kegiatan_m->get_data();
            $data['pengguna'] = $this->pengguna_m->get_data();
            $this->template->load('template', 'agenda/agenda_add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->agenda_m->add_agenda($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
				alert('Data berhasil Disimpan')
				</script>";
                echo "<script>
				window.location='" . site_url('agenda') . "'
				</script>";
            } else {
                echo "<script>
				alert('Data gagal Disimpan')
				</script>";
                echo "<script>
				window.location='" . site_url('agenda/add') . "'
				</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('pj', 'Penanggung Jawab Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Kegiatan', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('mulai', 'Waktu Mulai Kegiatan', 'required');
        $this->form_validation->set_rules('selesai', 'Waktu Selesai Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Kegiatan', 'required');
        $this->form_validation->set_rules('hadirin', 'Hadirin Kegiatan', 'required');
        $this->form_validation->set_rules('status', 'Status Kegiatan', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $query = $this->agenda_m->get_data($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['kegiatan'] = $this->kegiatan_m->get_data();
                $data['pengguna'] = $this->pengguna_m->get_data();
                $this->template->load('template', 'agenda/agenda_edit', $data);
            } else {
                echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
                echo "<script>
				window.location='" . site_url('agenda') . "'
				</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->agenda_m->edit_agenda($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil Diubah')
                </script>";
                echo "<script>
                window.location='" . site_url('agenda') . "'
                </script>";
            } else {
                echo "<script>
                alert('Data gagal Diubah')
                </script>";
                echo "<script>
                window.location='" . site_url('agenda/edit') . "'
                </script>";
            }
        }
    }

    public function edit_notulen()
    {
        $post = $this->input->post(null, TRUE);
        $this->agenda_m->edit_notulen($post);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Notulen berhasil ditambahkan!')
            </script>";
            echo "<script>
            window.location='" . site_url('agenda') . "'
            </script>";
        } else {
            echo "<script>
            alert('Notulen gagal ditambahkan')
            </script>";
            echo "<script>
            window.location='" . site_url('agenda') . "'
            </script>";
        }
    }

    public function delete($id)
    {
        $this->agenda_m->delete_agenda($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data berhasil Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('agenda') . "'
            </script>";
        } else {
            echo "<script>
            alert('Data gagal Dihapus')
            </script>";
            echo "<script>
            window.location='" . site_url('agenda') . "'
            </script>";
        }
    }

    public function print_agenda()
    {
        $data['row'] = $this->agenda_m->get_data();
        $fileHtml = $this->load->view('agenda/agenda_print', $data, true);
        $this->fungsi->pdfGenerator($fileHtml, 'Agenda', 'landscape', 'A4');
    }
}
