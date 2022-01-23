@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff; height:60px;">
                <h3 style="color:white;" class="unselect">Barang</h3>
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
                    <a href="{{ url('/admin/databarang/create')}}" class="btn btn-success">
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
                <h5 align="center" style="color:white;" class="unselect">Data Barang</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                    <thead style="background-color:#262626; color:white;">
                        <tr class="unselect">
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tipe Barang</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databarang as $db)
                        <tr class="unselect">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $db->KodeBarang}}</td>
                            <td>{{ $db->NamaBarang}}</td>
                            <td>{{ $db->TipeBarang}}</td>
                            <td>
                                @if($db->Status == 'OPN')
                                <a href="{{ url('/admin/databarang/konfirmasi/'. $db->KodeBarang)}}" class="btn btn-info btn-xs">
                                    <i class="fa fa-check" aria-hidden="true" style="color:white;"> Konfirm</i>
                                </a>
                                <a href="{{ url('/admin/databarang/detail/'. $db->KodeBarang)}}" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true" style="color:white;"> Detail</i>
                                </a>
                                <a href="{{ url('/admin/databarang/edit/'. $db->KodeBarang)}}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pen" aria-hidden="true" style="color:white;"> Ubah</i>
                                </a>
                                <a href="{{ url('/admin/databarang/destroy/'. $db->KodeBarang)}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"> Hapus</i>
                                </a>
                                @elseif($db->Status == 'CFM')
                                <a href="{{ url('/admin/databarang/detail/'. $db->KodeBarang)}}" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true" style="color:white;"> Detail</i>
                                </a>
                                @endif
                                
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
