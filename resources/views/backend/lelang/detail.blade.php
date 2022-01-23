@extends('backend.index')
@section('content')
<br></br>
@foreach($datalelang as $dl)
<div class="row justify-content-center unselect">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                <h3 style="color:white;">Detail Data Lelang {{$dl->KodeLelang}}</h3>
            </div>  
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-md-6" align="center">
                        <br/>
                        <div class="form-group">
                            <label>Kode Barang : </label>
                            <input type="text" readonly required="required" name="KodeBarang" class="form-control form-group--inline" value="{{$dl->KodeLelang}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Kode Barang : </label>

                            <input type="text" class="form-control" value="{{$dl->KodeBarang}}" readonly>                                   
                        </div>  
                        <div class="form-group GambarItem" id="GambarItem" name="GambarItem">
                            <img src="{{ asset('data_barang/'.$dl->GambarItem) }}" style="width:200px;height:150px;" class="ViewGambar">
                        </div>
                    </div>
                    <br/><br/>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                            <thead style="background-color:#262626; color:white;">
                                <tr>
                                    <th>Klasifikasi</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Tipe Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input readonly type="text" name="KodeKlasifikasi" id="KodeKlasifikasi" value="{{$dl->NamaKlasifikasi}}" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="KodeKategori" id="KodeKategori" value="{{$dl->NamaKategori}}" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="NamaBarang" id="NamaBarang" value="{{$dl->NamaBarang}}" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="TipeBarang" id="TipeBarang" value="{{$dl->TipeBarang}}" class="form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/><br/><br/>
                        <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                            <thead style="background-color:#262626; color:white;">
                                <tr>
                                    <th>Kapasitas CC</th>
                                    <th>Jumlah Silinder</th>
                                    <th>Tipe ABS</th>
                                    <th>Kilometer</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input readonly type="text" name="KapasitasCC" id="KapasitasCC" value="{{$dl->KapasitasCC}}" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="Cyl" id="Cyl" value="{{$dl->Cylinder}} Cyl" class="form-control">
                                    </td>
                                    <td>
                                        @if($dl->ABS == '1')
                                        <input readonly type="text" name="ABS" id="ABS" value="Ya" class="form-control">
                                        @elseif($dl->ABS == '0')
                                        <input readonly type="text" name="ABS" id="ABS" value="Tidak" class="form-control">
                                        @endif
                                    </td>
                                    <td>
                                        <input readonly type="text" name="KM" id="KM" value="{{number_format($dl->KM)}}" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="Keterangan" id="Keterangan" value="{{$dl->Keterangan}}" class="form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                </div>                
            </div>
            <div class="col-md-12">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Mulai Lelang : </label>
                        <input type="text" readonly required="required" name="TanggalMulai" class="form-control form-group--inline" value="{{$dl->TanggalMulai}}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Penutupan Lelang: </label>
                        <input type="text" readonly required="required" name="TanggalPenutupan" class="form-control form-group--inline" value="{{$dl->TanggalPenutupan}}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Open Bid (OB): </label>
                        <input type="text" readonly required="required" name="OpenBid" class="form-control form-group--inline" value="Rp {{number_format($dl->OpenBid)}}.-">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Buy It Now (BIN): </label>
                        <input type="text" readonly required="required" name="BuyItNow" class="form-control form-group--inline" value="Rp {{number_format($dl->BuyItNow)}}.-">


                    </div>
                </div>
                <div class="col-md-8">
                    <label>Kelipatan Bid: </label>
                    <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                            <thead style="background-color:#262626; color:white;">
                                <tr>
                                    <th>Kelipatan 1</th>
                                    <th>Kelipatan 2</th>
                                    <th>Kelipatan 3</th>
                                    <th>Kelipatan 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="ShowKelipatan1" id="ShowKelipatan1" value="Rp {{number_format($dl->Kelipatan1)}}.-" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="ShowKelipatan2" id="ShowKelipatan2" value="Rp {{number_format($dl->Kelipatan2)}}.-" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="ShowKelipatan3" id="ShowKelipatan3" value="Rp {{number_format($dl->Kelipatan3)}}.-" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="ShowKelipatan4" id="ShowKelipatan4" value="Rp {{number_format($dl->Kelipatan4)}}.-" class="form-control" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            <br/><br/><br/>
            <div style="text-align:center;">
                <a onclick="goBack()" class="btn btn-danger">Kembali</a>
            </div>
                <br/>         
        </div>   
    </div>
</div>
@endforeach
@push('scripts')
<script>

$('select[name="KodeBarang"]').on('change', function(){
    var id = $('select[name="KodeBarang"]').val();
    var urlget = '/admin/lelang/searchDATA/' + id;

    $.get(urlget, function(data, value){
        console.log(value);
        $('#GambarItem').empty();
        if(value == 'success') {

            $.each(data, function(i, dt){

                $("#KodeKlasifikasi").val(dt.NamaKlasifikasi);
                $("#KodeKategori").val(dt.NamaKategori);
                $("#NamaBarang").val(dt.NamaBarang);
                $("#TipeBarang").val(dt.TipeBarang);
                $("#InputGambar").val(dt.GambarItem);
                $("#KapasitasCC").val(dt.KapasitasCC);
                $("#Cyl").val(dt.Cylinder+" Cyl");

                if(dt.ABS == '1') {
                    $("#ABS").val('Ya');    
                } else if(dt.ABS == '0') {
                    $("#ABS").val('Tidak');   
                }

                $("#KM").val(dt.KM);
                $("#Keterangan").val(dt.Keterangan);




                $(document).ready(function(){

                var gi = $("#InputGambar").val();
                var asset = "/data_barang/"+gi;

                $('#GambarItem').append('<img src="'+asset+'" style="width:200px;height:150px;" class="ViewGambar">');
                });
            });
        }
            if($.isEmptyObject(data)) {

        }
    });
});

        $(document).ready(function(){
            // input plugin

            // get file and preview image
            $("#file").on('change',function(){
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            })  
        })

        function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }   
    function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        var n = !isFinite(+number) ? 0 : +number
        var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        var sep = (typeof thousandsSep === 'undefined') ? '.' : thousandsSep
        var dec = (typeof decPoint === 'undefined') ? ',' : decPoint
        var s = ''

        var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
        }

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }

        return s.join(dec)
    }

    function setKelipatan()
    {
      var k1 =  $("#Kelipatan1").val();
      var k2 =  $("#Kelipatan2").val();
      var k3 =  $("#Kelipatan3").val();
      var k4 =  $("#Kelipatan4").val();

      var format_1 = 'Rp' + number_format(k1) + ',-';
      var format_2 = 'Rp' + number_format(k2) + ',-';
      var format_3 = 'Rp' + number_format(k3) + ',-';
      var format_4 = 'Rp' + number_format(k4) + ',-';

      $("#ShowKelipatan1").val(format_1);
      $("#ShowKelipatan2").val(format_2);
      $("#ShowKelipatan3").val(format_3);
      $("#ShowKelipatan4").val(format_4);

    }

    function goBack() {
  window.history.back();
}
    </script>
@endpush
@endsection
