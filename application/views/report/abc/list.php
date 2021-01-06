<div class="app-title">
    <div>
        <h1><i class="fas fa-coffee"></i> <?= $submenu; ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item">KopiWirs</li>
        <li class="breadcrumb-item"><?= $menu; ?></li>
        <li class="breadcrumb-item active font-weight-bold"><a href="#"><?= $submenu; ?></a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <center>
                <h2 class="text-secondary">ABC Analysis Report</h2>
                <h4 class="text-secondary">KopiWirs</h4>
            </center>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Volume Penggunaan</th>
                            <th>Rata-Rata Harga Penjualan</th>
                            <th>Nilai Total Penggunaan</th>
                            <th>Persentase Total Penggunaan</th>
                            <th>Klasifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($list as $item) : $total_penggunaan = $item['volume_penggunaan'] * $price['nominal']  ?>
                            <tr>
                                <td><?= $item['nama_barang'] ?></td>
                                <td style="text-align: center;"><?= $item['volume_penggunaan'] ?></td>
                                <td style="text-align: right;"><?= "Rp " . number_format($price['nominal'], 2, ',', '.') ?></td>
                                <td style="text-align: right;"><?= "Rp " . number_format($total_penggunaan, 2, ',', '.') ?></td>
                                <td style="text-align: center;"><?= $item['ketentuan'] * 100 ?>%</td>
                                <td style="text-align: center;"><?= $item['kode_klasifikasi'] ?></td>
                            </tr>
                        <?php $total += $total_penggunaan;
                        endforeach ?>
                    </tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;"><b>Total</b></td>
                        <td style="text-align: right; font-weight: bolder;"><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>