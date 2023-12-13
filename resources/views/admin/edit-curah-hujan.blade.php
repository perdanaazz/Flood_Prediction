@extends('layouts.layoutMasterAdmin')

@section('title')
    Curah Hujan
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1>Edit Data</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('curah-hujan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_provinsi" class="form-label">Nama Provinsi <span
                                    class="text-danger">*</span></label>
                            {{-- <select id="selectProvinsi" placeholder="Pilih Provinsi"></select> --}}
                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi"
                                placeholder="Nama Provinsi" value="{{ old('nama_provinsi') ?? $kota->nama_provinsi }}">
                            @error('nama_provinsi')
                                <div id="nama_provinsi_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_kota_kabupaten" class="form-label">Nama Kota / Kabupaten <span
                                    class="text-danger">*</span></label>
                            {{-- <select id="selectCity" placeholder="Pilih Kota / Kabupaten"></select> --}}
                            <input type="text" class="form-control" id="nama_kota_kabupaten" name="nama_kota_kabupaten"
                                placeholder="Nama Kota / Kabupaten" value="{{ old('nama_kota_kabupaten') ?? $kota->nama_kota_kabupaten }}">
                            @error('nama_kota_kabupaten')
                                <div id="nama_kota_kabupaten_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="nama_kecamatan" class="form-label">Nama Kecamatan <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                                placeholder="Nama Kecamatan" value="{{ old('nama_kecamatan') ?? $kota->nama_kecamatan }}">
                            @error('nama_kecamatan')
                                <div id="nama_kecamatan_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="longitude" name="longitude"
                                placeholder="Longitude" value="{{ old('longitude') ?? $kota->longitude }}">
                            @error('longitude')
                                <div id="longitude_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude"
                                value="{{ old('latitude') ?? $kota->latitude }}">
                            @error('latitude')
                                <div id="latitude_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h4 class="mb-3">Data Curah Hujan</h4>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun"
                                value="{{ old('tahun') ?? $data->tahun }}">
                            @error('tahun')
                                <div id="tahun_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="jan" class="form-label">Januari <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jan" name="jan"
                                placeholder="Januari" value="{{ old('jan') ?? $data->jan }}">
                            @error('jan')
                                <div id="jan_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="feb" class="form-label">Februari <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="feb" name="feb"
                                placeholder="Februari" value="{{ old('feb') ?? $data->feb }}">
                            @error('feb')
                                <div id="feb_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="mar" class="form-label">Maret <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mar" name="mar"
                                placeholder="Maret" value="{{ old('mar') ?? $data->mar }}">
                            @error('mar')
                                <div id="mar_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="apr" class="form-label">April <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="apr" name="apr"
                                placeholder="April" value="{{ old('apr') ?? $data->apr }}">
                            @error('apr')
                                <div id="apr_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="mei" class="form-label">Mei <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mei" name="mei" placeholder="Mei"
                                value="{{ old('mei') ?? $data->mei }}">
                            @error('mei')
                                <div id="mei_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="jun" class="form-label">Juni <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jun" name="jun" placeholder="Juni"
                                value="{{ old('jun') ?? $data->jun }}">
                            @error('jun')
                                <div id="jun_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="jul" class="form-label">Juli <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jul" name="jul" placeholder="Juli"
                                value="{{ old('jul') ?? $data->jul }}">
                            @error('jul')
                                <div id="jul_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="ags" class="form-label">Agustus <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ags" name="ags"
                                placeholder="Agustus" value="{{ old('ags') ?? $data->ags }}">
                            @error('ags')
                                <div id="ags_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="sep" class="form-label">September <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sep" name="sep"
                                placeholder="September" value="{{ old('sep') ?? $data->sep }}">
                            @error('sep')
                                <div id="sep_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="okt" class="form-label">Oktober <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="okt" name="okt"
                                placeholder="Oktober" value="{{ old('okt') ?? $data->okt }}">
                            @error('okt')
                                <div id="okt_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="nov" class="form-label">November <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nov" name="nov"
                                placeholder="November" value="{{ old('nov') ?? $data->nov }}">
                            @error('nov')
                                <div id="nov_error" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-2">
                        <div class="mb-3">
                            <label for="des" class="form-label">Desember <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="des" name="des"
                                placeholder="Desember" value="{{ old('des') ?? $data->des }}">
                            @error('des')
                                <div id="des_error" class="form-text text-danger">{{ $message }}</div>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Soon API Provinsi
    </script>
@endsection
