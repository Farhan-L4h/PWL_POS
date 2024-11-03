@extends('layout.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create')}}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover table-sm"
            id="table_kategori">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <!--  -->
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode kategori</th>
                    <th>Nama kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('css')
@endpush
@push('js')
<script>
    $(document).ready(function() {
        var datakategori = $('#table_kategori').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan serverside processing
            ajax: {
                "url": "{{ url('kategori/list') }}",
                "dataType": "json",
                "type": "POST",
            },
            columns: [{
                data: "DT_RowIndex", // nomor urut dari laravel datatableaddIndexColumn()
                className: "text-center",
                orderable: false,
                searchable: false
            }, {
                data: "kategori_kode",
                className: "",
                orderable: true, // orderable: true, jika ingin kolom ini bisadiurutkan
                searchable: true // searchable: true, jika ingin kolom ini bisadicari
            }, {
                data: "kategori_nama",
                className: "",
                orderable: true, // orderable: true, jika ingin kolom ini bisadiurutkan
                searchable: true // searchable: true, jika ingin kolom ini bisadicari
            }, {
                data: "aksi",
                className: "",
                orderable: false, // orderable: true, jika ingin kolom ini bisadiurutkan
                searchable: false // searchable: true, jika ingin kolom ini bisadicari
            }]
        });

    });
</script>
@endpush