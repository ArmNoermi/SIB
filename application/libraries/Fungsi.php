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
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
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

    public function count_dokumen_msk()
    {
        $this->ci->load->model('dkmn_msk_model');
        return $this->ci->dkmn_msk_model->get()->num_rows();
    }

    public function count_dokumen_klr()
    {
        $this->ci->load->model('dkmn_klr_model');
        return $this->ci->dkmn_klr_model->get()->num_rows();
    }

    public function count_surat_pengadaan()
    {
        $this->ci->load->model('surat_pengadaan_model');
        return $this->ci->surat_pengadaan_model->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_lemari()
    {
        $this->ci->load->model('lemari_m');
        return $this->ci->lemari_m->get()->num_rows();
    }

    public function count_kategori_dokumen()
    {
        $this->ci->load->model('ktgr_dokumen_model');
        return $this->ci->ktgr_dokumen_model->get()->num_rows();
    }

    public function count_kategori_surat()
    {
        $this->ci->load->model('ktgr_pengadaan_model');
        return $this->ci->ktgr_pengadaan_model->get()->num_rows();
    }

    public function count_bantex()
    {
        $this->ci->load->model('bantex_model');
        return $this->ci->bantex_model->get()->num_rows();
    }
}
