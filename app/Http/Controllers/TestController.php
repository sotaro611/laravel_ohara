<?php
// 名前空間　同じ名前の関数・メソッド等を使う仕組み
namespace App\Http\Controllers;

// use文。継承用のControllerクラスとRequestクラスを使うためにインポート。
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test; // エロクアントで使うTestモデルのインポート。

// コントローラーの本体
class TestController extends Controller
{
    // viewsの中のtestsフォルダの中のtext.blade.phpを参照するという意味
    public function index()
    {
        // DB処理　エロクアント⇒モデル名::メソッドで様々な処理が可能
        $values = Test::all();
        // die + var_dump その時点で処理を止めて、中身を表示する。
        // dd($values);
        // コントローラーのindexメソッドが呼び出された時の処理
        return  view('tests.test', compact('values'));
    }
}
