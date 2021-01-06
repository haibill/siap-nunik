<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Item (goods)";
        $data['list']    = $this->Barang_model->get();
        $data['url']     = site_url('barang/add');
        $this->template->load('layout/template', 'master/barang/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Item (goods)";
        $data['page']    = "Add Item";
        $data['list']    = $this->db->get('klasifikasi')->result_array();
        $data['url']     = site_url('barang/store');
        $data['back']    = site_url('barang');
        $this->template->load('layout/template', 'master/barang/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_barang', 'Item Name', 'required');
        $this->form_validation->set_rules('satuan', 'Unit', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->Barang_model->save();
            redirect('barang');
        }
    }

    public function edit()
    {
        $id              = $this->uri->segment(3);
        $data['result']  = $this->Barang_model->getOne($id);
        $data['menu']    = "Master Data";
        $data['submenu'] = "Item (goods)";
        $data['page']    = "Edit [" . $id . " " . $data['result']['nama_barang'] . "]";
        $data['list']    = $this->db->get('klasifikasi')->result_array();
        $data['url']     = site_url('barang/update/' . $id);
        $data['back']    = site_url('barang');
        $this->template->load('layout/template', 'master/barang/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_barang', 'Item Name', 'required');
        $this->form_validation->set_rules('satuan', 'Unit', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->edit();
        } else {
            $this->Barang_model->change();
            redirect('barang');
        }
    }
}
