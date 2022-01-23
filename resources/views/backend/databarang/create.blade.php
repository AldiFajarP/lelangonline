@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                <h3 style="color:white;">Data Barang</h3>
            </div>  
                <form action="{{ route('databarang.store') }}" method="post" enctype="multipart/form-data">
                    @csrf              
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="col-md-6" align="center">
                                <div class="form-group">
                                    <label>Kode Barang : </label>
                                    <input type="text" readonly required="required" name="KodeBarang" class="form-control form-group--inline   " value="{{$newID}}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Klasifikasi : </label>
                                    <select name="KodeKlasifikasi" id="KodeKlasifikasi" class="form-control">
                                        <option value="0">Pilih Klasifikasi</option>
                                        @foreach($klasifikasi as $mk)
                                        <option value="{{$mk->KodeKlasifikasi}}">{{$mk->NamaKlasifikasi}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>

                                <div class="form-group">
                                    <label>Kategori : </label>
                                    <select name="KodeKategori" id="KodeKategori" class="form-control">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang : </label>
                                    <input type="text" required="required" name="NamaBarang" class="form-control form-group" value="">
                                </div>

                                <div class="form-group">
                                    <label>Tipe Motor : </label>
                                    <select name="TipeBarang" id="TipeBarang" class="form-control">
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
                                    <label>Gambar Item:</label><br/>
                                    <input type="file" name="file" id="file" multiple>

                                    <div class="row mb-4">

                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="BuktiGambar">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                        <!-- <div style="border:1px solid grey;border-style:dashed;max-width:100px;max-height:100px;min-width:100px;min-height:100px" class=" rounded-lg text-center p-3"> -->
                            <img style="object-fit:contain;"
                            src="//placehold.it/140?text=IMAGE" class="img-fluid" id="preview" />
                        </div>
                    </label>
                </div>
            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" align="center">

                                <div class="form-group">
                                    <label>Kapasitas CC : </label>
                                    <input type="text" required="required" name="KapasitasCC" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">                                    
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Silinder : </label>
                                    <select name="Cylinder" id="Cylinder" class="form-control">
                                        <option value="">Pilih Jumlah Silinder</option>
                                        <option value="1">1 Cyl</option>
                                        <option value="2">2 Cyl</option>
                                        <option value="3">3 Cyl</option>
                                        <option value="4">4 Cyl</option>
                                        <option value="5">5 Cyl</option>
                                        <option value="6">6 Cyl</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ABS : </label>
                                    <select name="ABS" id="ABS" class="form-control">
                                        <option value="">Pilih ABS</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jarak Tempuh (KM) : </label>
                                    <input type="text" required="required" name="KM" class="form-control" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">                                    
                                </div>
                                <div class="form-group">
                                    <label>Keterangan : </label>
                                    <input type="text" required="required" name="Keterangan" class="form-control">                                    
                                </div>
                                <br/><br/>
                            </div>  

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
