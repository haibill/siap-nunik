<!-- Sidebar menu-->
<div class="app-sidebar__overlay" id="sidebar" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="<?= base_url('/assets/img/8.jpg') ?>" alt="User Image" width="50">
        <div>
            <p class="app-sidebar__user-name">Nunik Nurmala</p>
            <p class="app-sidebar__user-designation" style="font-size: 11px;">Accounting Information System</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= site_url('Dashboard') ?>"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-server"></i><span class="app-menu__label">Master Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= site_url('Akun') ?>">
                        Account</a></li>
                <li><a class="treeview-item" href="<?= site_url('Barang') ?>"> Item (Goods) </a></li>
                <li><a class="treeview-item" href="<?= site_url('Klasifikasi') ?>"> Classification</a></li>
                <li><a class="treeview-item" href="<?= site_url('Pelanggan') ?>"> Customer</a></li>
                <li><a class="treeview-item" href="<?= site_url('Supplier') ?>"> Supplier</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-bag"></i><span class="app-menu__label">Transaction</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= site_url('BarangMasuk') ?>"> Incoming Goods</a>
                </li>
                <li><a class="treeview-item" href="<?= site_url('BarangKeluar') ?>"> Outcoming Goods</a></li>
            </ul>
        </li>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= site_url('JurnalUmum') ?>"> General Journal</a></li>
                <li><a class="treeview-item" href="<?= site_url('BukuBesar') ?>"> Ledger (Buku Besar)</a></li>
                <li><a class="treeview-item" href="<?= site_url('Abc') ?>"> Analisis ABC</a></li>
            </ul>
        </li>
    </ul>
</aside>