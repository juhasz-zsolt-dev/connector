<?php

use App\Http\Controllers\Integrations\Billingo\BankAccountController;
use App\Http\Controllers\Integrations\Billingo\CurrencyController;
use App\Http\Controllers\Integrations\Billingo\DocumentController;
use App\Http\Controllers\Integrations\Billingo\DocumentExportController;
use App\Http\Controllers\Integrations\Billingo\OrganizationController;
use App\Http\Controllers\Integrations\Billingo\PartnerController;
use App\Http\Controllers\Integrations\Billingo\ProductController;
use App\Http\Controllers\Integrations\Billingo\SpendingController;
use App\Http\Controllers\Integrations\Billingo\UtilController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'documents'], function () {
    Route::get('/', [DocumentController::class, 'listDocument'])->name('documents.list');
    Route::post('/', [DocumentController::class, 'createDocument'])->name('documents.create');
    Route::group(['prefix' => 'receipt'], function () {
        Route::post('/', [DocumentController::class, 'createReceipt'])->name('documents.create-receipt');
        Route::post('/{id}', [DocumentController::class, 'createReceiptFromDraft'])->name('documents.create-receipt-from-draft');
    });
    Route::get('/vendor/{id}', [DocumentController::class, 'getDocumentByVendorId'])->name('documents.get-document-by-vendor-id');
    Route::group(['prefix' => '/{id}'], function () {
        Route::get('/', [DocumentController::class, 'getDocument'])->name('documents.get');
        Route::put('/', [DocumentController::class, 'createDocumentFromDraft'])->name('documents.create-document-from-draft');
        Route::delete('/', [DocumentController::class, 'deleteDocument'])->name('documents.delete');
        Route::put('archive', [DocumentController::class, 'archiveDocument'])->name('documents.archive');
        Route::get('download', [DocumentController::class, 'downloadDocument'])->name('documents.download');
    });
});

Route::group(['prefix' => 'partners'], function () {
    Route::get('/', [PartnerController::class, 'listPartner'])->name('partners.list');
    Route::post('/', [PartnerController::class, 'createPartner'])->name('partners.create');
    Route::get('/{id}', [PartnerController::class, 'getPartner'])->name('partners.get');
    Route::put('/{id}', [PartnerController::class, 'updatePartner'])->name('partners.update');
    Route::delete('/{id}', [PartnerController::class, 'deletePartner'])->name('partners.delete');
});

Route::group(['prefix' => 'bank-accounts'], function () {
    Route::get('/', [BankAccountController::class, 'listBankAccount'])->name('bank-accounts.list');
    Route::post('/', [BankAccountController::class, 'createBankAccount'])->name('bank-accounts.create');
    Route::group(['prefix' => '/{id}'], function () {
        Route::get('/', [BankAccountController::class, 'getBankAccount'])->name('bank-accounts.get');
        Route::put('/', [BankAccountController::class, 'updateBankAccount'])->name('bank-accounts.update');
        Route::delete('/', [BankAccountController::class, 'deleteBankAccount'])->name('bank-accounts.delete');
    });
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('products.list');
    Route::post('/', [ProductController::class, 'createProduct'])->name('products.create');
    Route::group(['prefix' => '/{id}'], function () {
        Route::get('/', [ProductController::class, 'getProduct'])->name('products.get');
        Route::put('/', [ProductController::class, 'updateProduct'])->name('products.update');
        Route::delete('/', [ProductController::class, 'deleteProduct'])->name('products.delete');
    });
});

Route::group(['prefix' => 'spendings'], function () {
    Route::get('/', [SpendingController::class, 'spendingList'])->name('spending.list');
    Route::post('/', [SpendingController::class, 'spendingSave'])->name('spending.create');
    Route::group(['prefix' => '/{id}'], function () {
        Route::get('/', [SpendingController::class, 'spendingShow'])->name('spending.get');
        Route::put('/', [SpendingController::class, 'spendingUpdate'])->name('spending.update');
        Route::delete('/', [SpendingController::class, 'spendingDelete'])->name('spending.delete');
    });
});

Route::group(['prefix' => 'utils'], function () {
    Route::get('/check-tax-number/{tax_number}', [UtilController::class, 'checkTaxNumber'])->name('util.check-tax-number');
    Route::get('/convert-legacy-id/{id}', [UtilController::class, 'convertLegacyId'])->name('util.convert-legacy-id');
    Route::get('/time', [UtilController::class, 'getServerTime'])->name('util.get-server-time');
});

Route::group(['prefix' => 'document-export'], function () {
    Route::post('create', [DocumentExportController::class, 'create'])->name('document-export.create');
    Route::get('download', [DocumentExportController::class, 'download'])->name('document-export.download');
    Route::get('poll', [DocumentExportController::class, 'poll'])->name('document-export.poll');
});

Route::get('/currencies', [CurrencyController::class, 'getConversionRate'])->name('currency.get-conversion-rate');
Route::get('/organization', [OrganizationController::class, 'getOrganizationData'])->name('organizations.list');
