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
            <h6 class="tile-title line-head text-warning"><?= $this->uri->segment(3) . " Purchase" ?></h6>
            <div class="tile-body">
                <form action="<?= $url; ?>" method="POST" class="form-horizontal">
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Transaction ID</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="no_penerimaan" value="<?= $result['no_penerimaan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Item</label>
                        <div class="col-md-10">
                            <select class="form-control" id="demoSelect" name="kode_barang">
                                <option selected disabled>Choose an item</option>
                                <?php
                                foreach ($barang as $item) {
                                    echo "<option value=" . $item['kode_barang'] . " > " . $item['nama_barang'] . " </option>";
                                }
                                ?>
                            </select>
                            <?= form_error('kode_barang'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">QTY</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" name="qty" value="<?= set_value('qty') ?>" placeholder="Masukkan QTY">
                            <?= form_error('qty'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 font-weight-bold">Price</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="harga" value="<?= set_value('harga') ?>" placeholder="Masukkan Harga">
                            <?= form_error('harga'); ?>
                        </div>
                    </div>
                    <div class="tile-footer text-center">
                        <a href="<?= $back; ?>" class="btn btn-secondary">Back</a> &nbsp;
                        <button class="btn btn-success" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('transaction/purchase-list/list') ?>