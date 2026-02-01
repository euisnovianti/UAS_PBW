<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkot;
use Illuminate\Http\Request;

class AngkotAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->email !== 'admin@gmail.com') {
                return redirect('/'); 
            }
            return $next($request);
        });
    }
    public function index()
    {
        //  urutan data angkot
        $angkots = Angkot::orderBy('no_angkot', 'asc')->get();
        return view('admin.angkot.index', compact('angkots'));
    }

    public function create()
    {
        return view('admin.angkot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_angkot' => 'required',
            'jurusan' => 'required',
            'harga' => 'required|numeric',
            'latitude' => 'required', 
            'longitude' => 'required',
        ]);

        Angkot::create($request->all());

        return redirect()->route('angkots.index')->with('success', 'Data Angkot berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $angkot = Angkot::findOrFail($id);
        return view('admin.angkot.edit', compact('angkot'));
    }

    public function update(Request $request, $id)
    {
        $angkot = Angkot::findOrFail($id);
        
        $request->validate([
            'no_angkot' => 'required',
            'jurusan' => 'required',
            'harga' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $angkot->update($request->all());

        
        return redirect()->route('angkots.index')->with('success', 'Data Angkot berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $angkot = Angkot::findOrFail($id);
        $angkot->delete();

        
        return redirect()->route('angkots.index')->with('success', 'Data Angkot berhasil dihapus!');
    }
}