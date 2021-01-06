<div class="app-title">
    <div>
        <h1><i class="fas fa-coffee"></i> <?= $submenu; ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item">KopiWirs</li>
        <li class="breadcrumb-item"><?= $menu; ?></li>
        <li class="breadcrumb-item"><a href="<?= $back; ?>"><?= $submenu; ?></a></li>
        <li class="breadcrumb-item active font-weight-bold"><a href="#"><?= $page; ?></a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= $url; ?>" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">No Penerimaan</label>
                            <input class="form-control" type="text" name="no_penerimaan" value="<?= $id ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input class="form-control" type="text" value="<?= date('d-m-Y') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"> <b class="text-danger">*</b> Supplier</label>
                            <select class="form-control" id="demoSelect" name="kode_supplier">
                                <option selected disabled>Choose a Supplier</option>
                                <?php
                                foreach ($list as $item) {
                                    echo "<option value=" . $item['kode_supplier'] . " > " . $item['nama'] . " </option>";
                                }
                                ?>
                            </select>
                            <?= form_error('kode_supplier'); ?>

                        </div>
                        <div class="tile-footer">
                            <a href="<?= $back; ?>" class="btn btn-secondary">Back</a> &nbsp;
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>