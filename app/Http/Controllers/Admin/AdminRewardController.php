<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;

class AdminRewardController extends Controller
{
    public function index()
    {
        // Menggunakan pagination untuk mengambil data rewards
        $rewards = Reward::paginate(10); // Ambil 10 data per halaman
        return view('Admin.reward.index', compact('rewards'));
    }

    public function create()
    {
        // Perbaikan: Pastikan menggunakan huruf kecil pada folder view
        return view('admin.reward.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points_required' => 'required|integer|min:0',
        ]);

        Reward::create($request->all());
        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        // Perbaikan: Pastikan menggunakan huruf kecil pada folder view
        return view('admin.reward.edit', compact('reward'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points_required' => 'required|integer|min:0',
        ]);

        $reward = Reward::findOrFail($id);
        $reward->update($request->all());
        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dihapus.');
    }
}