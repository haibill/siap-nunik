<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Klasifikasi extends CI_Controller
{

    public function index()
    {
        $data['menu']    = "Master Data";
        $data['submenu'] = "Classification";
        $data['list']    = $this->db->get('klasifikasi')->result_array();
        $this->template->load('layout/template', 'master/klasifikasi/table', $data);
    }
}
