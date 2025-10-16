<x-app-layout>
    {{-- 1. HEADER SLOT --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sửa Thông Tin Chuyến Bay') }}: {{ $chuyenBay->ma_chuyen ?? 'N/A' }}
        </h2>
    </x-slot>

    {{-- 2. MAIN CONTENT --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Sửa thông tin chuyến bay</h2>

                <form action="{{ route('chuyen-bay.update', $chuyenBay->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- MÃ CHUYẾN BAY --}}
                    <div class="mb-4">
                        <label for="ma_chuyen" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Mã chuyến bay</label>
                        <x-text-input id="ma_chuyen" type="text" name="ma_chuyen" :value="old('ma_chuyen', $chuyenBay->ma_chuyen)" required autofocus />
                        <x-input-error :messages="$errors->get('ma_chuyen')" class="mt-2" />
                    </div>

                    {{-- SÂN BAY ĐI --}}
                    <div class="mb-4">
                        <label for="san_bay_di" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sân bay đi</label>
                        <x-text-input id="san_bay_di" type="text" name="san_bay_di" :value="old('san_bay_di', $chuyenBay->san_bay_di)" required />
                        <x-input-error :messages="$errors->get('san_bay_di')" class="mt-2" />
                    </div>

                    {{-- SÂN BAY ĐẾN --}}
                    <div class="mb-4">
                        <label for="san_bay_den" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sân bay đến</label>
                        <x-text-input id="san_bay_den" type="text" name="san_bay_den" :value="old('san_bay_den', $chuyenBay->san_bay_den)" required />
                        <x-input-error :messages="$errors->get('san_bay_den')" class="mt-2" />
                    </div>

                    {{-- THỜI GIAN (Sử dụng flex thay cho Bootstrap row/col) --}}
                    <div class="flex flex-wrap -mx-3">
                        {{-- Thời gian khởi hành --}}
                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <label for="thoi_gian_di" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Thời gian khởi hành</label>
                            @php
                                $thoi_gian_di = $chuyenBay->thoi_gian_di ? \Carbon\Carbon::parse($chuyenBay->thoi_gian_di)->format('Y-m-d\TH:i') : '';
                            @endphp
                            <x-text-input id="thoi_gian_di" type="datetime-local" name="thoi_gian_di" :value="old('thoi_gian_di', $thoi_gian_di)" required />
                            <x-input-error :messages="$errors->get('thoi_gian_di')" class="mt-2" />
                        </div>

                        {{-- Thời gian đến --}}
                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <label for="thoi_gian_den" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Thời gian đến (nếu có)</label>
                            @php
                                $thoi_gian_den = $chuyenBay->thoi_gian_den ? \Carbon\Carbon::parse($chuyenBay->thoi_gian_den)->format('Y-m-d\TH:i') : '';
                            @endphp
                            <x-text-input id="thoi_gian_den" type="datetime-local" name="thoi_gian_den" :value="old('thoi_gian_den', $thoi_gian_den)" />
                            <x-input-error :messages="$errors->get('thoi_gian_den')" class="mt-2" />
                        </div>
                    </div>

                    {{-- TỔNG SỐ GHẾ --}}
                    <div class="mb-4">
                        <label for="so_ghe" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tổng số ghế</label>
                        <x-text-input id="so_ghe" type="number" name="so_ghe" :value="old('so_ghe', $chuyenBay->so_ghe)" min="1" required />
                        <x-input-error :messages="$errors->get('so_ghe')" class="mt-2" />
                    </div>

                    {{-- SỐ GHẾ CÒN --}}
                    <div class="mb-4">
                        <label for="so_ghe_con" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Số ghế còn</label>
                        <x-text-input id="so_ghe_con" type="number" name="so_ghe_con" :value="old('so_ghe_con', $chuyenBay->so_ghe_con)" min="0" required />
                        <x-input-error :messages="$errors->get('so_ghe_con')" class="mt-2" />
                    </div>

                    {{-- GIÁ VÉ --}}
                    <div class="mb-6">
                        <label for="gia" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Giá vé (VNĐ)</label>
                        <x-text-input id="gia" type="number" step="0.01" name="gia" :value="old('gia', $chuyenBay->gia)" min="0" required />
                        <x-input-error :messages="$errors->get('gia')" class="mt-2" />
                    </div>

                    {{-- NÚT HÀNH ĐỘNG --}}
                    <div class="flex justify-end space-x-3 mt-6">

                        {{-- Nút Quay lại --}}
                        <a href="{{ route('chuyen-bay.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Quay lại
                        </a>

                        {{-- Nút Cập nhật --}}
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Cập nhật
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
