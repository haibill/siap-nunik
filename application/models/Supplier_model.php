<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Supplier_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function getOne($id)
    {
        $this->db->from('supplier');
        $this->db->where('kode_supplier', $id);
        return $this->db->get()->row_array();
    }

    public function save()
    {
        if ($_POST['alamat'] == NULL) {
            $alamat = 'Not Set';
        } else {
            $alamat = $_POST['alamat'];
        }
        $data    =    [
            'kode_supplier' => $this->generateCode(),
            'nama'           => $_POST['nama_supplier'],
            'no_hp'          => $_POST['no_hp'],
            'alamat'         => $alamat
        ];
        $this->db->insert('supplier', $data);
    }

    public function change()
    {
        $data    =    [
            'nama'   => $_POST['nama_supplier'],
            'no_hp'  => $_POST['no_hp'],
            'alamat' => $_POST['alamat']
        ];
        $this->db->where('kode_supplier', $_POST['kode_supplier']);
        $this->db->update('supplier', $data);
    }

    public function generateCode()
    {
        $this->db->select('RIGHT(supplier.kode_supplier, 2) as kode', FALSE);
        $this->db->order_by('kode_supplier', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('supplier');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $bundle = str_pad($kode, 4, "000", STR_PAD_LEFT);
        $result = "SPL-" . $bundle;
        return $result;
    }
}
