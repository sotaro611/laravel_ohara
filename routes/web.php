<?php

// use文。このファイル内で扱うクラスをインポートするための機能

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// お問い合わせフォームルート
// Route::get('/contacts', [ContactFormController::class, 'index'])->name('contacts.index');
// リソースコントローラー用のまとめてルート作成
// Route::resource('contacts', ContactFormController::class);
Route::prefix('contacts') // 頭に contacts をつける
    ->middleware(['auth']) // 認証
    ->name('contacts.') // ルート名
    ->controller(ContactFormController::class) // コントローラ指定
    ->group(
        function () { // グループ化
            Route::get('/', 'index')->name('index'); // index
            Route::get('/create', 'create')->name('create'); //create
            Route::post('/', 'store')->name('store'); //store
            Route::get('/{id}', 'show')->name('show'); //show
            Route::get('/{id}/edit', 'edit')->name('edit'); //edit
            Route::post('/{id}', 'update')->name('update'); //update
            Route::post('/{id}/destroy', 'destroy')->name('destroy'); //update
        }
    );




//テスト用ルーティング
// ルートには名前を付けることができる。名前を付けておくと、リンクを貼るときに便利。
Route::get('tests/test', [TestController::class, 'index'])->name('test.index');


//ルーティングの定義 Route::通信方法(post or get) (アドレス、処理);
//ex.「/」というURLにアクセスしたら return view('welcome')という処理を行う
//view(ビューファイル)でビューファイルを表示。自動的にresources.viewsの中身を参照し、welcome.blade.phpのファイ名のみで指定できる
Route::get('/', function () {
    return view('welcome');
});

//middleware(auth)→認証機能。ログインしているユーザーでなければdashboardにはアクセスできない。
//ログインしていないユーザーがアクセスするとログイン画面にリダイレクトがかかる
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
