<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Customer";
        $data['list']    = $this->Pelanggan_model->get();
        $data['url']     = site_url('pelanggan/add');
        $this->template->load('layout/template', 'master/pelanggan/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Customer";
        $data['page']    = "Add Customer";
        $data['list']    = $this->db->get('klasifikasi')->result_array();
        $data['url']     = site_url('pelanggan/store');
        $data['back']    = site_url('pelanggan');
        $this->template->load('layout/template', 'master/pelanggan/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Customer Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Phone Number', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->Pelanggan_model->save();
            redirect('pelanggan');
        }
    }

    public function edit()
    {
        $id              = $this->uri->segment(3);
        $data['result']  = $this->Pelanggan_model->getOne($id);
        $data['menu']    = "Master Data";
        $data['submenu'] = "Customer";
        $data['page']    = "Edit [" . $id . " " . $data['result']['nama'] . "]";
        $data['url']     = site_url('pelanggan/update/' . $id);
        $data['back']    = site_url('pelanggan');
        $this->template->load('layout/template', 'master/pelanggan/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Customer Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Phone Number', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->edit();
        } else {
            $this->Pelanggan_model->change();
            redirect('pelanggan');
        }
    }
}
