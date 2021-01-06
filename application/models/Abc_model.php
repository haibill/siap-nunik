<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Abc_model extends CI_Model
{
    public function get()
    {
        $this->db->from('barang a');
        $this->db->join('klasifikasi b', 'a.kode_klasifikasi = b.kode_klasifikasi');
        return $this->db->get()->result_array();
    }
}
