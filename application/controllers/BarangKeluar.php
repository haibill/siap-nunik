<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangKeluar extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Outcoming Goods";
        $data['list']    = $this->BarangKeluar_model->get();
        $data['url']     = site_url('barangKeluar/add');
        $this->template->load('layout/template', 'transaction/sales-list/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Outcoming Goods";
        $data['page']    = "Choose Customer";
        $data['list']    = $this->db->get('pelanggan')->result_array();
        $data['id']      = $this->BarangKeluar_model->generateCode();
        $data['url']     = site_url('barangKeluar/store');
        $data['back']    = site_url('barangKeluar');
        $this->template->load('layout/template', 'transaction/sales-list/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('kode_pelanggan', 'Customer', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->BarangKeluar_model->save();
            redirect('JualBarang/add/' . $_POST['no_pengeluaran']);
        }
    }

    public function detail()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Outcoming Goods";
        $id              = $this->uri->segment(3);
        $data['page']    = $id;
        $data['result']  = $this->BarangKeluar_model->getOne($id);
        $data['list']    = $this->JualBarang_model->get($id);
        $data['back']    = site_url('barangKeluar');
        $this->template->load('layout/template', 'transaction/sales-list/detail', $data);
    }
}
