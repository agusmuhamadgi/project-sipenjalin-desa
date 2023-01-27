<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('pengguna_m');
        $id_pengguna = $this->ci->session->userdata('id_pengguna');
        $user_data = $this->ci->pengguna_m->get_data($id_pengguna)->row();
        return $user_data;
    }

    public function count_pengguna()
    {
        $this->ci->load->model("pengguna_m");
        return $this->ci->pengguna_m->get_data()->num_rows();
    }
    public function count_sarpras()
    {
        $this->ci->load->model("sarpras_m");
        return $this->ci->sarpras_m->get_data()->num_rows();
    }
    public function count_peminjaman()
    {
        $this->ci->load->model("peminjaman_m");
        return $this->ci->peminjaman_m->get_data()->num_rows();
    }
    public function count_pengembalian()
    {
        $this->ci->load->model("pengembalian_m");
        return $this->ci->pengembalian_m->get_data()->num_rows();
    }
    function pdfGenerator($html, $filename, $orientation, $paper)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }
}
