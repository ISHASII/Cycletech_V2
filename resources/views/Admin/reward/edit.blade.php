@extends('Admin.layout.app')

@section('content')
<div class="container mx-auto py-8 px-4 lg:px-8">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Reward</h1>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.rewards.update', $reward->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Reward</label>
                <input type="text" id="name" name="name" value="{{ $reward->name }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="points_required" class="block text-gray-700 font-medium mb-2">Poin Dibutuhkan</label>
                <input type="number" id="points_required" name="points_required" value="{{ $reward->points_required }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500" required min="0">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.rewards.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 mr-2">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-hulk text-white rounded-lg hover:bg-hulk">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
