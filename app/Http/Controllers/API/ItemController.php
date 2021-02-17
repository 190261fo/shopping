<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function get()
    {
        $items = Item::limit(10)->get();
        // 自動的にJSONへ変換
        return response()->json($items);
    }

    public function fetch(Request $request)
    {
        $item = Item::find($request->id);
        // id一致一件だけ
        return response()->json($item);
    }
}
