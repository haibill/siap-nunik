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
            <!-- <a href="<?= $url; ?>" class="btn btn-primary mb-3" type="button"><i class="icon fas fa-plus-square"></i>
                Add</a> -->
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['kode_klasifikasi']; ?></td>
                                <td><?= $item['nama']; ?></td>
                                <td><?= $item['keterangan']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>