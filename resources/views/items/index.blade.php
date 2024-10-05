<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('アイテム一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($items as $item)
                        <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-800 dark:text-gray-300">
                                <a href="{{ route('items.show', $item) }}" class="text-blue-500 hover:text-blue-700">
                                    アイテム名: {{ $item->name }}
                                </a>
                            </p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">数量: {{ $item->quantity }}</p>
                            <div class="mt-2">
                                <a href="{{ route('items.edit', $item) }}" class="text-blue-500 hover:text-blue-700">編集</a>
                                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
