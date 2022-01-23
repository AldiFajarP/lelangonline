<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class KategoriController extends Controller
{
    public function index()
    {   
        $users = Auth::id();
        
        $masterkategori = DB::table('masterkategoris')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                ->where('masterkategoris.Status', 'OPN')
                ->get();


        return view('backend.master.kategori.index', ['masterkategori'=>$masterkategori]);
        
    }

    

    public function create(Request $request)
    {   
        $users = Auth::id();
        


        $klasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();
        $last_id = DB::select('SELECT * FROM masterkategoris ORDER BY KodeKategori DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "KAT-001";
        } else {
            $string = $last_id[0]->KodeKategori;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "KAT-" . $new;
        }

        return view('backend.master.kategori.create', [
            'newID' => $newID,
            'klasifikasi' => $klasifikasi
        ]);
        
    }

    

    public function store(Request $request)
    {   
        $users = Auth::id();
        


        $this->validate($request, [
            'KodeKlasifikasi' => 'required',
            'KodeKategori' => 'required',
            'NamaKategori' => 'required',
        ]);

        DB::table('masterkategoris')->insert([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'KodeKategori' => $request->KodeKategori,
            'NamaKategori' => $request->NamaKategori,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah kategori ' . $request->KodeKategori,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Kategori ' . $request->NamaKategori . ' berhasil ditambahkan';
        return redirect('/admin/master/kategori')->with(['created' => $pesan]);
        
    }

    public function edit($id)
    {   
        $users = Auth::id();
        


        $kategori = DB::table('masterkategoris')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                ->where('masterkategoris.KodeKategori', $id)
                ->where('masterkategoris.Status', 'OPN')
                ->get();
        return view('backend.master.kategori.edit', [
            'kategori' => $kategori,
        ]);
        
    }

    public function searchDataKATByCustId($id)
     {  
        $users = Auth::id();
        


        $id = DB::table('masterkategoris')
                ->where('KodeKlasifikasi', $id)
                ->get();

        if($id != null){
            return response()->json($id);
        } else {
            return response()->json([]);
        }
        
     }

    public function update(Request $request)
    {
        $users = Auth::id();
        


        $this->validate($request, [
            'KodeKlasifikasi' => 'required',
            'KodeKategori' => 'required',
            'NamaKategori' => 'required',
        ]);

        DB::table('masterkategoris')->where('KodeKategori', $request->KodeKategori)->update([
            'NamaKategori' => $request->NamaKategori,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update kategori ' . $request->Kodekategori,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Kategori ' . $request->NamaKategori . ' berhasil diubah';
        return redirect('/admin/master/kategori')->with(['edited' => $pesan]);
            
    }

    public function delete($id)
    {
        DB::table('masterkategoris')->where('KodeKategori', $id)->update([
            'Status' => 'DEL'
        ]);

        $pesan = 'Kategori ' . $id . ' berhasil dihapus';
        return redirect('/admin/master/kategori')->with(['deleted' => $pesan]);
            
    }
}
