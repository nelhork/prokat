<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeSourcesController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SpendingCategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::middleware('auth')->group(function ()
{
    Route::get('stocks', [StockController::class, 'index'])->name('stocks.index');
    Route::get('stocks/create', [StockController::class, 'create'])->name('stocks.create');
    Route::post('stocks', [StockController::class, 'store'])->name('stocks.store');
    Route::get('stocks/{stock}/edit',  [StockController::class, 'edit'])->name('stocks.edit');
    Route::put('stocks/{stock}',  [StockController::class, 'update'])->name('stocks.update');
    Route::delete('stocks/{stock}',  [StockController::class, 'destroy'])->name('stocks.destroy');

    Route::get('models', [ModelController::class, 'index'])->name('models.index');
    Route::get('models/create', [ModelController::class, 'create'])->name('models.create');
    Route::post('models', [ModelController::class, 'store'])->name('models.store');
    Route::get('models/{model}/edit',  [ModelController::class, 'edit'])->name('models.edit');
    Route::put('models/{model}',  [ModelController::class, 'update'])->name('models.update');
    Route::delete('models/{model}',  [ModelController::class, 'destroy'])->name('models.destroy');
    Route::get('models/search', [ModelController::class, 'search'])->name('models.search');

    Route::get('models/{model}/pricelists', [PriceListController::class, 'index'])->name('models.pricelists');
    Route::get('models/{model}/pricelists/create', [PriceListController::class, 'create'])->name('models.pricelists.create');
    Route::post('pricelists', [PriceListController::class, 'store'])->name('pricelists.store');
    Route::get('models/{model}/pricelists/{pricelist}/edit',  [PriceListController::class, 'edit'])->name('models.pricelists.edit');
    Route::put('models/{model}/pricelists/{pricelist}',  [PriceListController::class, 'update'])->name('pricelists.update');
    Route::delete('models/{model}/pricelists/{pricelist}',  [PriceListController::class, 'destroy'])->name('models.pricelists.destroy');
    Route::get('models/{model}/pricelists/for-period',  [PriceListController::class, 'showForPeriod'])->name('models.pricelists.for-period');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('orders/{order}', [OrderController::class, 'view'])->name('orders.view');
    Route::put('orders/{order}/give', [OrderController::class, 'give'])->name('orders.give');
    Route::put('orders/{order}/take', [OrderController::class, 'take'])->name('orders.take');

    Route::get('items', [ItemController::class, 'index'])->name('items.index');
    Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('items', [ItemController::class, 'store'])->name('items.store');
    Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('items/{item}',  [ItemController::class, 'destroy'])->name('items.destroy');

    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{employee}/edit',  [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('employees/{employee}',  [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employees/{employee}',  [EmployeeController::class, 'destroy'])->name('employees.destroy');

    Route::get('movements', [MovementController::class, 'index'])->name('movements.index');

    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project}/edit',  [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{project}',  [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{project}',  [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('income-sources', [IncomeSourcesController::class, 'index'])->name('income-sources.index');
    Route::get('income-sources/create', [IncomeSourcesController::class, 'create'])->name('income-sources.create');
    Route::post('income-sources', [IncomeSourcesController::class, 'store'])->name('income-sources.store');
    Route::get('income-sources/{source}/edit',  [IncomeSourcesController::class, 'edit'])->name('income-sources.edit');
    Route::put('income-sources/{source}',  [IncomeSourcesController::class, 'update'])->name('income-sources.update');
    Route::delete('income-sources/{source}',  [IncomeSourcesController::class, 'destroy'])->name('income-sources.destroy');

    Route::get('spending-categories', [SpendingCategoryController::class, 'index'])->name('spending-categories.index');
    Route::get('spending-categories/create', [SpendingCategoryController::class, 'create'])->name('spending-categories.create');
    Route::post('spending-categories', [SpendingCategoryController::class, 'store'])->name('spending-categories.store');
    Route::get('spending-categories/{category}/edit',  [SpendingCategoryController::class, 'edit'])->name('spending-categories.edit');
    Route::put('spending-categories/{category}',  [SpendingCategoryController::class, 'update'])->name('spending-categories.update');
    Route::delete('spending-categories/{category}',  [SpendingCategoryController::class, 'destroy'])->name('spending-categories.destroy');

    Route::resource('accounts', AccountController::class)->except('show');
    Route::resource('transactions', TransactionController::class)->except('show');
});
