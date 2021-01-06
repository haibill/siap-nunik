<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BeliBarang_model extends CI_Model
{
    public function get($id)
    {
        $this->db->from('barang a');
        $this->db->join('detail_penerimaan_barang b', 'a.kode_barang = b.kode_barang');
        $this->db->where('no_penerimaan', $id);
        return $this->db->get()->result_array();
    }

    public function save()
    {
        $no_penerimaan = $_POST['no_penerimaan'];
        $kode_barang   = $_POST['kode_barang'];
        $qty           = $_POST['qty'];
        $harga         = $_POST['harga'];
        $subtotal      = $qty * $harga;

        $query = "INSERT INTO detail_penerimaan_barang (no_penerimaan, kode_barang, qty, harga, subtotal)
                  VALUES ('$no_penerimaan', '$kode_barang', '$qty', '$harga', '$subtotal')
                      ON DUPLICATE KEY UPDATE
                         no_penerimaan = VALUES(no_penerimaan), kode_barang = VALUES(kode_barang), qty = VALUES(qty), harga = VALUES(harga), subtotal = VALUES(subtotal)";
        $this->db->query($query);
    }

    public function remove($no_penerimaan, $kode_barang)
    {
        $this->db->where(array('no_penerimaan' => $no_penerimaan, 'kode_barang' => $kode_barang));
        $this->db->delete('detail_penerimaan_barang');
    }

    public function checkOut($no_penerimaan, $total)
    {
        $data    =    [
            'total'      => $total,
            'keterangan' => 'Been Processed'
        ];
        $this->db->where('no_penerimaan', $no_penerimaan);
        $this->db->update('penerimaan_barang', $data);
    }
}
