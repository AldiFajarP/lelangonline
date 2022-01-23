@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff; height:60px;">
                <h3 style="color:white;">Kategori</h3>
            </div>  
            <div class="card-title" style="background-color:white;">
                @if(session()->get('created'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('created') }}
                    </div>

                    @elseif(session()->get('edited'))
                    <div class="alert alert-info alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>

                    @elseif(session()->get('deleted'))
                    <div class="alert alert-danger alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">   </button>
                        {{ session()->get('deleted') }}
                    </div>
                    @endif
                    <div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">
                    <a href="{{ url('/admin/master/kategori/create')}}" class="btn btn-success">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </a>
                    </div>
            </div>            
        </div>    
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color:#0077ff; padding: 0.1% 0.1% 0.1% 0.1%;">
                <h5 align="center" style="color:white;">Data Kategori</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                    <thead style="background-color:#262626; color:white;">
                        <tr>
                            <th>No.</th>
                            <th style="width:20%;">Klasifikasi</th>
                            <th style="width:20%;">Kode Kategori</th>
                            <th style="width:40%;">Nama Kategori</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masterkategori as $mk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $mk->NamaKlasifikasi}}</td>
                            <td>{{ $mk->KodeKategori}}</td>
                            <td>{{ $mk->NamaKategori}}</td>
                            <td>
                                <a href="{{ url('/admin/master/kategori/edit/'. $mk->KodeKategori)}}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pen" aria-hidden="true" style="color:white;"> Ubah</i>
                                </a>
                                <a href="{{ url('/admin/master/kategori/destroy/'. $mk->KodeKategori)}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"> Hapus</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
        $(document).ready(function() {

    $('#table1').DataTable({
        "order": [],
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true 
});


});
</script>
@endpush
@endsection
