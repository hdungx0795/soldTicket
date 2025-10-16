<x-app-layout>
    {{-- 1. HEADER SLOT --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Thêm Chuyến Bay Mới') }}
        </h2>
    </x-slot>

    {{-- 2. MAIN CONTENT --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Thêm chuyến bay mới</h2>

                <form action="{{ route('chuyen-bay.store') }}" method="POST">
                    @csrf

                    {{-- MÃ CHUYẾN BAY --}}
                    <div class="mb-4">
                        <label for="ma_chuyen" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Mã chuyến bay</label>
                        <x-text-input id="ma_chuyen" type="text" name="ma_chuyen" :value="old('ma_chuyen')" required autofocus />
                        <x-input-error :messages="$errors->get('ma_chuyen')" class="mt-2" />
                    </div>

                    {{-- SÂN BAY ĐI --}}
                    <div class="mb-4">
                        <label for="san_bay_di" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sân bay đi</label>
                        <x-text-input id="san_bay_di" type="text" name="san_bay_di" :value="old('san_bay_di')" required />
                        <x-input-error :messages="$errors->get('san_bay_di')" class="mt-2" />
                    </div>

                    {{-- SÂN BAY ĐẾN --}}
                    <div class="mb-4">
                        <label for="san_bay_den" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sân bay đến</label>
                        <x-text-input id="san_bay_den" type="text" name="san_bay_den" :value="old('san_bay_den')" required />
                        <x-input-error :messages="$errors->get('san_bay_den')" class="mt-2" />
                    </div>

                    {{-- THỜI GIAN ĐI --}}
                    <div class="mb-4">
                        <label for="thoi_gian_di" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Thời gian đi</label>
                        <x-text-input id="thoi_gian_di" type="datetime-local" name="thoi_gian_di" :value="old('thoi_gian_di')" required />
                        <x-input-error :messages="$errors->get('thoi_gian_di')" class="mt-2" />
                    </div>

                    {{-- THỜI GIAN ĐẾN --}}
                    <div class="mb-4">
                        <label for="thoi_gian_den" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Thời gian đến</label>
                        <x-text-input id="thoi_gian_den" type="datetime-local" name="thoi_gian_den" :value="old('thoi_gian_den')" />
                        <x-input-error :messages="$errors->get('thoi_gian_den')" class="mt-2" />
                    </div>

                    {{-- SỐ GHẾ --}}
                    <div class="mb-4">
                        <label for="so_ghe" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Số ghế</label>
                        <x-text-input id="so_ghe" type="number" name="so_ghe" :value="old('so_ghe', 150)" min="1" required />
                        <x-input-error :messages="$errors->get('so_ghe')" class="mt-2" />
                    </div>

                    {{-- GIÁ VÉ (ĐÃ SỬA MB-6 -> MB-4) --}}
                    <div class="mb-4">
                        <label for="gia" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Giá vé (VNĐ)</label>
                        <x-text-input id="gia" type="number" name="gia" :value="old('gia')" min="0" required />
                        <x-input-error :messages="$errors->get('gia')" class="mt-2" />
                    </div>

                    {{-- NÚT HÀNH ĐỘNG (ĐÃ THÊM MT-6) --}}
                    <div class="flex items-center justify-end space-x-3 mt-6">

                        {{-- Nút Quay lại --}}
                        <a href="{{ route('chuyen-bay.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Quay lại
                        </a>

                        {{-- Nút Thêm chuyến bay --}}
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Thêm chuyến bay
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
