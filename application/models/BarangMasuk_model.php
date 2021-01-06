<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangMasuk_model extends CI_Model
{
    public function get()
    {
        $this->db->from('supplier a');
        $this->db->join('penerimaan_barang b', 'a.kode_supplier = b.kode_supplier');
        $this->db->order_by('no_penerimaan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getOne($id)
    {
        $this->db->from('supplier a');
        $this->db->join('penerimaan_barang b', 'a.kode_supplier = b.kode_supplier');
        $this->db->where('no_penerimaan', $id);
        return $this->db->get()->row_array();
    }

    public function save()
    {
        $data    =    [
            'no_penerimaan'    => $_POST['no_penerimaan'],
            'tgl_penerimaan'   => date('Y-m-d'),
            'kode_supplier'    => $_POST['kode_supplier'],
            'keterangan'       => 'Unprocessed'
        ];
        $this->db->insert('penerimaan_barang', $data);
    }

    public function generateCode()
    {
        $this->db->select('RIGHT(penerimaan_barang.no_penerimaan, 2) as kode', FALSE);
        $this->db->order_by('no_penerimaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penerimaan_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $bundle = str_pad($kode, 4, "000", STR_PAD_LEFT);
        $result = "BM-" . $bundle;
        return $result;
    }
}
