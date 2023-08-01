<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CashWalletController;
use App\Http\Controllers\Admin\PackageSettingController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\HomeController;

Auth::routes(['verify' => true]);


Route::get('/test', function () {
    return 'hello world';
});


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => true]);

Route::post('/home/get-sponsor', [RegisterController::class,'getSponsor'])->name('get-sponsor');
Route::get('/home/cash-wallet', [CashWalletController::class,'index'])->name('cashwallet.index');
Route::get('/home/cash-wallet-my-asset', [CashWalletController::class,'myAsset'])->name('my-asset');
//Route::get('/home/my-affiliate', [UserController::class,'myAffiliate'])->name('my-affliate');
Route::post('/home/cash-wallet-addfund', [CashWalletController::class,'store'])->name('add-fund');

Route::get('/home/cash-wallet-approve/{id}', [CashWalletController::class,'approve']);
Route::get('/home/cash-wallet-reject/{id}', [CashWalletController::class,'reject']);

Route::get('/home/packages', [PackageSettingController::class,'user_package'])->name('user.package.index');
Route::post('/home/cash-wallet-buy-package', [PackageSettingController::class,'buyPackage'])->name('buy-package');

Route::post('/home/transfer-wallet-convertfund', [CashWalletController::class,'convert'])->name('convert-fund');

Route::get('/home/daily-bonus-history', [HomeController::class,'DailyBonus'])->name('daily-bonus-history');
Route::get('/home/update-realtime-mining', [HomeController::class,'UpdateMining'])->name('update-realtime-mining');

Route::get('/home/my-tree', [HomeController::class,'my_tree'])->name('my-tree');
Route::get('/home/level-bonus-history', [HomeController::class,'LevelBonus'])->name('level-bonus-history');
Route::get('/home/transfer-fund', [HomeController::class,'TransferFund'])->name('user-transfer-fund');
Route::post('/home/transfer-fund-store', [HomeController::class,'TransferFundStore'])->name('transfer-fund-store');
Route::get('/home/user/withdrawal-settings', [HomeController::class,'WithdrawSetting'])->name('user-withdrwal-settings');
Route::get('/wallets/{id}/edit', [HomeController::class,'WithdrawEdit'])->name('user-withdrwal-edit');
Route::put('/wallets/{id}', [HomeController::class,'WithdrawUpdate'])->name('wallets.update');


Route::post('/home/user/withdrawal-settings-add', [HomeController::class,'WithdrawSettingStore'])->name('add-wallet');
Route::post('/home/user/create-withdraw', [HomeController::class,'Withdraw'])->name('make-withdraw');

 Route::get('withdrwal-request', [App\Http\Controllers\Admin\HomeController::class,'approveWithdrawalRequest'])->name('admin.withdrwal-request');
 Route::get('/admin/withdrwal-request-approve/{id}/{status}', [App\Http\Controllers\Admin\HomeController::class,'approveWithdrawal']);
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home')->middleware('verified');
   

//Route::get('withdrwal-request-reject/{id}', [HomeController::class,'rejectWithdrawal']);
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Package Setting
    Route::delete('package-settings/destroy', 'PackageSettingController@massDestroy')->name('package-settings.massDestroy');
    Route::post('package-settings/media', 'PackageSettingController@storeMedia')->name('package-settings.storeMedia');
    Route::post('package-settings/ckmedia', 'PackageSettingController@storeCKEditorImages')->name('package-settings.storeCKEditorImages');
    Route::resource('package-settings', 'PackageSettingController');

    // Level Setting
    Route::resource('level-settings', 'LevelSettingController', ['except' => ['create', 'store', 'destroy']]);

    // Admin Wallet
    Route::resource('admin-wallets', 'AdminWalletController', ['except' => ['destroy']]);

    // General Setting
    Route::post('general-settings/media', 'GeneralSettingController@storeMedia')->name('general-settings.storeMedia');
    Route::post('general-settings/ckmedia', 'GeneralSettingController@storeCKEditorImages')->name('general-settings.storeCKEditorImages');
    Route::resource('general-settings', 'GeneralSettingController', ['except' => ['create', 'store', 'destroy']]);

    // Cash Wallet
    Route::post('cash-wallets/media', 'CashWalletController@storeMedia')->name('cash-wallets.storeMedia');
    Route::post('cash-wallets/ckmedia', 'CashWalletController@storeCKEditorImages')->name('cash-wallets.storeCKEditorImages');
    Route::resource('cash-wallets', 'CashWalletController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Mining Wallet
    Route::post('mining-wallets/media', 'MiningWalletController@storeMedia')->name('mining-wallets.storeMedia');
    Route::post('mining-wallets/ckmedia', 'MiningWalletController@storeCKEditorImages')->name('mining-wallets.storeCKEditorImages');
    Route::resource('mining-wallets', 'MiningWalletController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Bonus Wallet
    Route::post('bonus-wallets/media', 'BonusWalletController@storeMedia')->name('bonus-wallets.storeMedia');
    Route::post('bonus-wallets/ckmedia', 'BonusWalletController@storeCKEditorImages')->name('bonus-wallets.storeCKEditorImages');
    Route::resource('bonus-wallets', 'BonusWalletController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    
    //affilate page
    Route::get('/home/my-affilate/', [HomeController::class,'affilate_index'])->name('affilate_index');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/upload-photo', 'ChangePasswordController@updateProfilePhoto')->name('password.updateProfilePhoto');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
