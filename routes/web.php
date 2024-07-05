<?php

use App\Http\Controllers\ArrearController;
use Carbon\Month;
use Carbon\Carbon;
use App\Models\Doc;
use App\Models\Costumer;
use App\Models\Property;
use App\Models\Notification;
use App\Models\PayInstallment;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CancelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayInstallmentController;
use App\Http\Controllers\LandCertificateController;
use App\Models\Documentation;

Route::get('/', function () {
    return view('index', [
        'title' => 'Abu Umar Property - Home',
        'properties' => Property::latest()->get(),
        'documentations' => Documentation::latest()->get()
    ]);
});

Route::get('properties', function () {
    return view('properties', [
        'title' => 'Abu Umar Property - Properties',
        'properties' => Property::latest()->get()
    ]);
});

Route::get('property/{property:id}', function (Property $property) {
    return view('property', [
        'title' => 'Abu Umar Property - Single Property',
        'property' => $property
    ]);
});

Route::get('gallery/{documentation:id}', function (Documentation $documentation) {
    return view('gallery', [
        'title' => 'Abu Umar Property - Gallery Detail',
        'documentation' => $documentation
    ]);
});

Route::get('services', function () {
    return view('services', [
        'title' => 'Abu Umar Property - Services',
    ]);
});

Route::get('faq', function () {
    return view('faq', [
        'title' => 'Abu Umar Property - FAQ',
    ]);
});

Route::get('contact', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'store']);

Route::get('about', function () {
    return view('about', [
        'title' => 'Abu Umar Property - About',
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Abu Umar Property - Dashboard',
        'costumers' => Costumer::latest()->get(),
        'notifications' => Doc::latest()->get()
    ]);
})->middleware('auth');

Route::resource('/dashboard/costumers', CostumerController::class)->middleware('auth');
Route::get('/dashboard/costumer/file/{costumer:id}', [CostumerController::class, 'downloadFile'])->middleware('admin');
Route::get('/dashboard/costumers/download/laporan-penjualan', [CostumerController::class, 'downloadLaporanPenjualan'])->middleware('admin');

Route::resource('/dashboard/lands', LandController::class)->middleware('admin');
Route::resource('/dashboard/pay_installments', PayInstallmentController::class)->middleware('auth');
Route::get('dashboard/pay_installments/download/angsuran/{pay_installment:id}', [PayInstallmentController::class, 'downloadAngsuran'])->middleware('admin');

// Laporan bulanan per kantor tiap kota
Route::get('/dashboard/pay_installments/download/laporan-bulanan/pekanbaru', [PayInstallmentController::class, 'downloadLaporanBulananPekanbaru'])->middleware('admin');
Route::get('/dashboard/pay_installments/download/laporan-bulanan/dumai', [PayInstallmentController::class, 'downloadLaporanBulananDumai'])->middleware('admin');
Route::get('/dashboard/pay_installments/download/laporan-bulanan/rohul', [PayInstallmentController::class, 'downloadLaporanBulananRohul'])->middleware('admin');

Route::resource('/dashboard/land_certificates', LandCertificateController::class)->middleware('auth');
Route::resource('/dashboard/cancels', CancelController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/docs', DocController::class)->middleware('auth');
Route::resource('/dashboard/notifications', NotificationController::class)->middleware('auth');
Route::resource('/dashboard/properties', PropertyController::class)->middleware('auth');
Route::get('/dashboard/recap-of-arrears', function () {
    return view('dashboard.rekap-tunggakan', [
        'title' => 'Abu Umar Property - Rekap Tunggakan',
        'notifications' => Doc::latest()->get(),
        'all_data' => PayInstallment::whereMonth('tanggal_pembayaran', Carbon::now()->month)->where('sisa_angsuran', '!=', 0)->get()
    ]);
})->middleware('auth');

// Laporan Tunggakan Perbulan dan Pertahun

Route::get('/dashboard/export-tunggakanPerbulan', [ArrearController::class, 'exportTunggakanPerbulan'])->middleware('auth');
Route::get('/dashboard/export-tunggakanPertahun', [ArrearController::class, 'exportTunggakanPertahun'])->middleware('auth');

// Laporan Lahan

Route::get('/dashboard/laporan-lahan-almadinah1', [LandController::class, 'exportLahanAlmadinah1'])->middleware('auth');
Route::get('/dashboard/laporan-lahan-almadinah2', [LandController::class, 'exportLahanAlmadinah2'])->middleware('auth');
Route::get('/dashboard/laporan-lahan-almadinah3', [LandController::class, 'exportLahanAlmadinah3'])->middleware('auth');

Route::resource('/dashboard/documentation', DocumentationController::class)->middleware('admin');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('refresh_captcha', [LoginController::class, 'refreshCaptcha'])->name('refresh_captcha');
Route::post('/logout', [LoginController::class, 'logout']);
