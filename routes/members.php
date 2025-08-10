<?php
Route::group(['prefix' => 'dashoard',                 'as' => 'dashboard.'], function () {
    Route::get('/',                                  [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
});
