<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JurnalUmum_model extends CI_Model
{

    public function get($start_date, $end_date)
    {
        $this->db->select('a.no, a.kode_akun, nama_akun, tanggal, posisi, total, id_trans');
        $this->db->from('jurnal_umum a');
        $this->db->join('akun b', 'a.kode_akun = b.kode_akun');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('a.no', 'ASC');
        return $this->db->get()->result_array();
    }

    public function makeJurnal($id_trans, $kode_akun, $total, $posisi)
    {
        $data =    [
            'no'        => $this->generate_code(),
            'id_trans'  => $id_trans,
            'kode_akun' => $kode_akun,
            'tanggal'   => date('Y-m-d'),
            'posisi'    => $posisi,
            'total'     => $total,
        ];
        $this->db->insert('jurnal_umum', $data);
    }

    public function generate_code()
    {
        $this->db->select('RIGHT(jurnal_umum.no, 2) as kode', FALSE);
        $this->db->order_by('no', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jurnal_umum');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $bundle = str_pad($kode, 4, "000", STR_PAD_LEFT);
        return $bundle;
    }
}
