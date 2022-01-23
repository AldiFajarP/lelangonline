@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center unselect">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                <h3 style="color:white;">Tambah Lelang</h3>
            </div>  
                <form action="{{ route('lelang.store') }}" method="post" enctype="multipart/form-data">
                    @csrf              
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-md-6" align="center">
                        <br/>
                        <div class="form-group">
                            <label>Kode Lelang : </label>
                            <input type="text" readonly required="required" name="KodeLelang" class="form-control form-group--inline   " value="{{$newID}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Kode Barang : </label>
                            <select name="KodeBarang" id="KodeBarang" class="form-control">
                                <option value="0">Pilih Kode Barang</option>
                                @foreach($databarang as $db)
                                <option value="{{$db->KodeBarang}}">{{$db->KodeBarang}} - ({{$db->NamaBarang}})</option>
                                @endforeach
                            </select>                                    
                        </div>  
                        <div class="form-group GambarItem" id="GambarItem" name="GambarItem">

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
                                        <input readonly type="text" name="KodeKlasifikasi" id="KodeKlasifikasi" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="KodeKategori" id="KodeKategori" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="NamaBarang" id="NamaBarang" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="TipeBarang" id="TipeBarang" value="" class="form-control">
                                        <input readonly type="hidden" name="InputGambar" id="InputGambar" value="" class="form-control">
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
                                        <input readonly type="text" name="KapasitasCC" id="KapasitasCC" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="Cyl" id="Cyl" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="ABS" id="ABS" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="KM" id="KM" value="" class="form-control">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="Keterangan" id="Keterangan" value="" class="form-control">
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
                        <div class="input-group date" id="inputDate1">
                        <input type="text" class="form-control" name="TanggalMulai" id="inputDate1">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jam Mulai Lelang : </label>
                        <div class="input-group date" id="inputTime1">
                        <input type="text" class="form-control" name="JamMulai" id="inputTime1">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Penutupan Lelang: </label>
                        <div class="input-group date" id="inputDate2">
                        <input type="text" class="form-control" name="TanggalPenutupan" id="inputDate2">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jam Penutupan Lelang: </label>
                        <div class="input-group date" id="inputTime2">
                        <input type="text" class="form-control" name="JamPenutupan" id="inputTime2">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                </div>                
                <div class="col-md-8">
                    <label>Open Bid & Buy It Now: </label>
                    <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                            <thead style="background-color:#262626; color:white;">
                                <tr>
                                    <th>Open Bid</th>
                                    <th>Buy It Now</th>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    
                                    <td>
                                        <input type="text" name="OpenBid" id="OpenBid" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;      
                                        <input type="text" name="ShowOpenBid" id="ShowOpenBid" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="BuyItNow" id="BuyItNow" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;
                                        <input type="text" name="ShowBuyItNow" id="ShowBuyItNow" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" onclick="setBidBIN()"><i class="fa fa-pen"> Set</i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="Kelipatan1" id="Kelipatan1" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;      
                                        <input type="text" name="ShowKelipatan1" id="ShowKelipatan1" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="Kelipatan2" id="Kelipatan2" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;
                                        <input type="text" name="ShowKelipatan2" id="ShowKelipatan2" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="Kelipatan3" id="Kelipatan3" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;      
                                        <input type="text" name="ShowKelipatan3" id="ShowKelipatan3" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="Kelipatan4" id="Kelipatan4" value="" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">&nbsp;
                                        <input type="text" name="ShowKelipatan4" id="ShowKelipatan4" value="" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" onclick="setKelipatan()"><i class="fa fa-pen"> Set</i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            <br/><br/><br/>
            <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/admin/master/klasifikasi" class="btn btn-danger">Batal</a>
            </div>
                <br/>         
            </form>
        </div>   
    </div>
</div>

@push('scripts')
<script>
    $('#inputDate1').datetimepicker({
        defaultDate: new Date(),
        format: 'MMM DD, YYYY'
    });

    $('#inputTime1').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:mm:00'
    });

   $('#inputDate2').datetimepicker({
        defaultDate: new Date(),
        format: 'MMM DD, YYYY'
    });
   $('#inputTime2').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:mm:00'
    });

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

    function setBidBIN()
    {
      var bid =  $("#OpenBid").val();
      var bin =  $("#BuyItNow").val();

      var format_bid = 'Rp' + number_format(bid) + ',-';
      var format_bin = 'Rp' + number_format(bin) + ',-';


      $("#ShowOpenBid").val(format_bid);
      $("#ShowBuyItNow").val(format_bin);      
    }
    </script>
@endpush
@endsection
