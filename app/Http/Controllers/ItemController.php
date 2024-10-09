<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $foodItems = Item::where('user_id', $userId)->where('category', 'Food')->paginate(5);
        $clothesItems = Item::where('user_id', $userId)->where('category', 'Clothes')->paginate(5);
        $householdItems = Item::where('user_id', $userId)->where('category', 'Household Items')->paginate(5);
        $healthItems = Item::where('user_id', $userId)->where('category', 'Health & Beauty')->paginate(5);
        $electronicsItems = Item::where('user_id', $userId)->where('category', 'Electronics')->paginate(5);
        $entertainmentItems = Item::where('user_id', $userId)->where('category', 'Entertainment')->paginate(5);

        return view('items.index', compact('foodItems', 'clothesItems', 'householdItems', 'healthItems', 'electronicsItems', 'entertainmentItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $item = Item::findOrFail($id); // IDに基づいてアイテムを取得
        return view('items.show', compact('item')); // アイテム詳細のビューを表示
    }

     
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
            'category' => 'required|string|max:100', // カテゴリーは必須
            'quantity' => 'required|integer|min:1', // 数量は必須で、整数かつ1以上
            'description' => 'nullable|string|max:500', // 説明は任意で、文字列かつ500文字以内
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // 画像は任意で、形式はjpg, jpeg, png, gif、サイズは2MB以内
        ]);

        // 新しいアイテムを作成
        $item = new Item();
        $item->name = $request->input('name');
        $item->category = $request->input('category'); // カテゴリーを追加
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description'); // 説明を追加
        $item->user_id = auth()->id(); // 現在ログインしているユーザーのIDを設定

        // 画像のアップロード処理
        if ($request->hasFile('image')) {
            // 画像を保存し、そのパスをアイテムに設定
            $path = $request->file('image')->store('images', 'public');
            $item->image = $path; // アイテムに画像のパスを追加
        }

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
            'category' => 'required|string|max:100', // カテゴリーは必須
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500', // 説明は任意で、文字列かつ500文字以内
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // 画像は任意で、形式はjpg, jpeg, png, gif、サイズは2MB以内
        ]);

        // アイテムのデータを更新
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->description = $request->description;
        $item->category = $request->input('category'); // カテゴリーを更新

        // 画像のアップロード処理
        if ($request->hasFile('image')) {
            // 既存の画像がある場合は削除する処理（必要に応じて）
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            // 画像を保存し、そのパスをアイテムに設定
            $path = $request->file('image')->store('images', 'public');
            $item->image = $path; // アイテムに新しい画像のパスを追加
        }

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
