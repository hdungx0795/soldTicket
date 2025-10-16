<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chi tiết Khách Hàng') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl p-8">
                <h1 class="text-2xl font-bold mb-6 dark:text-gray-100">Thông tin khách hàng</h1>

                <div class="space-y-4">
                    <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                        <span class="text-gray-600 dark:text-gray-300 font-medium">Họ tên:</span>
                        <span class="text-gray-900 dark:text-gray-100">{{ $khachHang->ho_ten }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                        <span class="text-gray-600 dark:text-gray-300 font-medium">Email:</span>
                        <span class="text-gray-900 dark:text-gray-100">{{ $khachHang->email }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-2">
                        <span class="text-gray-600 dark:text-gray-300 font-medium">Số điện thoại:</span>
                        <span class="text-gray-900 dark:text-gray-100">{{ $khachHang->so_dt ?? '-' }}</span>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('khach-hang.edit', $khachHang->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Sửa</a>
                    <a href="{{ route('khach-hang.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
