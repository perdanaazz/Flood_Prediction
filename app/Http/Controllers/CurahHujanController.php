<?php

namespace App\Http\Controllers;

use App\Models\CurahHujan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CurahHujanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $curah_hujan = CurahHujan::with('kota')->latest();

            return DataTables::of($curah_hujan)
                ->addIndexColumn()
                ->addColumn('lokasi', function ($row) {
                    return $row->kota->nama_provinsi . ' - ' . $row->kota->nama_kota_kabupaten;
                })
                ->addColumn('situasi', function ($row) {
                    return $row->situasi->situasi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.curah-hujan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-curah-hujan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
