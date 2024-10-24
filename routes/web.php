<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeComponent;
use App\Livewire\UserListComponent;
use App\Livewire\AddUserComponent;
use App\Livewire\EditUserComponent;
use App\Livewire\AddWarehouseComponent;
use App\Livewire\BodyComponent;
use App\Livewire\WarehouseListComponent;
use App\Livewire\SupplierListComponent;
use App\Livewire\CategoryListComponent;
use App\Livewire\ItemListComponent;
use App\Livewire\ImportComponent;
use App\Livewire\AddGoodsReceiptComponent;
use App\Http\Controllers\AddGoodReceiptComponent2;
use App\Livewire\StockTakeComponent;
use App\Livewire\AddStockTakeComponent;
use App\Livewire\CustomerListComponent;
use App\Models\GoodIssue;
use App\Http\Controllers\GoodIssueComponent;
use App\Http\Controllers\StockTakingComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home',HomeComponent::class)->name('home');
    Route::get('/changepassword',function(){
        return view('auth.reset-password');
    })->name('changepassword');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/userlist',UserListComponent::class)->name('admin.userlist');
    Route::get('/admin/adduser',UserListComponent::class)->name('admin.adduser');
    Route::post('/admin/adduser',AddUserComponent::class)->name('admin.adduser');
    Route::get('/admin/edit/user/{id}',EditUserComponent::class)->name('admin.edituser');
    Route::get('/admin/warehouselist',WarehouseListComponent::class)->name('admin.warehouselist');
    Route::get('/admin/addwarehouse',AddWarehouseComponent::class)->name('admin.addwarehouse');
    Route::post('/admin/addwarehouse',AddWarehouseComponent::class)->name('admin.addwarehouse');
    Route::get('/admin/supplierlist',SupplierListComponent::class)->name('admin.supplierlist');
    Route::get('/admin/categorylist',CategoryListComponent::class)->name('admin.categorylist');
    Route::get('/admin/itemlist',ItemListComponent::class)->name('admin.itemlist');
    Route::get('/admin/import',ImportComponent::class)->name('admin.import');
    Route::get('/admin/add-goods-receipt',AddGoodsReceiptComponent::class)->name('admin.addgoodsreceipt');
    Route::post('/admin/add-goods-receipt-form',[AddGoodReceiptComponent2::class,'submit'])->name('add-good-receipt-form');
    Route::get('/admin/add-goods-receipt',[AddGoodReceiptComponent2::class,'show'])->name('admin.addgoodsreceipt2');
    Route::get('/customer',CustomerListComponent::class)->name('customer');
    Route::get('/goodissue',[GoodIssueComponent::class,'show'])->name('goodissue');
    Route::get('/addgoodissue',[GoodIssueComponent::class,'showAddModal'])->name('add-good-issue');
    Route::post('/add-good-issue-form',[GoodIssueComponent::class,'submit']);
    Route::get('/stock-take',[StockTakingComponent::class,'show'])->name('stocktake');
    Route::get('/add-stock-take',[StockTakingComponent::class,'showAddBlade'])->name('add-stock-taking');
    Route::post('/add-stock-take-form',[StockTakingComponent::class,'submit'])->name('add-stock-take-form');
    Route::get('/admin/body-component/{id}',BodyComponent::class)->name('admin.bodycomponent');

});