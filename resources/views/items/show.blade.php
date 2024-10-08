<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('アイテム詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('items.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">一覧に戻る</a>
                    <p class="text-gray-800 dark:text-gray-300 text-lg">アイテム名: {{ $item->name }}</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">数量: {{ $item->quantity }}</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">説明: {{ $item->description }}</p> <!-- 説明を追加 -->
                    <!-- 画像を表示 -->
                    @if($item->image)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}の画像" class="rounded-lg shadow-lg">
                        </div>
                    @else
                        <p class="text-gray-500">画像はアップロードされていません。</p>
                    @endif

                    @if (auth()->id() == $item->user_id)
                    <div class="flex mt-4">
                        <a href="{{ route('items.edit', $item) }}" class="text-blue-500 hover:text-blue-700 mr-2">編集</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

