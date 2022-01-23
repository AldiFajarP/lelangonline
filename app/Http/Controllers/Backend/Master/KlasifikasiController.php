<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class KlasifikasiController extends Controller
{
    public function index()
    {      
        $users = Auth::id();
        
        $masterklasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();


        return view('backend.master.klasifikasi.index', ['masterklasifikasi'=>$masterklasifikasi]);
        
    }

    

    public function create(Request $request)
    {   
        $users = Auth::id();
        


        $last_id = DB::select('SELECT * FROM masterklasifikasis ORDER BY KodeKlasifikasi DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "KLA-001";
        } else {
            $string = $last_id[0]->KodeKlasifikasi;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "KLA-" . $new;
        }

        return view('backend.master.klasifikasi.create', ['newID' => $newID]);
        
    }

    

    public function store(Request $request)
    {
        $users = Auth::id();
        


        $this->validate($request, [
            'KodeKlasifikasi' => 'required',
            'NamaKlasifikasi' => 'required',
        ]);

        DB::table('masterklasifikasis')->insert([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'NamaKlasifikasi' => $request->NamaKlasifikasi,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah klasifikasi ' . $request->KodeKlasifikasi,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Klasifikasi ' . $request->NamaKlasifikasi . ' berhasil ditambahkan';
        return redirect('/admin/master/klasifikasi')->with(['created' => $pesan]);
        
    }

    public function edit($id)
    {   
        $users = Auth::id();
        


        $klasifikasi = DB::table('masterklasifikasis')
                ->where('KodeKlasifikasi', $id)
                ->where('Status', 'OPN')
                ->get();

        return view('backend.master.klasifikasi.edit', ['klasifikasi' => $klasifikasi]);
        
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
        $users = Auth::id();
        


        $this->validate($request, [
            'KodeKlasifikasi' => 'required',
            'NamaKlasifikasi' => 'required',
        ]);

        DB::table('masterklasifikasis')->where('KodeKlasifikasi', $request->KodeKlasifikasi)->update([
            'NamaKlasifikasi' => $request->NamaKlasifikasi,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update klasifikasi ' . $request->KodeKlasifikasi,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Klasifikasi ' . $request->NamaKlasifikasi . ' berhasil diubah';
        return redirect('/admin/master/klasifikasi')->with(['edited' => $pesan]);
            
    }

    public function destroy($id)
    {   

        $check = DB::table('masterkategoris')->where('KodeKlasifikasi', $id)->where('Status', 'OPN')->count();

        if($check > 0)
        {   
            $pesan = 'Hapus terlebih dahulu data kategori yang menggunakan Kode Klasikasi '.$id.'! ('.$check.' Data)';
            return redirect('/admin/master/klasifikasi')->with(['deleted' => $pesan]);
        } else {
            DB::table('masterklasifikasis')->where('KodeKlasifikasi', $id)->update([
                'Status' => 'DEL'
            ]);

            $pesan = 'Klasifikasi ' . $id . ' berhasil dihapus';
            return redirect('/admin/master/klasifikasi')->with(['deleted' => $pesan]);
        }
        
            
    }
}
