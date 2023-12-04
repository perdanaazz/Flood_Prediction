@extends('layouts.layoutMasterAdmin')

@section('title')
    Curah Hujan
@endsection

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row mb-4 d-flex justify-content-end">
        <div class="col-12 text-end">
            <a href="{{ route('curah-hujan.create') }}" class="btn btn-sm btn-primary">
                Tambah Data
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped" id="datasungai_dt">
                <thead class="text-center">
                    <tr class="align-items-center">
                        <th rowspan="2">No</th>
                        <th rowspan="2">Kabupaten / Kota</th>
                        <th colspan="12">Data Curah Hujan</th>
                        <th rowspan="2">Situasi</th>
                    </tr>
                    <tr>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        var table;

        $(document).ready(function() {
            table = $('#datasungai_dt').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
                },
                ajax: {
                    url: "{{ route('curah-hujan.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi',
                        orderable: false,
                        className: 'text-start',
                    },
                    {
                        data: 'jan',
                        name: 'jan',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'feb',
                        name: 'feb',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'mar',
                        name: 'mar',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'apr',
                        name: 'apr',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'mei',
                        name: 'mei',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'jun',
                        name: 'jun',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'jul',
                        name: 'jul',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'ags',
                        name: 'ags',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'sep',
                        name: 'sep',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'okt',
                        name: 'okt',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'nov',
                        name: 'nov',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'des',
                        name: 'des',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'situasi',
                        name: 'situasi',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                ],
                fixedColumns: {
                    left: 1,
                    right: 1
                },
                paging: true,
                scrollX: true
            });
        });
    </script>
@endsection
