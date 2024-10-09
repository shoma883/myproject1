<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('カテゴリー別アイテム一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- 食べ物 (Food) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">食べ物</h3>
                    <div class="mb-4">
                        @forelse ($foodItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $foodItems->links() }} <!-- 食べ物カテゴリーのページネーション -->

                    <!-- 衣類 (Clothes) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">衣類</h3>
                    <div class="mb-4">
                        @forelse ($clothesItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $clothesItems->links() }} <!-- 衣類カテゴリーのページネーション -->

                    <!-- 家庭用品 (Household Items) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">家庭用品</h3>
                    <div class="mb-4">
                        @forelse ($householdItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $householdItems->links() }} <!-- 家庭用品カテゴリーのページネーション -->

                    <!-- 健康・美容 (Health & Beauty) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">健康・美容</h3>
                    <div class="mb-4">
                        @forelse ($healthItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $healthItems->links() }} <!-- 健康・美容カテゴリーのページネーション -->

                    <!-- 電化製品 (Electronics) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">電化製品</h3>
                    <div class="mb-4">
                        @forelse ($electronicsItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $electronicsItems->links() }} <!-- 電化製品カテゴリーのページネーション -->

                    <!-- 娯楽 (Entertainment) -->
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-300">その他</h3>
                    <div class="mb-4">
                        @forelse ($entertainmentItems as $item)
                            <div class="mb-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p class="text-gray-900 dark:text-gray-200"> <!-- 色を濃くしました -->
                                    <a href="{{ route('items.show',  ['item' => $item->id])}}" class="text-blue-600 hover:text-blue-800"> <!-- リンクの色を変更 -->
                                        ○ {{ $item->name }} <!-- アイテム名のみ表示 -->
                                    </a>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">カテゴリーにはアイテムがありません。</p>
                        @endforelse
                    </div>
                    {{ $entertainmentItems->links() }} <!-- その他カテゴリーのページネーション -->

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
