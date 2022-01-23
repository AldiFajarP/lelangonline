@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                <h3 style="color:white;">Kategori</h3>
            </div>
                     <form action="{{ route('masterkategori.store') }}" method="post">
                        @csrf
                        <div class="col-md-6" align="center">
                            <div class="x_panel">
                                <div class="x_content">
                                        <div class="form-group">
                                            <input type="hidden" readonly name="IdUser" value="{{ Auth::id() }}" class="form-control">
                                        </div>
                                        <div class="form-group form-group--inline">
                                          <label for="KodeKlasifikasi">Kode Klasifikasi :</label>
                                              <select name="KodeKlasifikasi" id="InputKodeKlasifikasi" class="form-control">
                                                 <option value="">Pilih Kode Klasifikasi</option>
                                                @foreach ($klasifikasi  as $kla)
                                                 <option value="{{$kla->KodeKlasifikasi}}" >{{$kla->NamaKlasifikasi}}</option>
                                                @endforeach
                                              </select>
                                  </div>
                                        <div class="form-group">
                                            <label>Kode Kategori : </label>
                                            <input type="text" required="required" name="KodeKategori" readonly class="form-control" value="{{$newID}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kategori : </label>
                                            <input type="text" required="required" name="NamaKategori" class="form-control">
                                            <small>Contoh : Panigale V4 / CBR</small>
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
    <script>
        $(document).ready(function() {
    $('#InputKodeKlasifikasi').select2();
});
</script>
@endsection
