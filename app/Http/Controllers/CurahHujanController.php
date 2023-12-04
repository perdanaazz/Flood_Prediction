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
            $curah_hujan = CurahHujan::latest();

            return DataTables::of($curah_hujan)
                ->addIndexColumn()
                // ->addColumn('timestamp', function ($row) {
                //     return Carbon::parse($row->created_at)->format('d-m-Y H:i:s');
                // })
                // ->addColumn('dibuat_oleh', function ($row) {
                //     return ucwords($row->user?->name);
                // })
                // ->addColumn('keterangan', function ($row) {
                //     return ucwords($row->keterangan ?? '-');
                // })
                // ->addColumn('aksi', 'aktivitas.aksi')
                // ->rawColumns(['aksi'])
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
