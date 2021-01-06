<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BeliBarang extends CI_Controller
{

    public function add()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Incoming Goods";
        $id              = $this->uri->segment(3);
        $data['page']    = $id;
        $data['result']  = $this->db->get_where('penerimaan_barang', ['no_penerimaan' => $id])->row_array();
        $data['barang']  = $this->db->get('barang')->result_array();
        $data['list']    = $this->BeliBarang_model->get($id);
        $data['url']     = site_url('beliBarang/store/' . $id);
        $data['back']    = site_url('barangMasuk');
        $this->template->load('layout/template', 'transaction/purchase-list/cart', $data);
    }

    public function store()
    {
        $id = $this->uri->segment(3); # uri segment 3 adalah id == no_penerimaan

        $this->form_validation->set_rules('kode_barang', 'Barang', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required');
        $this->form_validation->set_rules('harga', 'Price', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->BeliBarang_model->save();
            redirect('beliBarang/add/' . $id);
        }
    }

    public function delete()
    {
        $this->BeliBarang_model->remove($this->uri->segment(3), $this->uri->segment(4));
        redirect('beliBarang/add/' . $this->uri->segment(3));
    }

    public function complete()
    {
        # belum ada function stok di model BeliBarang_model
        $transaction_id = $this->uri->segment(3);
        $total          = $this->uri->segment(4);
        $this->BeliBarang_model->checkOut($transaction_id, $total);
        $this->JurnalUmum_model->makeJurnal($transaction_id, '102', $total, 'Debit');
        $this->JurnalUmum_model->makeJurnal($transaction_id, '101', $total, 'Kredit');
        redirect('barangMasuk');
    }
}
