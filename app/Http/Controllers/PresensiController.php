<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presensi = Presensi::all();
        $i=0;
        return view('admin.presensi.index', [
            'title' => 'Presensi',
            'user' => Auth::user(),
            'presensi' => $presensi,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.presensi.create', [
            'title' => 'Tambah Presensi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required',
            'note' => 'required',
            'end_time' => 'required|after:now',
        ]);

        // dd($validated);

        Presensi::create($validated);

        return redirect('/dashboard/presensi/')->with('success', 'Berhasil menambahkan presensi!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.presensi.edit', [
            'title' => 'Edit Presensi',
            'presensi' => Presensi::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresensiRequest  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'note' => 'required',
            'end_time' => 'required|after:now',
        ]);

        Presensi::find($id)->update($validated);

        return redirect('/dashboard/presensi/')->with('success', 'Berhasil mengedit presensi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Presensi::find($id)->delete();
        return redirect('/dashboard/presensi/')->with('success', 'Berhasil menghapus presensi!');
    }

    public function toggle(Request $request)
    {
        // dd($request->id, $request->status);
        Presensi::find($request->id)->update(['is_active' => !$request->status]);

        return redirect('/dashboard/presensi/')
        ->with('success', "Berhasil mengubah status presensi!");

    }
}
