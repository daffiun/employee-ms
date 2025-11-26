<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;

class PositionController extends Controller
{
    // Daftar posisi
    public function index()
    {
        $positions = Position::paginate(15);
        return view('admin.positions.index', ['positions' => $positions]);
    }

    // Form tambah posisi
    public function create()
    {
        return view('admin.positions.create');
    }

    // Simpan posisi baru
    public function store(StorePositionRequest $request)
    {
        Position::create($request->validated());
        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil ditambahkan');
    }

    // Form edit posisi
    public function edit(Position $position)
    {
        return view('admin.positions.edit', ['position' => $position]);
    }

    // Update posisi
    public function update(StorePositionRequest $request, Position $position)
    {
        $position->update($request->validated());
        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil diubah');
    }

    // Hapus posisi
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('admin.positions.index')->with('success', 'Posisi berhasil dihapus');
    }
}
