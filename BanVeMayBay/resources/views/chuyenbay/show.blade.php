<x-app-layout>
    {{-- 1. HEADER SLOT --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chi Tiết Chuyến Bay') }}: {{ $chuyenBay->ma_chuyen ?? 'N/A' }}
        </h2>
    </x-slot>

    {{-- 2. MAIN CONTENT --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Chi tiết chuyến bay</h2>

                {{-- Bảng chi tiết (Sử dụng CSS lưới/mô tả thay vì table-bordered truyền thống) --}}
                <div class="divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 rounded-lg">

                    {{-- Mã chuyến bay --}}
                    <div class="flex px-4 py-3 bg-gray-50 dark:bg-gray-700">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Mã chuyến bay</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">{{ $chuyenBay->ma_chuyen }}</div>
                    </div>

                    {{-- Sân bay đi --}}
                    <div class="flex px-4 py-3 bg-white dark:bg-gray-800">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Sân bay đi</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">{{ $chuyenBay->san_bay_di }}</div>
                    </div>

                    {{-- Sân bay đến --}}
                    <div class="flex px-4 py-3 bg-gray-50 dark:bg-gray-700">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Sân bay đến</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">{{ $chuyenBay->san_bay_den }}</div>
                    </div>

                    {{-- Thời gian đi --}}
                    <div class="flex px-4 py-3 bg-white dark:bg-gray-800">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Thời gian đi</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">
                            {{ \Carbon\Carbon::parse($chuyenBay->thoi_gian_di)->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    {{-- Thời gian đến --}}
                    <div class="flex px-4 py-3 bg-gray-50 dark:bg-gray-700">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Thời gian đến</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">
                            @if($chuyenBay->thoi_gian_den)
                                {{ \Carbon\Carbon::parse($chuyenBay->thoi_gian_den)->format('d/m/Y H:i') }}
                            @else
                                <em>Chưa cập nhật</em>
                            @endif
                        </div>
                    </div>

                    {{-- Giá vé --}}
                    <div class="flex px-4 py-3 bg-white dark:bg-gray-800">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Giá vé</div>
                        <div class="w-2/3 text-sm font-bold text-green-600 dark:text-green-400">
                            {{ number_format($chuyenBay->gia, 0, ',', '.') }} ₫
                        </div>
                    </div>

                    {{-- Tổng số ghế --}}
                    <div class="flex px-4 py-3 bg-gray-50 dark:bg-gray-700">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Tổng số ghế</div>
                        <div class="w-2/3 text-sm text-gray-900 dark:text-gray-100">{{ $chuyenBay->so_ghe }}</div>
                    </div>

                    {{-- Số ghế còn --}}
                    <div class="flex px-4 py-3 bg-white dark:bg-gray-800">
                        <div class="w-1/3 text-sm font-medium text-gray-500 dark:text-gray-300">Số ghế còn</div>
                        <div class="w-2/3 text-sm font-bold text-indigo-600 dark:text-indigo-400">{{ $chuyenBay->so_ghe_con }}</div>
                    </div>
                </div>

                {{-- NÚT HÀNH ĐỘNG --}}
                <div class="flex justify-end space-x-3 mt-6">
                    {{-- Nút Sửa (Warning/Vàng) --}}
                    <a href="{{ route('chuyen-bay.edit', $chuyenBay->id) }}"
                       class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Sửa
                    </a>

                    {{-- Nút Quay lại (Secondary/Xám) --}}
                    <a href="{{ route('chuyen-bay.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Quay lại danh sách
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
