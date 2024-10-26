<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Models\Customers;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/customers', function(){
    $customers = Customers::all();
    echo "<pre>";
    print_r($customers->toArray());
});

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.create');

Route::get('/customer/view', [CustomerController::class, 'view'])->name('customer.view');;

Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');



Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');

Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');

Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');

Route::get('/customer/permanentdelete/{id}', [CustomerController::class, 'permanentdelete'])->name('customer.permanentdelete');

Route::post('/customer', [CustomerController::class, 'store']);

Route::get('/getsession', function(){
    $request= session()->all();
    echo "<pre>";
    print_r($request);
    echo "</pre>";

});

Route::get('/set-session', function(Request $request){
$request=session()->put('user_name', 'wscube');
return redirect('/getsession');

});

Route::get('/destroy-session', function(){
    session()->forget('user_name');
return redirect('/getsession');

});