<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản lý Chuyến Bay') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-4 dark:text-gray-100">Danh sách chuyến bay</h1>

                {{-- Nút Thêm Chuyến bay --}}
                <a href="{{ route('chuyen-bay.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mb-6">
                    Thêm chuyến bay
                </a>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Bảng Dữ liệu --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Mã</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Đi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Đến</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Khởi hành</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ghế còn</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Giá</th>
                                <th class="relative px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($chuyenbays as $cb)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $cb->ma_chuyen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $cb->san_bay_di }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $cb->san_bay_den }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $cb->thoi_gian_di }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $cb->so_ghe_con }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ number_format($cb->gia,0,',','.') }} ₫</td>

                                {{-- ********** CODE NÚT HÀNH ĐỘNG ĐÃ ĐƯỢC LÀM ĐẸP ********** --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    {{-- Nút Xem (Indigo/Xanh dương) --}}
                                    <a href="{{ route('chuyen-bay.show', $cb->id) }}"
                                       class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600 font-semibold transition duration-150 ease-in-out">
                                        Xem
                                    </a>

                                    {{-- Nút Sửa (Yellow/Vàng) --}}
                                    <a href="{{ route('chuyen-bay.edit', $cb->id) }}"
                                       class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-600 font-semibold transition duration-150 ease-in-out ml-2">
                                        Sửa
                                    </a>

                                    {{-- Nút Xóa (Red/Đỏ) --}}
                                    <form action="{{ route('chuyen-bay.destroy', $cb->id) }}" method="POST" class="inline ml-2">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600 font-semibold transition duration-150 ease-in-out"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa chuyến bay {{ $cb->ma_chuyen }} không?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                                {{-- ******************************************************* --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Laravel Pagination links --}}
                @if (isset($chuyenbays) && $chuyenbays instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                    <div class="mt-4">
                        {{ $chuyenbays->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
