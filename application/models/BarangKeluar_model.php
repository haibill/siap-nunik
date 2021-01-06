<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangKeluar_model extends CI_Model
{
    public function get()
    {
        $this->db->from('pelanggan a');
        $this->db->join('pengeluaran_barang b', 'a.kode_pelanggan = b.kode_pelanggan');
        $this->db->order_by('no_pengeluaran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getOne($id)
    {
        $this->db->from('pelanggan a');
        $this->db->join('pengeluaran_barang b', 'a.kode_pelanggan = b.kode_pelanggan');
        $this->db->where('no_pengeluaran', $id);
        return $this->db->get()->row_array();
    }

    public function save()
    {
        $data    =    [
            'no_pengeluaran'  => $_POST['no_pengeluaran'],
            'tgl_pengeluaran' => date('Y-m-d'),
            'kode_pelanggan'  => $_POST['kode_pelanggan'],
            'keterangan'      => 'Unprocessed'
        ];
        $this->db->insert('pengeluaran_barang', $data);
    }

    public function generateCode()
    {
        $this->db->select('RIGHT(pengeluaran_barang.no_pengeluaran, 2) as kode', FALSE);
        $this->db->order_by('no_pengeluaran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengeluaran_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $bundle = str_pad($kode, 4, "000", STR_PAD_LEFT);
        $result = "BK~" . $bundle;
        return $result;
    }
}
