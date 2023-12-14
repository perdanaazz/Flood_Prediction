<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurahHujanRequest;
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
                ->addColumn('aksi', 'admin.dt-aksi')
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
    public function store(CurahHujanRequest $request)
    {
        // Hit Prediction API
        $url = 'http://127.0.0.1:5000/predict';
        $data = [
            // 'Tahun'     => $request->tahun,
            'Januari'   => $request->jan ?? 0,
            'Februari'  => $request->feb ?? 0,
            'Maret'     => $request->mar ?? 0,
            'April'     => $request->apr ?? 0,
            'Mei'       => $request->mei ?? 0,
            'Juni'      => $request->jun ?? 0,
            'Juli'      => $request->jul ?? 0,
            'Agustus'   => $request->ags ?? 0,
            'September' => $request->sep ?? 0,
            'Oktober'   => $request->okt ?? 0,
            'November'  => $request->nov ?? 0,
            'Desember'  => $request->des ?? 0,
            // 'feature13' => $request->annual,
        ];
        $client = new Client();

        $response = $client->post($url, [
            'form_params' => $data,
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Post to Database
        $kota = Kota::create([
            'nama_provinsi'       => $request->nama_provinsi,
            'nama_kota_kabupaten' => $request->nama_kota_kabupaten,
            'nama_kecamatan'      => $request->nama_kecamatan,
            'longitude'           => $request->longitude,
            'latitude'            => $request->latitude,
        ]);

        $curah_hujan = CurahHujan::create([
            'tahun'      => $request->tahun,
            'id_kota'    => $kota->id,
            'id_situasi' => $responseData == 'YES' ? 1 : 2,
            'jan'        => $request->jan,
            'feb'        => $request->feb,
            'mar'        => $request->mar,
            'apr'        => $request->apr,
            'mei'        => $request->mei,
            'jun'        => $request->jun,
            'jul'        => $request->jul,
            'ags'        => $request->ags,
            'sep'        => $request->sep,
            'okt'        => $request->okt,
            'nov'        => $request->nov,
            'des'        => $request->des,
            // 'annual'     => $request->annual,
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
        $data = CurahHujan::find($id);

        return view('admin.edit-curah-hujan', [
            'data' => $data,
            'kota' => Kota::find($data->id_kota)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curah_hujan = CurahHujan::find($id);
        $kota = Kota::find($curah_hujan->id_kota);

        // Hit Prediction API
        $url = 'http://127.0.0.1:5000/predict';
        $data = [
            'Tahun'     => $request->tahun,
            'Januari'   => $request->jan,
            'Februari'  => $request->feb,
            'Maret'     => $request->mar,
            'April'     => $request->apr,
            'Mei'       => $request->mei,
            'Juni'      => $request->jun,
            'Juli'      => $request->jul,
            'Agustus'   => $request->ags,
            'September' => $request->sep,
            'Oktober'   => $request->okt,
            'November'  => $request->nov,
            'Desember'  => $request->des,
            // 'feature13' => $request->annual,
        ];
        $client = new Client();

        $response = $client->post($url, [
            'form_params' => $data,
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Post to Database
        $kota->update([
            'nama_provinsi'       => $request->nama_provinsi,
            'nama_kota_kabupaten' => $request->nama_kota_kabupaten,
            'nama_kecamatan'      => $request->nama_kecamatan,
            'longitude'           => $request->longitude,
            'latitude'            => $request->latitude,
        ]);

        $curah_hujan->update([
            'tahun'      => $request->tahun,
            'id_kota'    => $kota->id,
            'id_situasi' => $responseData == 'Banjir' ? 1 : 2,
            'jan'        => $request->jan,
            'feb'        => $request->feb,
            'mar'        => $request->mar,
            'apr'        => $request->apr,
            'mei'        => $request->mei,
            'jun'        => $request->jun,
            'jul'        => $request->jul,
            'ags'        => $request->ags,
            'sep'        => $request->sep,
            'okt'        => $request->okt,
            'nov'        => $request->nov,
            'des'        => $request->des,
            // 'annual'     => $request->annual,
        ]);

        return redirect()
            ->route('curah-hujan.index')
            ->with([
                'success' => 'Berhasil memperbarui data',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = CurahHujan::find($id);
        $data_kota = Kota::find($data->id_kota);
        $data->delete();
        $data_kota->delete();

        return redirect()
            ->route('curah-hujan.index')
            ->with([
                'success' => 'Berhasil menghapus data',
            ]);
    }
}
