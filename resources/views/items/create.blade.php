<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('アイテムを追加') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">アイテム名:</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">数量:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="1" required min="1">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">説明</label>
                            <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">画像</label>
                            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        </div>
                        <button type="submit" class="btn btn-primary">追加</button>
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


