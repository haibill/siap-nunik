<div class="bs-component">
    <div class="modal" id="complete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete this transaction</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('JualBarang/complete') ?>" method="POST">
                        <table>
                            <?php
                            $no    = 0;
                            $total = 0;
                            foreach ($list as $item) : $no++; ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="kode_barang[]" value="<?= $item['kode_barang'] ?>" readonly="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" value="<?= $item['nama_barang'] ?>" readonly="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="jumlah[]" value="<?= $item['qty'] ?>" readonly="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="harga[]" value="<?= $item['harga'] ?>" readonly="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="subtotal[]" value="<?= $item['subtotal'] ?>" readonly="">
                                    </td>
                                </tr>
                            <?php $total += $item['subtotal'];
                            endforeach; ?>
                        </table>
                        <br>
                        <input type="text" class="form-control" name="no" value="<?= $no ?>" readonly="">
                        <input type="text" class="form-control" name="total" value="<?= $total ?>" readonly="">
                        <input type="text" class="form-control" name="no_pengeluaran" value="<?= $this->uri->segment(3) ?>" readonly="">
                        <br>
                        <div class="tile-footer text-center">
                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-success" type="submit">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>