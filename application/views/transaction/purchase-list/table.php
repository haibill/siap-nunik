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
            <a href="<?= $url; ?>" class="btn btn-primary mb-3" type="button"><i class="icon fas fa-plus-square"></i>
                Add</a>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Supplier</th>
                            <th>Created Date</th>
                            <th>Total</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <?php if ($item['keterangan'] == 'Unprocessed') : ?>
                                    <td> <a href="<?= site_url('BeliBarang/add/' . $item['no_penerimaan']) ?>" class="font-weight-bold" style="color: tomato;"><?= $item['no_penerimaan'] ?></a></td>
                                <?php else : ?>
                                    <td> <a href="<?= site_url('BarangMasuk/detail/' . $item['no_penerimaan']) ?>" class="font-weight-bold"><?= $item['no_penerimaan'] ?></a></td>
                                <?php endif; ?>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['tgl_penerimaan'] ?></td>
                                <td style="text-align: right;"><?= "Rp " . number_format($item['total'], 2, ',', '.') ?></td>
                                <td style="font-weight: bold;"><?= $item['keterangan'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>