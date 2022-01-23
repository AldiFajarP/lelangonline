@extends('backend.index')
@section('content')

<br></br>
<div class="row justify-content-center">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                @foreach($databarang as $db)
                <h3 style="color:white;" class="unselect">Edit Barang {{$db->KodeBarang}} ({{$db->NamaBarang}})</h3>
                @endforeach
            </div>  
                <form action="{{ route('databarang.update') }}" method="post" enctype="multipart/form-data">
                    @csrf              
                    <div class="x_panel">
                        <div class="x_content">
                            <br/>
                            <div class="col-md-6" align="center">
                                @foreach($databarang as $db)
                                <div class="form-group">
                                    <label class="unselect">Kode Barang : </label>
                                    <input type="text" readonly name="KodeBarang" class="form-control form-group" value="{{$db->KodeBarang}}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="unselect">Klasifikasi : </label>
                                    <select name="KodeKlasifikasi" id="KodeKlasifikasi" class="form-control">
                                        <option value="{{$db->KodeKlasifikasi}}">{{$db->NamaKlasifikasi}}</option>
                                        <option value="0">Pilih Klasifikasi</option>
                                        @foreach($klasifikasi as $mk)
                                        <option value="{{$mk->KodeKlasifikasi}}">{{$mk->NamaKlasifikasi}}</option>
                                        @endforeach
                                    </select>                                                      
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Kategori : </label>
                                    <select name="KodeKategori" id="KodeKategori" class="form-control">
                                        <option value="{{$db->KodeKategori}}">{{$db->NamaKategori}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Nama Barang : </label>
                                    <input type="text" name="NamaBarang" class="form-control form-group" value="{{$db->NamaBarang}}">
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Tipe Motor : </label>
                                    <select name="TipeBarang" id="TipeBarang" class="form-control">
                                        <option value="{{$db->TipeBarang}}">{{$db->TipeBarang}}</option>
                                        <option value="">Pilih Tipe</option>
                                        <option value="Matic">Matic</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Super Sport">Super Sport</option>
                                        <option value="Naked">Naked</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Adventure">Adventure</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="unselect">Gambar Item:</label><br/>
                                    <input type="file" name="file" id="file" multiple>
                                    <div class="row mb-4">

                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="BuktiGambar">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                        <!-- <div style="border:1px solid grey;border-style:dashed;max-width:100px;max-height:100px;min-width:100px;min-height:100px" class=" rounded-lg text-center p-3"> -->
                            <img style="object-fit:contain;"
                            src="{{ asset('/data_barang/'.$db->GambarItem)}}" class="img-fluid" id="preview" />
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>                            

                    <div class="col-md-6" align="center">

                                <div class="form-group">
                                    <label class="unselect">Kapasitas CC : </label>
                                    <input type="text"  name="KapasitasCC" class="form-control" value="{{$db->KapasitasCC}}" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">                                    
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Jumlah Silinder : </label>
                                    <select name="Cylinder" id="Cylinder" class="form-control">
                                        <option value="{{$db->Cylinder}}">{{$db->Cylinder}} Cyl</option>
                                        <option value="0">Pilih Klasifikasi</option>
                                        <option value="1">1 Cyl</option>
                                        <option value="2">2 Cyl</option>
                                        <option value="3">3 Cyl</option>
                                        <option value="4">4 Cyl</option>
                                        <option value="5">5 Cyl</option>
                                        <option value="6">6 Cyl</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label class="unselect">ABS : </label>
                                    @if($db->ABS == '1')
                                    <select name="ABS" id="ABS" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Pilih Klasifikasi</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select> 
                                    @elseif($db->ABS == '0')
                                    <select name="ABS" id="ABS" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Pilih Klasifikasi</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select> 
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="unselect">Jarak Tempuh (KM) : </label>
                                    <input type="text" name="KM" class="form-control" value="{{$db->KM}}" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">                                    
                                </div>
                                <div class="form-group">
                                    <label class="unselect">Keterangan : </label>
                                    <input type="text" name="Keterangan" class="form-control" value="{{$db->Keterangan}}">                                    
                                </div>
                                <br/><br/>
                            </div>  
                            @endforeach
                    <div style="text-align:center;">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/admin/databarang" class="btn btn-danger">Kembali</a>
                        </div>
                        <br/>
                </form>         
        </div>    
    </div>
</div>

@push('scripts')
<script>
$('select[name="KodeKlasifikasi"]').on('change', function(){
    var id = $('select[name="KodeKlasifikasi"]').val();
    var urlget = '/admin/databarang/searchKAT/' + id;

    $.get(urlget, function(data, value){
        console.log(value);
        $('select[name="KodeKategori"]').empty();
        if(value == 'success') {
                $('select[name="KodeKategori"').append('<option value=""> Pilih Kode Kategori</option>');
            $.each(data, function(i, dt){
            $('select[name="KodeKategori').append('<option value="'+ dt.KodeKategori +'">' + dt.NamaKategori +'</option>');
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
        });

        function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    } 
    </script>
@endpush
@endsection
