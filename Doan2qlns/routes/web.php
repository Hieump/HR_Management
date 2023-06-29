<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TongquanController as tongquan;
use App\Http\Controllers\NhanvienController as nhanvien;
use App\Http\Controllers\PhongbanController as phongban;
use App\Http\Controllers\QuantriController as quantri;
use App\Http\Controllers\CongviecController as congviec;
use App\Http\Controllers\LuongController as luong;
use App\Http\Controllers\ChamcongController as chamcong;

use App\Http\Middleware\phanquyen;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'tongquan'], function () {
    Route::get('trangchu',[tongquan::class, 'getTongquan'] )->name('tong_quan')->middleware('phanquyen');
});

Route::group(['prefix' => 'nhanvien'], function () {
    Route::get('danhsachnhanvien',[nhanvien::class, 'getdanhsach'] )->name('ds_nhanvien')->middleware('phanquyen');

    Route::get('chitetnhanvien/{id}',[nhanvien::class, 'getchitet'] )->name('chitet_NV')->middleware('phanquyen');

    Route::get('nghiphep',[nhanvien::class, 'getnghiphep'] )->name('nghiphep')->middleware('phanquyen');

    Route::get('themmoinghiphep',[nhanvien::class, 'getthemmoi'] )->name('them_nghiphep')->middleware('phanquyen');
    Route::post('themmoinghiphep',[nhanvien::class, 'postthemmoi'] )->name('them_nghiphep')->middleware('phanquyen');
    Route::get('chapthuan/{id}',[nhanvien::class, 'posttinhtrang'] )->name('chapthuan')->middleware('phanquyen');
    Route::get('tuchoi/{id}',[nhanvien::class, 'posttuchoi'] )->name('tuchoi')->middleware('phanquyen');


});

Route::group(['prefix' => 'phongban'], function () {
    Route::get('danhsachphongban',[phongban::class, 'getdanhsach'] )->name('ds_phongban')->middleware('phanquyen');

    Route::get('themmoiphongban',[phongban::class, 'getthem'] )->name('them_PB')->middleware('phanquyen');
    Route::post('themmoiphongban',[phongban::class, 'postThem'] )->name('them_PB')->middleware('phanquyen');

    Route::get('chitetphongban/{id_PB}',[phongban::class, 'getchitetPB'] )->name('chitiet_PB')->middleware('CheckTruongPhong');
});

Route::group(['prefix' => 'quantri'], function () {
    
    Route::get('themTK',[quantri::class, 'getDangki'] )->name('them_TK')->middleware('phanquyen');
    Route::post('themTK',[quantri::class, 'postDangki'] )->name('them_TK')->middleware('phanquyen');

    Route::get('sua/{id}',[quantri::class, 'getSua'] )->name('sua_TK')->middleware('phanquyen');
    Route::post('sua/{id}',[quantri::class, 'postSua'] )->name('sua_TK')->middleware('phanquyen');

    Route::get('xoa/{id}',[quantri::class, 'getXoa'] )->name('xoa_TK')->middleware('phanquyen');

    Route::get('danhsachtaikhoan',[quantri::class, 'getdanhsachTK'] )->name('ds_taikhoan')->middleware('phanquyen');

    Route::get('dansachcongviec',[congviec::class, 'getdanhsachCV'] )->name('ds_congviec')->middleware('phanquyen');

    Route::get('themcongviec/{id}',[congviec::class, 'getthemCV'] )->name('them_CV')->middleware('phanquyen');
    Route::post('themcongviec/{id}',[congviec::class, 'postthemCV'] )->name('them_CV2')->middleware('phanquyen');

    Route::get('chamcong' , [quantri::class , 'getChamCong'])->name('cham_cong')->middleware('phanquyen');
    Route::post('chamcong' , [quantri::class , 'postChamCong'])->name('cham_cong')->middleware('phanquyen');

    Route::get('lichsuchamcong' , [quantri::class , 'getlichsu'])->name('lichsu_CC')->middleware('phanquyen');

});

Route::group(['prefix' => 'luong'], function () {

    Route::get('danhsachluong',[luong::class, 'getdanhsachBL'])->name('ds_luong')->middleware('phanquyen');

    Route::get('themluong',[luong::class, 'getthem'] )->name('them_BL')->middleware('phanquyen');
    Route::post('themluong',[luong::class, 'postthem'] )->name('them_BL')->middleware('phanquyen');
    Route::get('getbangluong/{id}',[luong::class, 'getbangluong'] )->name('getbangluong')->middleware('phanquyen');
    Route::get('testluong',[luong::class, 'testluong'] )->name('test_luong')->middleware('phanquyen');
    Route::post('traluong',[luong::class, 'traluong'] )->name('traluongajax')->middleware('phanquyen');

});
Route::group(['prefix' => 'chamcong'], function () {

    Route::get('danhsachCC',[chamcong::class, 'getchamcong'])->name('ds_chamcong')->middleware('phanquyen');
});



Route::get('login', function () {
    return view('login');
})->name('get-dang-nhap');

Route::post('login', [tongquan::class , 'postLogin'])->name('dang-nhap');

Route::get('logout', function () {
    session()->flush();
    return redirect()->route('get-dang-nhap');
})->name('logout');

Route::get('ajaxtable' , [nhanvien::class , 'ajaxTable'])->name('getAjaxTable');

