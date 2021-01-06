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
    <div class="col-md-12">
        <div class="tile">
            <h6 class="tile-title line-head text-warning"><?= $this->uri->segment(3) . " Detail" ?></h6>
            <div class="tile-body">
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">No Penerimaan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?= $result['no_pengeluaran'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Supplier</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?= $result['nama'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Tanggal</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?= $result['tgl_pengeluaran'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Keterangan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?= $result['keterangan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="tile-footer text-center">
                        <a href="<?= $back; ?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('transaction/sales-list/list') ?>