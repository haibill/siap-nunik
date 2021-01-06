<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akun extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Account";
        $data['list']    = $this->Akun_model->get();
        $data['url']     = site_url('akun/add');
        $this->template->load('layout/template', 'master/akun/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Account";
        $data['page']    = "Add Akun";
        $data['url']     = site_url('akun/store');
        $data['back']    = site_url('akun');
        $this->template->load('layout/template', 'master/akun/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('kode_akun', 'Account Code', 'required|is_unique[akun.kode_akun]|min_length[3]|max_length[3]', array('is_unique' => '' . $_POST["kode_akun"] . ' already exist in database.'));
        $this->form_validation->set_rules('nama_akun', 'Account Name', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->Akun_model->save();
            redirect('Akun');
        }
    }
}
