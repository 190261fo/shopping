<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        // 誰でもアクセスできるように認証処理は外す
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        // ↓ 10件の商品データを取得し home.blade.phpへ渡す。
        //SELECT * FROM items LIMIT 10;
        $items = Item::limit(10)->get();
        $data = ['items' => $items];
        return view('home', $data);

        // 例えば、SELECT * FROM items OFFSET 9 LIMIT 10;
        //  Eloquent を使うと、Item::offset(9)->limit(10)->get();
    }
}