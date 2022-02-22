<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\CategoryController;
 use App\Http\Controllers\CustomerController;
 use App\Http\Controllers\PurchaseController;
 use App\Http\Controllers\PurchasePdfController;
 use App\Http\Controllers\ProductController;
 use App\Http\Controllers\PdfController;
 use App\Http\Controllers\SupplierController;
 use App\Http\Controllers\StockController;
 use App\Http\Controllers\PosController;
 use App\Http\Controllers\PaymentController;
 use App\Http\Controllers\CompanyController;
 use App\Http\Controllers\CartController;
 use App\Http\Controllers\Auth\LoginController as Userlogin ;
 use App\Events\MyEvent;
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
// Route::get('/', function () {
// return view('login.index');
// });

// auth route for both
// Route::group(['middleware'=>['auth']], function(){
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');


 Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[ UserController::class,'loginview'])->name('user.login');
    Route::post('login',[ UserController::class,'loginverify'])->name('user.verify');

});


Route::group(['middleware'=>['auth']],function(){
  Route::post('logout',[UserController::class,'logout'])->name('user.logout');
});


Route::middleware(['auth'])->group(function(){
    Route::get('home',[UserController::class,'Dashboard'])->name('dashboard');

// super admin
Route::get('/add/admin', [UserController::class, 'AddAdmin'])->name('add.admin');
Route::get('/admin/list', [UserController::class, 'AdminList'])->name('admin.list');
Route::get('/edit/admin/{id}', [UserController::class, 'EditAdmin'])->name('EditAdmin');
Route::post('/update/admin/{id}', [UserController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::get('/delete/admin/{id}', [UserController::class, 'DeleteAdmin'])->name('DeleteAdmin');
Route::post('/add/admin', [UserController::class, 'StoreAdmin'])->name('StoreAdmin');



///// Category start///
Route::get('/add/category',  [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/add/category',  [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/category/list', [CategoryController::class, 'CategoryList'])->name('category.list');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
/////Category end///

///// product start///
Route::get('/add/product',   [ProductController::class,   'AddProduct'])->name('add.product');
Route::get('/show/product',   [ProductController::class,   'showProduct'])->name('show.product');
Route::post('/add/product',  [ProductController::class, 'StoreProduct'])->name('store.product');
Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::post('/update/product/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
///// product end///


/// manager start ////
Route::get('/add/manager', [UserController::class, 'ManagerView'])->name('add.manager');
Route::post('/add/manager', [UserController::class, 'ManagerStore'])->name('manager.store');
Route::get('/show', [UserController::class, 'Managershow'])->name('show.manager');
// Route::post('/store', [UserController::class, 'ManagerStore'])->name('manager.store');
Route::get('/edit/{id}', [UserController::class, 'ManagerEdit'])->name('manager.edit');
Route::post('/edit/{id}', [UserController::class, 'ManagerUpdate'])->name('ManagerUpdate');
// Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('manager.delete');
Route::get('manager/delete/{id}', [UserController::class, 'destroy'])->name('manager.delete');
/// manager end////

//pdf start//
Route::get('/pdf', [PdfController::class, 'CreatePdf'])->name('create.pdf');
Route::get('/downloadpdf', [PdfController::class, 'download'])->name('download');
//pdf end//

//password change
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('superadmin.admin_change_password');
////Admin update password
Route::post('/update/change/password/', [AdminController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
Route::get('/notifications',[UserController::class,'Notification'])->name('notification');



//return product crud

Route::get('/add/returnproduct',   [ProductController::class,   'showReturnProduct'])->name('show.return.product');
Route::get('/show/returnproduct',   [ProductController::class,   'showretuenProductlist'])->name('show.return.productList');
Route::post('/add/returnproduct',  [ProductController::class, 'StoreReturnProduct'])->name('store.return.product');
Route::get('/edit/returnproduct/{id}', [ProductController::class, 'EditReturnProduct'])->name('edit.return.product');
Route::post('/update/returnproduct/{id}', [ProductController::class, 'UpdateReturnProduct'])->name('update.return.product');
Route::get('/delete/returnproduct/{id}', [ProductController::class, 'DeletereturnProduct'])->name('delete.return.product');
Route::get('/approve/returnproduct/{id}', [ProductController::class, 'ApprovereturnProduct'])->name('approve.return.product');
Route::post('/approve/returnproduct', [ProductController::class, 'Approveconfirm'])->name('confirm.return.product');


Route::get('/get/Suppliarnamebyproduct/{id}', [ProductController::class, 'GetSupliar'])->name('Get.suppliar.name');
Route::get('/get/barcode/{id}/{print_quantity}', [PurchaseController::class, 'Barcode'])->name('Get.barcode');




Route::get('/add/purchase',   [PurchaseController::class,   'AddPurchase'])->name('add.purchase');
Route::get('/show/purchase',   [PurchaseController::class,   'showPurchase'])->name('show.purchase');
Route::post('/add/purchase',  [PurchaseController::class, 'StorePurchase'])->name('store.purchase');
Route::get('/edit/purchase/{id}', [PurchaseController::class, 'EditPurchase'])->name('edit.purchase');
Route::post('/edit/purchase/{id}', [PurchaseController::class, 'UpdatePurchase'])->name('update.purchase');
// Route::post('/update/purchase/{id}', [PurchaseController::class, 'UpdatePurchase'])->name('update.purchase');
Route::get('/delete/purchase/{id}', [PurchaseController::class, 'DeletePurchase'])->name('delete.purchase');

/// Supplier start ////
Route::get('/add/supplier', [SupplierController::class, 'SupplierView'])->name('add.Supplier');
Route::post('/add/supplier', [SupplierController::class, 'SupplierStore'])->name('Supplier.store');

Route::get('/show/supplier', [SupplierController::class, 'Suppliershow'])->name('show.Supplier');

// Route::post('/store', [SupplierController::class, 'SupplierStore'])->name('Supplier.store');


Route::get('/supplier/edit/{supplier_id}', [SupplierController::class, 'SupplierEdit'])->name('Supplier.edit');
Route::post('/update/{id}', [SupplierController::class, 'SupplierUpdate'])->name('SupplierUpdate');




// Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('Supplier.delete');
Route::get('/supplier/destroy/{supplier_id}', [SupplierController::class, 'Supplierdestroy']);
/// Supplier end////


//dom pdf

Route::get('/get/purchase',[PurchasePdfController::class,'getPurchase'])->name('purchase.pdf');
Route::post('/download/pdf',[PurchasePdfController::class,'downloadPDF' ])->name('download.pdf');


// stock
Route::get('/stock/list', [StockController::class, 'StockList'])->name('stock.list');
Route::get('/customer/list', [CustomerController::class, 'CustomerList'])->name('customer.list');



Route::post('/store', [CustomerController::class, 'CustomerStore'])->name('customer.store');
Route::get('edit-customer/{id}', [CustomerController::class, 'edit']);
// Route::get('/customer/customer/{customer_id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('fetch-customers', [CustomerController::class, 'fetchcustomer']);
Route::post('/update-customer/{id}', [CustomerController::class, 'update']);
// Route::get('/color/{id}/edit', 'TestController@update')->name('color.update');

Route::get('delete-customer/{id}', [CustomerController::class, 'destroyCustomer'])->name('customer.destroy');;

Route::post('/stock/list', [StockController::class, 'StockSearch'])->name('stock.search');

//// Sales////

Route::get('/sales', [PosController::class, 'SalesShow'])->name('SalesShow');
Route::get('/possales', [PosController::class, 'SalesList'])->name('SalesList');
Route::get('/getProduct/{id}',[PosController::class,'getPorduct'])->name('getProduct');
Route::post('/store/pos', [PosController::class, 'CustomerSto'])->name('CustomerStored');
Route::get('/salespdf', [PosController::class, 'SalesPdf'])->name('sales.pdf');
Route::get('/dpdf', [PosController::class, 'DayPdf'])->name('day.pdf');
Route::get('/mpdf', [PosController::class, 'MonthPdf'])->name('month.pdf');
Route::get('/ypdf', [PosController::class, 'YearPdf'])->name('year.pdf');
// Route::get('/customer', [CustomerController::class, 'CustomerShow'])->name('CustomerShow');
Route::get('/search-customer', [CustomerController::class, 'Search']);



Route::get('/getProduct/{id}',[PosController::class,'getPorduct'])->name('getProduct');

//pos store
Route::post('/products-pos/{id}', [PosController::class, 'storeProductPos']);
Route::get('/getstock/{id}', [PosController::class,'getstock']);
Route::get('/fetch-pos',[PosController::class, 'getPos']);
Route::get('/search',[PosController::class, 'search']);
Route::get('/seles/report',[PosController::class, 'SalesReport'])->name('sales.report');
Route::post('/seles/report',[PosController::class, 'Report'])->name('report');

// Product mini Cart ajax data
Route::get('/product/mini/cart/', [PosController::class, 'AddMiniCart']);


//remove products from cart
Route::get('/minicart/product-remove/{rowId}', [PosController::class, 'RemoveMiniCart'])->name('delete.pos');
// Route::post('/products-pos/{id}', [PosController::class, 'AddToCart']);
Route::get('/cart-increment/{rowId}', [PosController::class, 'cartIncrement']);
Route::get('/cart-decrement/{rowId}', [PosController::class, 'CartDecrement']);
//company profile
Route::get('/company/profile',[CompanyController::class, 'index'])->name('company.setting');
Route::post('/company/profile',[CompanyController::class, 'CompanyinfoStore'])->name('companyinfo.store');
Route::get('/company/profile/edit',[CompanyController::class, 'CompanyinfoEdit'])->name('editcompany.info');
Route::post('/company/profile/edit/{id}',[CompanyController::class, 'CompanyinfoUpdate'])->name('updatecompany.info');
//pos delete
Route::get('/delete/{id}',[PurchasePdfController::class, 'destroy_pos'])->name('pos.destroy');
//order routes
Route::resource('orders', OrderController::class);


Route::post('token',[PaymentController::class, 'token'])->name('token');




Route::get('/getstock/{id}', [PosController::class,'getstock']);





});


Route::get('/test', function () {
    return  view('welcome');
});
///// purchase start///


