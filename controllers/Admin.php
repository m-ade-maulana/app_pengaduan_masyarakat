<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/mobile_menu_area');
        $this->load->view('admin/layout/main_menu_area');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
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

    public function forbidden()
    {
        $this->load->view('error/html/error_php.php');
    }
}
