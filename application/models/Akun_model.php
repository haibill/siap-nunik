<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akun_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('akun')->result_array();
    }

    public function getOne($id)
    {
        $this->db->from('akun');
        $this->db->where('kode_akun', $id);
        return $this->db->get()->row_array();
    }

    public function save()
    {
        $data    =    [
            'kode_akun'   => $_POST['kode_akun'],
            'nama_akun'   => $_POST['nama_akun'],
            'header_akun' => substr($_POST['kode_akun'], 0, 1)
        ];
        $this->db->insert('akun', $data);
    }
}
