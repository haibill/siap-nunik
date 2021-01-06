<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supplier extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Supplier";
        $data['list']    = $this->db->get('supplier')->result_array();
        $data['url']     = site_url('supplier/add');
        $this->template->load('layout/template', 'master/supplier/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Supplier";
        $data['page']    = "Add Supplier";
        $data['url']     = site_url('supplier/store');
        $data['back']    = site_url('supplier');
        $this->template->load('layout/template', 'master/supplier/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_supplier', 'Supplier Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Phone Number', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->Supplier_model->save();
            redirect('supplier');
        }
    }

    public function edit()
    {
        $id              = $this->uri->segment(3);
        $data['result']  = $this->Supplier_model->getOne($id);
        $data['menu']    = "Master Data";
        $data['submenu'] = "Supplier";
        $data['page']    = "Edit [" . $id . " " . $data['result']['nama'] . "]";
        $data['url']     = site_url('supplier/update/' . $id);
        $data['back']    = site_url('supplier');
        $this->template->load('layout/template', 'master/supplier/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_supplier', 'Supplier Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Phone Number', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->edit();
        } else {
            $this->Supplier_model->change();
            redirect('supplier');
        }
    }
}
