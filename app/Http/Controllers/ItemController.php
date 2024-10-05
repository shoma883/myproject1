<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::where('user_id', auth()->id())->get();
        return view('items.index', compact('items'));

    }

    public function show()
    {
        return view('items.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーションルールを定義
        $request->validate([
            'name' => 'required|string|max:255',  // アイテム名は必須で、文字列かつ255文字以内
            'quantity' => 'required|integer|min:1', // 数量は必須で、整数かつ1以上
            'description' => 'nullable|string|max:500', // 説明は任意で、文字列かつ500文字以内
        ]);

        // 新しいアイテムを作成
        $item = new Item();
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description'); // 説明を追加
        $item->user_id = auth()->id(); // 現在ログインしているユーザーのIDを設定
        $item->save(); // データベースに保存

        // 作成完了後のリダイレクト
        return redirect()->route('items.index')->with('success', 'アイテムが作成されました。');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500', // 説明は任意で、文字列かつ500文字以内
        ]);

        // アイテムのデータを更新
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->description = $request->description;

        // データベースに保存
        $item->save();

        // 更新後のリダイレクト
        return redirect()->route('items.index', $item)->with('success', 'アイテムが更新されました。');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        
        return redirect()->route('items.index');
    }
}
