<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login_user','LoginController@login_user');
$router->get('/profile','LoginController@profile');

$router->group(['prefix' => 'generate'], function () use ($router) {
    $router->get('/key', function() {return \Illuminate\Support\Str::random(32);});
    $router->get('/create_password/{password}','LoginController@create_password');
});

$router->group(['prefix' => 'pegawai'], function () use ($router) {
    $router->get('/','PegawaiController@fetch_all');
    $router->get('/{id}','PegawaiController@get_specify');
    $router->delete('/{id}','PegawaiController@delete_specify');
    $router->post('/store','PegawaiController@store');
    $router->post('/edit/{id}','PegawaiController@edit_specify');
});

$router->group(['prefix' => 'customer'], function() use ($router) {
    $router->get('/','CustomerController@fetch_all');
    $router->get('/{id}','CustomerController@get_specify');
    $router->delete('/{id}','CustomerController@delete_specify');
    $router->post('/store','CustomerController@store');
    $router->post('/edit/{id}','CustomerController@edit_specify');
});

$router->group(['prefix' => 'supplier'], function() use ($router) {
    $router->get('/','SupplierController@fetch_all');
    $router->get('/{id}','SupplierController@get_specify');
    $router->delete('/{id}','SupplierController@delete_specify');
    $router->post('/store','SupplierController@store');
    $router->post('/edit/{id}','SupplierController@edit_specify');
});

$router->group(['prefix' => 'hewan'], function() use ($router) {
    $router->get('/','HewanController@fetch_all');
    $router->post('/store','HewanController@store');
    $router->delete('/{id}','HewanController@delete_specify');
    $router->post('/edit/{id}','HewanController@edit_specify');
});

$router->group(['prefix' => 'ukuran_hewan'], function() use ($router) {
    $router->get('/','Ukuran_hewanController@fetch_all');
    $router->post('/store','Ukuran_hewanController@store');
    $router->delete('/{id}','Ukuran_hewanController@delete_specify');
    $router->post('/edit/{id}','Ukuran_hewanController@edit_specify');
});

$router->group(['prefix' => 'jenis_hewan'], function() use ($router) {
    $router->get('/','Jenis_hewanController@fetch_all');
    $router->post('/store','Jenis_hewanController@store');
    $router->delete('/{id}','Jenis_hewanController@delete_specify');
    $router->post('/edit/{id}','Jenis_hewanController@edit_specify');
});

$router->group(['prefix' => 'barang'], function() use ($router) {
    $router->get('/','ProdukBarangController@fetch_all');
    $router->post('/store','ProdukBarangController@store');
    $router->delete('/{id}','ProdukBarangController@delete_specify');
    $router->post('/edit/{id}','ProdukBarangController@edit_specify');
});

$router->group(['prefix' => 'layanan'], function() use ($router) {
    $router->get('/','ProdukLayananController@fetch_all');
    $router->post('/store','ProdukLayananController@store');
    $router->delete('/{id}','ProdukLayananController@delete_specify');
    $router->post('/edit/{id}','ProdukLayananController@edit_specify');
});

$router->group(['prefix' => 'hargalayanan'], function() use ($router) {
    $router->get('/','HargaLayananController@fetch_all');
    $router->post('/store','HargaLayananController@store');
    $router->delete('/{id}','HargaLayananController@delete_specify');
    $router->post('/edit/{id}','HargaLayananController@edit_specify');
});

$router->group(['prefix' => 'pengadaanbarang'], function() use ($router) {
    $router->get('/','PengadaanBarangController@fetch_all');
    $router->post('/store','PengadaanBarangController@store');
    $router->post('/edit/{id}','PengadaanBarangController@edit_specify');
    $router->delete('/{id}','PengadaanBarangController@delete_specify');
    $router->post('/cetak/{id}','PengadaanBarangController@confirmCetak');
    $router->post('/datang/{id}','PengadaanBarangController@confirmDatang');
    $router->post('/laporanTahunan','PengadaanBarangController@simpanSuratTahun');
    $router->get('/cekpdf/{id}','PengadaanBarangController@suratPemesanan');
});

$router->group(['prefix' => 'rincianpengadaan'], function() use ($router) {
    $router->get('/','RincianPengadaanController@fetch_all');
    $router->post('/store','RincianPengadaanController@store');
    $router->delete('/{id}','RincianPengadaanController@delete_specify');
    $router->post('/edit/{id}','RincianPengadaanController@edit_specify');
});

$router->group(['prefix' => 'transaksipembayaran'], function() use ($router) {
    $router->get('/','TransaksiPembayaranController@fetch_all');
    $router->post('/store','TransaksiPembayaranController@store');
    $router->post('/edit/{id}','TransaksiPembayaranController@edit_specify');
    $router->delete('/{id}','TransaksiPembayaranController@delete_specify');
    $router->post('/selesai/{id}','TransaksiPembayaranController@confirmSelesai');

});

$router->group(['prefix' => 'rincianpembelian'], function() use ($router) {
    //$router->get('/','RincianPembelianController@fetch_all');
    $router->post('/store','RincianPembelianController@store');
    $router->post('/edit/{id}','RincianPembelianController@edit_specify');
    $router->delete('/{id}','RincianPembelianController@delete_specify');
});

