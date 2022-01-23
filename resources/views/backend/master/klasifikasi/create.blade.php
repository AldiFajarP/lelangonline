@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                <h3 style="color:white;">Klasifikasi</h3>
            </div>  
                <form action="{{ route('masterklasifikasi.store') }}" method="post">
                    @csrf              
                    <div class="col-md-6" align="center">
                            <div class="x_panel">
                                <div class="x_content">
                        <div class="form-group">
                            <input type="hidden" readonly name="IdUser" value="{{ Auth::id() }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kode Klasifikasi : </label>
                            <input type="text" readonly required="required" name="KodeKlasifikasi" class="form-control form-group--inline   " value="{{$newID}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Nama Klasifikasi : </label>
                            <input type="text" required="required" name="NamaKlasifikasi" class="form-control">
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
@endsection
