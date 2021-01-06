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
                            <label class="font-weight-bold"> <b class="text-danger">*</b> Account Code</label>
                            <input class="form-control" type="text" name="kode_akun" value="<?= set_value('kode_akun'); ?>" placeholder="Please type account code..">
                            <?= form_error('kode_akun'); ?>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"> <b class="text-danger">*</b> Account Name</label>
                            <input class="form-control" type="text" name="nama_akun" <?= set_value('nama_akun'); ?> placeholder="Please type account name..">
                            <?= form_error('nama_akun'); ?>
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