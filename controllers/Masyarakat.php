<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->set_flashdata('message', $this->message('error', 'Please logout first !!!'));
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('masyarakat/layout/header');
        $this->load->view('masyarakat/layout/mobile_menu_area');
        $this->load->view('masyarakat/layout/main_menu_area');
        $this->load->view('masyarakat/dashboard');
        $this->load->view('masyarakat/layout/footer');
    }

    // Function menampilkan pesan notifikasi
    // Script menggunakan librari sweetalert
    public function message($type, $title)
    {
        $message_alert = "
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });

            Toast.fire({
                icon: '" . $type . "',
                title: '" . $title . "',
            });
            ";
        return $message_alert;
    }
}
