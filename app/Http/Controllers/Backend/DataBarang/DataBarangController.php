<?php

namespace App\Http\Controllers\Backend\DataBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DataBarangController extends Controller
{
    public function index()
    {      
        $users = Auth::id();
        
        $databarang = DB::table('databarangs')
                ->where('Status', 'OPN')
                ->get();


        return view('backend.databarang.index', ['databarang'=>$databarang]);
        
    }


    public function konfirmasiproses($id)
    {
        DB::table('databarangs')->where('KodeBarang', $id)->update([
            'Status' => 'CFM'
        ]);

        $pesan = 'Data barang ' . $id . ' berhasil dikonfirmasi';
        return redirect('/admin/databarang')->with(['created' => $pesan]);
    }

    public function konfirmasibatal($id)
    {
        DB::table('databarangs')->where('KodeBarang', $id)->update([
            'Status' => 'OPN'
        ]);

        $pesan = 'Data barang ' . $id . ' berhasil dikonfirmasi';
        return redirect('/admin/databarang/konfirmasi')->with(['created' => $pesan]);
    }

    public function konfirmasi()
    {      
        $users = Auth::id();
        
        $databarang = DB::table('databarangs')
                ->where('Status', 'CFM')
                ->get();


        return view('backend.databarang.konfirmasi', ['databarang'=>$databarang]);
        
    }

    

    public function create(Request $request)
    {   
        $users = Auth::id();
        
        $klasifikasi = DB::table('masterklasifikasis')
                    ->where('Status', 'OPN')
                    ->get();


        $last_id = DB::select('SELECT * FROM databarangs ORDER BY KodeBarang DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "BRG-001";
        } else {
            $string = $last_id[0]->KodeBarang;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "BRG-" . $new;
        }

        return view('backend.databarang.create', ['newID' => $newID, 'klasifikasi' => $klasifikasi]);
        
    }

    public function searchKAT($id)
    {
        $kat = DB::table('masterkategoris')->where('KodeKlasifikasi', $id)->where('Status', 'OPN')->get();
       if ($kat != null) {
         return response()->json($kat);
       } else {
         return response()->json([]);
       }
    }

    

    public function store(Request $request)
    {
        
        $file = $request->file('file');
         
            $nama_file = time()."_".$file->getClientOriginalName();
         
           
            $tujuan_upload = 'data_barang';
            $file->move($tujuan_upload,$nama_file);



        DB::table('databarangs')->insert([
            'KodeBarang' => $request->KodeBarang,
            'KodeKategori' => $request->KodeKategori,
            'NamaBarang' => $request->NamaBarang,
            'TipeBarang' => $request->TipeBarang,
            'GambarItem' => $nama_file,
            'StatusLelang' => '0',
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('databarang_details')->insert([
            'KodeBarang' => $request->KodeBarang,
            'KapasitasCC' => $request->KapasitasCC,
            'Cylinder' => $request->Cylinder,
            'ABS' => $request->ABS,
            'KM' => $request->KM,
            'Keterangan' => $request->Keterangan,
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah data barang ' . $request->KodeBarang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data barang ' . $request->NamaBarang . ' berhasil ditambahkan';
        return redirect('/admin/databarang')->with(['created' => $pesan]);
        
    }

    public function detail($id)
    {
        $databarang = DB::table('databarangs')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('databarangs.KodeBarang', $id)
                    ->where('databarangs.Status', 'OPN')
                    ->get();

        return view('backend.databarang.detail', ['databarang' => $databarang]);
    }

    public function detailkonfirmasi($id)
    {
        $databarang = DB::table('databarangs')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('databarangs.KodeBarang', $id)
                    ->where('databarangs.Status', 'CFM')
                    ->get();

        return view('backend.databarang.detailkonfirmasi', ['databarang' => $databarang]);
    }



    public function edit($id)
    {   
        $databarang = DB::table('databarangs')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('databarangs.KodeBarang', $id)
                    ->where('databarangs.Status', 'OPN')
                    ->get();

        $klasifikasi = DB::table('masterklasifikasis')                
                ->where('Status', 'OPN')
                ->get();

        return view('backend.databarang.edit', ['klasifikasi' => $klasifikasi,'databarang' => $databarang,]);
        
    }

    public function searchDataKLAByCustId($id)
     {
        $users = Auth::id();
        


       $kla = DB::table('masterklasifikasis')->where('KodeKlasifikasi', $id)->where('Status', 'OPN')->get();
       if ($kla != null) {
         return response()->json($kla);
       } else {
         return response()->json([]);
       }
       
     }

    public function update(Request $request)
    {   

        if($request->file != null)
        {
            $file = $request->file('file');
         
            $nama_file = time()."_".$file->getClientOriginalName();
         
           
            $tujuan_upload = 'data_barang';
            $file->move($tujuan_upload,$nama_file);

            $ItemLama = DB::table('databarangs')->where('KodeBarang',$request->KodeBarang)->get();
            $GambarLama = $ItemLama[0]->GambarItem;
            rename('data_barang/'.$GambarLama,'data_barang/recycle/'.$GambarLama);

            DB::table('databarangs')->where('KodeBarang', $request->KodeBarang)->update([
                'KodeBarang' => $request->KodeBarang,
                'KodeKategori' => $request->KodeKategori,
                'NamaBarang' => $request->NamaBarang,
                'TipeBarang' => $request->TipeBarang,
                'GambarItem' => $nama_file,
                'StatusLelang' => '0',
                'Status' => 'OPN',
                'KodeUser' => \Auth::id(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        } else {
            DB::table('databarangs')->where('KodeBarang', $request->KodeBarang)->update([
                'KodeBarang' => $request->KodeBarang,
                'KodeKategori' => $request->KodeKategori,
                'NamaBarang' => $request->NamaBarang,
                'TipeBarang' => $request->TipeBarang,
                'StatusLelang' => '0',
                'Status' => 'OPN',
                'KodeUser' => \Auth::id(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
        
        DB::table('databarang_details')->where('KodeBarang', $request->KodeBarang)->update([
            'KodeBarang' => $request->KodeBarang,
            'KapasitasCC' => $request->KapasitasCC,
            'Cylinder' => $request->Cylinder,
            'ABS' => $request->ABS,
            'KM' => $request->KM,
            'Keterangan' => $request->Keterangan,
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update data barang ' . $request->KodeBarang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data barang ' . $request->NamaBarang . ' berhasil diubah';
        return redirect('/admin/databarang')->with(['created' => $pesan]);
            
    }

    public function destroy($id)
    {
        DB::table('masterklasifikasis')->where('KodeKlasifikasi', $id)->update([
            'Status' => 'DEL'
        ]);

        $pesan = 'Klasifikasi ' . $id . ' berhasil dihapus';
        return redirect('/admin/master/klasifikasi')->with(['deleted' => $pesan]);
            
    }
}
