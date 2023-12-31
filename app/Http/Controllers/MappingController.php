<?php

namespace App\Http\Controllers;

use App\Models\CurahHujan;
use Illuminate\Http\Request;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function getData(Request $request)
    {
        $data = CurahHujan::with(['kota'])->get();

        if ($request->search || $request->year) {
            $data = CurahHujan::with(['kota'])
                ->where('tahun', $request->year)
                ->whereHas('kota', function ($query) use ($request) {
                    $query
                        ->where('nama_kecamatan', $request->search)
                        ->orWhere('nama_kota_kabupaten', $request->search)
                        ->orWhere('nama_provinsi');
                })
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
