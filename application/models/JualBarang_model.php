<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JualBarang_model extends CI_Model
{
    public function get($id)
    {
        $this->db->from('barang a');
        $this->db->join('detail_pengeluaran_barang b', 'a.kode_barang = b.kode_barang');
        $this->db->where('no_pengeluaran', $id);
        return $this->db->get()->result_array();
    }

    public function save()
    {
        $no_pengeluaran = $_POST['no_pengeluaran'];
        $kode_barang    = $_POST['kode_barang'];
        $qty            = $_POST['qty'];
        $harga          = $_POST['harga'];
        $subtotal       = $qty * $harga;

        $query = "INSERT INTO detail_pengeluaran_barang (no_pengeluaran, kode_barang, qty, harga, subtotal)
                  VALUES ('$no_pengeluaran', '$kode_barang', '$qty', '$harga', '$subtotal')
                      ON DUPLICATE KEY UPDATE
                         no_pengeluaran = VALUES(no_pengeluaran), kode_barang = VALUES(kode_barang), qty = VALUES(qty), harga = VALUES(harga), subtotal = VALUES(subtotal)";
        $this->db->query($query);
    }

    public function remove($no_pengeluaran, $kode_barang)
    {
        $this->db->where(array('no_pengeluaran' => $no_pengeluaran, 'kode_barang' => $kode_barang));
        $this->db->delete('detail_pengeluaran_barang');
    }

    public function volume()
    {
        $limit    =    $_POST['no'];

        for ($i = 0; $i < $limit; $i++) {
            $qty         = "" . $_POST['jumlah'][$i] . "";
            $kode_barang = "" . $_POST['kode_barang'][$i] . "";
            $this->db->set('volume_penggunaan ', "volume_penggunaan  + " . $qty . "", FALSE);
            $this->db->where('kode_barang', $kode_barang);
            $this->db->update('barang');
        }
    }

    public function checkOut($no_pengeluaran, $total)
    {
        $data    =    [
            'total'      => $total,
            'keterangan' => 'Been Processed'
        ];
        $this->db->where('no_pengeluaran', $no_pengeluaran);
        $this->db->update('pengeluaran_barang', $data);
    }
}
