<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JualBarang extends CI_Controller
{

    public function add()
    {
        $data['menu']    = "Transaction";
        $data['submenu'] = "Outcoming Goods";
        $id              = $this->uri->segment(3);
        $data['page']    = $id;
        $data['result']  = $this->db->get_where('pengeluaran_barang', ['no_pengeluaran' => $id])->row_array();
        $data['price']   = $this->db->get('harga_jual', ['nominal' => '15000'])->row_array();
        $data['barang']  = $this->db->get('barang')->result_array();
        $data['list']    = $this->JualBarang_model->get($id);
        $data['url']     = site_url('jualBarang/store/' . $id);
        $data['back']    = site_url('barangKeluar');
        $this->template->load('layout/template', 'transaction/sales-list/cart', $data);
    }

    public function store()
    {
        $id = $this->uri->segment(3); # uri segment 3 adalah id == no_penerimaan

        $this->form_validation->set_rules('kode_barang', 'Item', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required');
        $this->form_validation->set_rules('harga', 'Price', 'required');
        $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->JualBarang_model->save();
            redirect('jualBarang/add/' . $id);
        }
    }

    public function delete()
    {
        $this->JualBarang_model->remove($this->uri->segment(3), $this->uri->segment(4));
        redirect('jualBarang/add/' . $this->uri->segment(3));
    }

    public function complete()
    {
        $transaction_id = $_POST['no_pengeluaran'];
        $total          = $_POST['total'];
        $this->JualBarang_model->checkOut($transaction_id, $total);
        $this->JualBarang_model->volume();
        $this->JurnalUmum_model->makeJurnal($transaction_id, '101', $total, 'Debit');
        $this->JurnalUmum_model->makeJurnal($transaction_id, '401', $total, 'Kredit');
        redirect('barangKeluar');
    }
}
