<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangMasuk extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Incoming Goods";
        $data['list']    = $this->BarangMasuk_model->get();
        $data['url']     = site_url('barangMasuk/add');
        $this->template->load('layout/template', 'transaction/purchase-list/table', $data);
    }

    public function add()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Incoming Goods";
        $data['page']    = "Choose Supplier";
        $data['list']    = $this->db->get('supplier')->result_array();
        $data['id']      = $this->BarangMasuk_model->generateCode();
        $data['url']     = site_url('barangMasuk/store');
        $data['back']    = site_url('barangMasuk');
        $this->template->load('layout/template', 'transaction/purchase-list/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('kode_supplier', 'Supplier', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->BarangMasuk_model->save();
            redirect('BeliBarang/add/' . $_POST['no_penerimaan']);
        }
    }

    public function detail()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Incoming Goods";
        $id              = $this->uri->segment(3);
        $data['page']    = $id;
        $data['result']  = $this->BarangMasuk_model->getOne($id);
        $data['list']    = $this->BeliBarang_model->get($id);
        $data['back']    = site_url('barangMasuk');
        $this->template->load('layout/template', 'transaction/purchase-list/detail', $data);
    }
}
