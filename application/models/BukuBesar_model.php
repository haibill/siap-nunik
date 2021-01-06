<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BukuBesar_model extends CI_Model
{

    public function get($id, $month, $year)
    {
        $sql     = "SELECT  a.kode_akun, tanggal, nama_akun, posisi, total, 
						    MONTH(tanggal) bulan, YEAR(tanggal) tahun, no 
					  FROM  jurnal_umum AS a 
					  JOIN  akun AS b 
					    ON  a.kode_akun = b.kode_akun 
					 WHERE  a.kode_akun = '$id' 
					HAVING  bulan = '$month' AND tahun = '$year' 
				  ORDER BY  a.no ASC ";
        return $this->db->query($sql)->result_array();
    }

    public function getYear()
    {
        $this->db->select('YEAR(tanggal) tahun');
        $this->db->group_by('tahun');
        return $this->db->get('jurnal_umum')->result_array();
    }
}
