@extends('layouts.layoutMasterAdmin')

@section('title')
    Curah Hujan
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1>Tambah Data</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('curah-hujan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_sungai" class="form-label">Nama Sungai <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_sungai" name="nama_sungai"
                                placeholder="Nama Sungai" value="{{ old('nama_sungai') }}">
                            @error('nama_sungai')
                                <div id="nama_sungai_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="longitude" name="longitude"
                                placeholder="Longitude" value="{{ old('longitude') }}">
                            @error('longitude')
                                <div id="longitude_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude"
                                value="{{ old('latitude') }}">
                            @error('latitude')
                                <div id="latitude_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_kecamatan" class="form-label">Nama Kecamatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                                placeholder="Nama Kecamatan" value="{{ old('nama_kecamatan') }}">
                            @error('nama_kecamatan')
                                <div id="nama_kecamatan_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_kota_kabupaten" class="form-label">Nama Kota / Kabupaten <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_kota_kabupaten" name="nama_kota_kabupaten"
                                placeholder="Nama Kota / Kabupaten" value="{{ old('nama_kota_kabupaten') }}">
                            @error('nama_kota_kabupaten')
                                <div id="nama_kota_kabupaten_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_provinsi" class="form-label">Nama Provinsi <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi"
                                placeholder="Nama Provinsi" value="{{ old('nama_provinsi') }}">
                            @error('nama_provinsi')
                                <div id="nama_provinsi_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
