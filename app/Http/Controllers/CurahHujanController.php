<?php

namespace App\Http\Controllers;

use App\Models\CurahHujan;
use App\Models\Kota;
use GuzzleHttp\Client;
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
        // Hit Prediction API
        $url = 'http://127.0.0.1:5000/predict';
        $data = [
            'feature1' => $request->jan,
            'feature2' => $request->feb,
            'feature3' => $request->mar,
            'feature4' => $request->apr,
            'feature5' => $request->mei,
            'feature6' => $request->jun,
            'feature7' => $request->jul,
            'feature8' => $request->ags,
            'feature9' => $request->sep,
            'feature10' => $request->okt,
            'feature11' => $request->nov,
            'feature12' => $request->des,
        ];
        $client = new Client();

        $response = $client->post($url, [
            'form_params' => $data,
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Post to Database
        $kota = Kota::create([
            'nama_provinsi' => $request->nama_provinsi,
            'nama_kota_kabupaten' => $request->nama_kota_kabupaten,
            'nama_kecamatan' => $request->nama_kecamatan,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        $curah_hujan = CurahHujan::create([
            'tahun' => 2023,
            'id_kota' => $kota->id,
            'id_situasi' => $responseData == 'YES' ? 1 : 2,
            'jan' => $request->jan,
            'feb' => $request->feb,
            'mar' => $request->mar,
            'apr' => $request->apr,
            'mei' => $request->mei,
            'jun' => $request->jun,
            'jul' => $request->jul,
            'ags' => $request->ags,
            'sep' => $request->sep,
            'okt' => $request->okt,
            'nov' => $request->nov,
            'des' => $request->des,
        ]);

        return redirect()
            ->route('curah-hujan.index')
            ->with([
                'success' => 'Berhasil menambahkan data',
            ]);
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
