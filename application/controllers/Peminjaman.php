<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_is_not_login();

        $this->load->model('peminjaman_m');
        $this->load->model('pengguna_m');
        $this->load->model('sarpras_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_is_admin();
        $data['row'] = $this->peminjaman_m->get_data();
        $data['sarpras'] = $this->sarpras_m->get_data();
        $this->template->load('template', 'peminjaman/peminjaman_data', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('sarpras', 'Sarana Prasarana', 'required');
        $this->form_validation->set_rules('pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        $this->form_validation->set_message(
            'required',
            '%s Wajib Diisi!'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['pengguna'] = $this->pengguna_m->get_data();
            $data['sarpras'] = $this->sarpras_m->get_data();
            $this->template->load('template', 'peminjaman/peminjaman_add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $idSarpras = $post['sarpras'];
            $sarpras = $this->sarpras_m->get_data($idSarpras);
            if ($sarpras->num_rows() > 0) {
                $stok = $sarpras->row()->stok_tersedia;
                if ($post['jumlah'] > $stok) {
                    echo "<script>
                    alert('Maaf, Stok tidak mencukupi peminjaman! Sisa stok saat ini $stok')
                    </script>";
                    echo "<script>
                    window.location='" . site_url('peminjaman/add') . "'
                    </script>";
                } else {
                    $pinjam = $post['pinjam'];
                    $kembali = $post['kembali'];
                    $date1 = new DateTime($pinjam);
                    $date2 = new DateTime($kembali);
                    $interval = $date1->diff($date2);
                    if ($interval->d > 2) {
                        echo "<script>
                        alert('Maaf, Peminjaman maksimal adalah 3 hari.')
                        </script>";
                        echo "<script>
                        window.location='" . site_url('peminjaman/add') . "'
                        </script>";
                    } else {
                        $this->peminjaman_m->add_peminjaman($post);
                        if ($this->db->affected_rows() > 0) {
                            echo "<script>
                        alert('Data berhasil Disimpan')
                        </script>";
                            if ($this->fungsi->user_login()->level !== 'Warga') {
                                echo "<script>
                            window.location='" . site_url('peminjaman') . "'
                            </script>";
                            } else {
                                echo "<script>
                            window.location='" . site_url('dashboard') . "'
                            </script>";
                            }
                        } else {
                            echo "<script>
                        alert('Data gagal Disimpan')
                        </script>";
                            echo "<script>
                        window.location='" . site_url('peminjaman/add') . "'
                        </script>";
                        }
                    }
                }
            } else {
                echo "<script>
                alert('sarpras tidak ketemu!')
                </script>";
                echo "<script>
                window.location='" . site_url('dashboard') . "'
                </script>";
            }
        }
    }

    public function accept($id)
    {
        check_is_admin();

        $query = $this->peminjaman_m->get_data($id);
        if ($query->num_rows() > 0) {
            $this->peminjaman_m->accept_peminjaman($id);
            $this->sarpras_m->update_stock_out($id);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Peminjaman disetujui!')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            } else {
                echo "<script>
            alert('Gagal menyetujui!')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            }
        } else {
            echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
            echo "<script>
				window.location='" . site_url('peminjaman') . "'
				</script>";
        }
    }

    public function reject($id)
    {
        check_is_admin();

        $query = $this->peminjaman_m->get_data($id);
        if ($query->num_rows() > 0) {
            $this->peminjaman_m->reject_peminjaman($id);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Peminjaman ditolak!')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            } else {
                echo "<script>
            alert('Gagal menolak!')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            }
        } else {
            echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
            echo "<script>
				window.location='" . site_url('peminjaman') . "'
				</script>";
        }
    }

    public function cancel($id)
    {
        $query = $this->peminjaman_m->get_data($id);
        if ($query->num_rows() > 0) {
            $this->peminjaman_m->cancel_peminjaman($id);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Peminjaman dibatalkan!')
            </script>";
                echo "<script>
            window.location='" . site_url('dashboard') . "'
            </script>";
            } else {
                echo "<script>
            alert('Gagal membatalkan!')
            </script>";
                echo "<script>
            window.location='" . site_url('dashboard') . "'
            </script>";
            }
        } else {
            echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
            echo "<script>
				window.location='" . site_url('dashboard') . "'
				</script>";
        }
    }

    public function edit_keterangan()
    {
        check_is_admin();

        $post = $this->input->post(null, TRUE);
        $query = $this->peminjaman_m->get_data($post['id_peminjaman']);
        if ($query->num_rows() > 0) {
            $this->peminjaman_m->edit_keterangan($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Berhasil menambahkan keterangan.')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            } else {
                echo "<script>
            alert('Gagal menambahkan keterangan.')
            </script>";
                echo "<script>
            window.location='" . site_url('peminjaman') . "'
            </script>";
            }
        } else {
            echo "<script>
				alert('Data tidak ditemukan.')
				</script>";
            echo "<script>
				window.location='" . site_url('peminjaman') . "'
				</script>";
        }
    }

    public function print_peminjaman()
    {
        check_is_admin();

        $data['row'] = $this->peminjaman_m->get_data();
        $fileHtml = $this->load->view('peminjaman/peminjaman_print', $data, true);
        $this->fungsi->pdfGenerator($fileHtml, 'Peminjaman', 'landscape', 'A4');
    }
}
