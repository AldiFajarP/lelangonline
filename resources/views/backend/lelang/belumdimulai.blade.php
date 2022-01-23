@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff; height:60px;">
                <h3 style="color:white;" class="unselect">Lelang Belum Dimulai</h3>
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
                    </div>
            </div>            
        </div>    
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color:#0077ff; padding: 0.1% 0.1% 0.1% 0.1%;">
                <h5 align="center" style="color:white;" class="unselect">Data Lelang</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                    <thead style="background-color:#262626; color:white;">
                        <tr class="unselect">
                            <th>No.</th>
                            <th>Kode Lelang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Mulai</th>
                            <th>Jam Mulai</th>
                            <th>Tanggal Penutupan</th>
                            <th>Jam Penutupan</th>
                            <th>Open Bid</th>
                            <th>Buy It Now</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datalelang as $dl)
                        <tr class="unselect">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $dl->KodeLelang}}</td>
                            <td>{{ $dl->NamaBarang}}</td>
                            <td>{{ $dl->TanggalMulai}}</td>
                            <td>{{ $dl->JamMulai}}</td>
                            <td>{{ $dl->TanggalPenutupan}}</td>
                            <td>{{ $dl->JamPenutupan}}</td>
                            <td>Rp {{number_format($dl->OpenBid)}}.-</td>
                            <td>Rp {{number_format($dl->BuyItNow)}}.-</td>
                            <td>
                                <a href="{{ url('/admin/lelang/detail/'. $dl->KodeLelang)}}" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true" style="color:white;"> Detail</i>
                                </a>
                                <a href="{{ url('/admin/lelang/edit/'. $dl->KodeLelang)}}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pen" aria-hidden="true" style="color:white;"> Edit</i>
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
