@extends('backend.index')
@section('content')
<style>
/* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<br></br>
<div class="row justify-content-center">
    <div class="col-md-12" align="center">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff;">
                @foreach($databarang as $db)
                <h3 style="color:white;" class="unselect">Detail Barang {{$db->KodeBarang}} ({{$db->NamaBarang}})</h3>
                @endforeach
            </div>  
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf              
                    <div class="x_panel">
                        <div class="x_content">
                            <br/>
                            <div class="col-md-6" align="center">
                                @foreach($databarang as $db)
                                <div class="form-group">
                                    <label class="unselect">Kode Barang : </label>
                                    <input type="text" readonly  name="KodeBarang" class="form-control form-group" value="{{$db->KodeBarang}}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="unselect">Klasifikasi : </label>
                                    <input type="text" readonly  name="KodeBarang" class="form-control form-group" value="{{$db->NamaKlasifikasi}}">                                   
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Kategori : </label>
                                    <input type="text" readonly  name="KodeBarang" class="form-control form-group" value="{{$db->NamaKategori}}">
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Nama Barang : </label>
                                    <input type="text" readonly name="NamaBarang" class="form-control form-group" value="{{$db->NamaBarang}}">
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Tipe Motor : </label>
                                    <input type="text" readonly  name="KodeBarang" class="form-control form-group" value="{{$db->TipeBarang}}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="unselect">Gambar Item:</label><br/>
                                
                                    <div class="row mb-4">

                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="unselect" class="align-item-center" style="font-weight:normal;" for="BuktiGambar">

                            <img src="{{ asset('data_barang/'.$db->GambarItem) }}" class="img-fluid" id="myImg" alt="{{$db->NamaBarang}}"/>
                            <div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
                    </label>


<!-- The Modal -->


                </div>
            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" align="center">

                                <div class="form-group">
                                    <label class="unselect">Kapasitas CC : </label>
                                    <input type="text" readonly  name="KapasitasCC" class="form-control" value="{{$db->KapasitasCC}}">                                    
                                </div>

                                <div class="form-group">
                                    <label class="unselect">Jumlah Silinder : </label>
                                    <input type="text" readonly name="KapasitasCC" class="form-control" value="{{$db->Cylinder}}">
                                </div>
                                <div class="form-group">
                                    <label class="unselect">ABS : </label>
                                    @if($db->ABS == '1')
                                    <input type="text" readonly name="KapasitasCC" class="form-control" value="Ya">
                                    @elseif($db->ABS == '0')
                                    <input type="text" readonly name="KapasitasCC" class="form-control" value="Tidak">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="unselect">Jarak Tempuh (KM) : </label>
                                    <input type="text" readonly name="KM" class="form-control" value="{{$db->KM}}">                                    
                                </div>
                                <div class="form-group">
                                    <label class="unselect">Keterangan : </label>
                                    <input type="text" readonly name="Keterangan" class="form-control" value="{{$db->Keterangan}}">                                    
                                </div>
                                <br/><br/>
                            </div>  
                            @endforeach
                    <div style="text-align:center;">
                            <a href="/admin/databarang" class="btn btn-danger">Kembali</a>
                        </div>
                        <br/>         
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

        
    </script>
@endpush
<script>
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
    </script>
@endsection
