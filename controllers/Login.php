<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('login');
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

	// Function untuk melakukan proses login dari form login
	// Mengecek semua data sebelum masuk ke dalam 
	public function login_proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Variabel untuk mengambil data admin dan petugas
		$get_user = $this->db->get_where('petugas', ['username' => $username])->row_array();

		// Variabel untuk mengambil data masyarakat
		$get_user_masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

		// Get User Masyarakat
		if ($get_user) {
			if ($get_user['username'] == $username) {
				if ($get_user['password'] == $password) {
					if ($get_user['level'] == 'admin') {
						$get_data = [
							'id_petugas' => $get_user['id_petugas'],
							'nama_petugas' => $get_user['nama_petugas'],
							'username' => $get_user['username'],
							'level' => $get_user['level']
						];

						$this->session->set_flashdata('message', $this->message('success', 'Selamat Datang ' . $get_data['nama_petugas']));
						$this->session->set_userdata($get_data);
						redirect('admin');
					} else if ($get_user['level'] == 'petugas') {
						$get_data = [
							'id_petugas' => $get_user['id_petugas'],
							'nama_petugas' => $get_user['nama_petugas'],
							'username' => $get_user['username'],
							'level' => $get_user['level']
						];
						$this->session->set_flashdata('message', $this->message('success', 'Selamat Datang ' . $get_data['nama_petugas']));
						$this->session->set_userdata($get_data);
						redirect('petugas');
					} else {
						$this->session->set_flashdata('message', $this->message('error', 'Login Gagal data tidak ditemukan'));
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('message', $this->message('error', 'Login Gagal Password Salah'));
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', $this->message('error', 'Login Gagal Username Tidak di temukan'));
				redirect('login');
			}
		}
		// Get User Masyarakat
		else if ($get_user_masyarakat) {
			if ($get_user_masyarakat['username'] == $username) {
				if ($get_user_masyarakat['password'] == $password) {
					$get_data = [
						'nik' => $get_user_masyarakat['nik'],
						'nama' => $get_user_masyarakat['nama'],
						'username' => $get_user_masyarakat['username'],
						'telp' => $get_user_masyarakat['telp']
					];

					$this->session->set_flashdata('message', $this->message('success', 'Selamat Datang ' . $get_data['nama_petugas']));
					$this->session->set_userdata($get_data);
					redirect('masyarakat');
				} else {
					$this->session->set_flashdata('message', $this->message('error', 'Login Gagal Password Salah'));
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', $this->message('error', 'Login Gagal Username Tidak Di Temukan'));
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', $this->message('error', 'Login Gagal Data Tidak Ada'));
			redirect('login');
		}
	}

	public function logout()
	{
		$account_data = $this->session->all_userdata();
		foreach ($account_data as $key) {
			if ($key != 'username' && $key != 'id_petugas') {
				$this->session->unset_userdata($key);
			}
		}

		$this->session->sess_destroy();
		$this->session->set_flashdata('message', $this->message('success', 'Anda berhasil logout'));
		redirect('login');
	}
}
