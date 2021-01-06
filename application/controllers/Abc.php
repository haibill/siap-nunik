<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Abc extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Report";
        $data['submenu'] = "ABC";
        $data['price']   = $this->db->get('harga_jual', ['nominal' => '15000'])->row_array();
        $data['list']    = $this->Barang_model->get();
        $this->template->load('layout/template', 'report/abc/list', $data);
    }

    // public function find()
    // {
    //     $data['menu']    = "Report";
    //     $data['submenu'] = "General Journal";
    //     $data['url']     = site_url('JurnalUmum/find');
    //     $data['list']    = $this->JurnalUmum_model->get($_POST['start_date'], $_POST['end_date']);
    //     $this->template->load('layout/template', 'report/jurnal-umum/form', $data);
    // }
}
