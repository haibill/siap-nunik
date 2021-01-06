<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array('database');

$autoload['libraries'] = array('database', 'template', 'form_validation', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('html', 'url', 'file', 'text');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
    'Akun_model', 'Barang_model', 'Pelanggan_model', 'Supplier_model',
    'BarangMasuk_model', 'BeliBarang_model', 'BarangKeluar_model', 'JualBarang_model',
    'JurnalUmum_model', 'BukuBesar_model', 'Abc_model'
);
