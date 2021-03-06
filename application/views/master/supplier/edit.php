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
                            <label class="font-weight-bold"><b class="text-danger">*</b> Supplier Name</label>
                            <input class="form-control" type="text" name="nama_supplier" value="<?= $result['nama'] ?>" placeholder="Masukkan nama supplier">
                            <?= form_error('nama_supplier'); ?>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"><b class="text-danger">*</b> Phone Number</label>
                            <input class="form-control" type="text" name="no_hp" value="<?= $result['no_hp'] ?>" placeholder="Masukkan No HP">
                            <?= form_error('no_hp'); ?>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <textarea class="form-control" name="alamat" cols="10" rows="4" placeholder="Masukkan Alamat"><?= $result['alamat'] ?></textarea>
                        </div>
                        <input class="form-control" type="hidden" name="kode_supplier" value="<?= $result['kode_supplier'] ?>" readonly>
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