<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_model extends CI_Model
{
    public function get()
    {
        $this->db->from('barang a');
        $this->db->join('klasifikasi b', 'a.kode_klasifikasi = b.kode_klasifikasi');
        return $this->db->get()->result_array();
    }

    public function getOne($id)
    {
        $this->db->from('barang a');
        $this->db->join('klasifikasi b', 'a.kode_klasifikasi = b.kode_klasifikasi');
        $this->db->where('kode_barang', $id);
        return $this->db->get()->row_array();
    }

    public function save()
    {
        $data    =    [
            'kode_barang'      => $this->generateCode(),
            'nama_barang'      => $_POST['nama_barang'],
            'kode_klasifikasi' => $_POST['kode_klasifikasi'],
            'satuan'           => $_POST['satuan']
        ];
        $this->db->insert('barang', $data);
    }

    public function change()
    {
        $data    =    [
            'nama_barang'      => $_POST['nama_barang'],
            'kode_klasifikasi' => $_POST['kode_klasifikasi'],
            'satuan'           => $_POST['satuan']
        ];
        $this->db->where('kode_barang', $_POST['kode_barang']);
        $this->db->update('barang', $data);
    }

    public function generateCode()
    {
        $this->db->select('RIGHT(barang.kode_barang, 2) as kode', FALSE);
        $this->db->order_by('kode_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $bundle = str_pad($kode, 4, "000", STR_PAD_LEFT);
        $result = "BRG-" . $bundle;
        return $result;
    }
}
