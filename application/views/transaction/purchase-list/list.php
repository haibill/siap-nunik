<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <!-- <h6 class="tile-title line-head text-info"><?= $this->uri->segment(3) . " List" ?></h6> -->
            <div class="tile-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>item</th>
                            <th style="text-align: center;">QTY</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Sub Total</th>
                            <?php if ($result['keterangan'] == 'Unprocessed') : ?>
                                <th style="text-align: center;">Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['nama_barang'] ?></td>
                                <td style="text-align: center;"><?= $item['qty'] ?></td>
                                <td style="text-align: right;"><?= "Rp " . number_format($item['harga'], 2, ',', '.') ?></td>
                                <td style="text-align: right;"><?= "Rp " . number_format($item['subtotal'], 2, ',', '.') ?></td>
                                <?php if ($result['keterangan'] == 'Unprocessed') : ?>
                                    <td style="text-align: center;">
                                        <a href="<?= site_url('BeliBarang/delete/' . $item['no_penerimaan'] . '/' . $item['kode_barang']) ?>" class="btn btn-sm btn-danger"><i class="icon fa fa-close fa-lg"></i> Remove</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php $total += $item['subtotal'];
                        endforeach ?>
                    </tbody>
                    <tr>
                        <td colspan="3" class="font-weight-bold" style="text-align: center;">Total</td>
                        <td class="font-weight-bold" style="text-align: right;"><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                        <?php if ($result['keterangan'] == 'Unprocessed') : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                </table>
            </div>
            <div class="tile-footer text-center">
                <?php if ($list != NULL) : ?>
                    <?php if ($result['keterangan'] == 'Unprocessed') : ?>
                        <a href="<?= site_url('BeliBarang/complete/' . $item['no_penerimaan'] . '/' . $total) ?>" class="btn btn-info">COMPLETE !</a>
                    <?php endif; ?>
                <?php else : ?>
                    <button class="btn btn-info" disabled="">COMPLETE !</button>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>