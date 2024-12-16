@extends('Layout.rewardapp')

@section('content')
<div class="container mx-auto py-8 px-4 lg:px-8">
    <!-- Notifikasi -->
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-hulk text-green-700 p-4 mb-6" role="alert">
            <p class="font-bold">Berhasil</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p class="font-bold">Gagal</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Header -->
    <div class="text-center mb-8 mt-10 pt-5">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Daftar Hadiah</h1>
        <p class="text-lg text-gray-600">Kumpulkan poin dan tukarkan dengan hadiah menarik!</p>
    </div>

    <!-- Poin Anda -->
    <div class="flex justify-center items-center bg-gradient-to-r from-hulk to-hulk text-white py-4 px-6 rounded-lg mb-6">
        <h2 class="text-xl font-semibold">Poin Anda: </h2>
        <span class="text-3xl font-bold ml-3">{{ $points }}</span>
    </div>

    <!-- Tabel Hadiah -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse bg-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-hulk text-left text-sm font-medium text-white uppercase tracking-wider">
                            Nama Hadiah
                        </th>
                        <th class="px-6 py-3 bg-hulk text-left text-sm font-medium text-white uppercase tracking-wider">
                            Poin Dibutuhkan
                        </th>
                        <th class="px-6 py-3 bg-hulk text-left text-sm font-medium text-white uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rewards as $reward)
                    <tr class="bg-gray-100 hover:bg-gray-200 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $reward->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $reward->points_required }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form method="POST" action="{{ route('redeem.reward') }}">
                                @csrf
                                <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 disabled:opacity-50"
                                    {{ $points >= $reward->points_required ? '' : 'disabled' }}>
                                    Tukar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($rewards->isEmpty())
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            Belum ada hadiah yang tersedia.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
