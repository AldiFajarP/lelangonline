<?php

namespace App\Http\Controllers\Backend\Lelang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class LelangController extends Controller
{
	public function create()
	{
		$databarang = DB::table('databarangs')
					->where('Status', 'CFM')
					->where('StatusLelang', '0')
					->get();

		$last_id = DB::select('SELECT * FROM lelangs ORDER BY KodeLelang DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "LNG-001";
        } else {
            $string = $last_id[0]->KodeLelang;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "LNG-" . $new;
        }

        return view('backend.lelang.create', ['newID' => $newID, 'databarang' => $databarang]);
	}

	public function searchDATA($id)
    {
        $db = DB::table('databarangs')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('databarangs.KodeBarang', $id)
                    ->get();

       if ($db != null) {
         return response()->json($db);
       } else {
         return response()->json([]);
       }
    }

    public function store(Request $request)
    {   
        $last_id = DB::select('SELECT * FROM lelangs ORDER BY KodeLelang DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "LNG-001";
        } else {
            $string = $last_id[0]->KodeLelang;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "LNG-" . $new;
        }

        DB::table('lelangs')->insert([
            'KodeLelang' => $newID,
            'KodeBarang' => $request->KodeBarang,
            'TanggalMulai' => $request->TanggalMulai,
            'JamMulai' => $request->JamMulai,
            'TanggalPenutupan' => $request->TanggalPenutupan,
            'JamPenutupan' => $request->JamPenutupan,
            'OpenBid' => $request->OpenBid,
            'BuyItNow' => $request->BuyItNow,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('lelang_kelipatans')->insert([
            'KodeLelang' => $newID,
            'Kelipatan1' => $request->Kelipatan1,
            'Kelipatan2' => $request->Kelipatan2,
            'Kelipatan3' => $request->Kelipatan3,
            'Kelipatan4' => $request->Kelipatan4,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('databarangs')->where('KodeBarang', $request->KodeBarang)->update([
            'StatusLelang' => '1',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah lelang ' . $newID,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Lelang ' . $newID . ' berhasil ditambahkan';
        return redirect('/admin/lelang/belumdimulai')->with(['created' => $pesan]);
    }

    public function belumdimulai()
    {
        $datalelang = DB::table('lelangs')
                    ->join('databarangs', 'databarangs.KodeBarang', '=', 'lelangs.KodeBarang')
                    ->where('lelangs.Status', 'OPN')
                    ->get();

        return view('backend.lelang.belumdimulai', compact('datalelang'));
    }

    public function detail($id)
    {
        $datalelang = DB::table('lelangs')
                    ->join('lelang_kelipatans', 'lelang_kelipatans.KodeLelang', '=', 'lelangs.KodeLelang')
                    ->join('databarangs', 'databarangs.KodeBarang', '=', 'lelangs.KodeBarang')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('lelangs.KodeBarang', $id)
                    ->where('lelangs.Status', 'OPN')
                    ->get();

        return view('backend.lelang.detail', compact('datalelang'));
    }

    public function edit($id)
    {
        $datalelang = DB::table('lelangs')
                    ->join('lelang_kelipatans', 'lelang_kelipatans.KodeLelang', '=', 'lelangs.KodeLelang')
                    ->join('databarangs', 'databarangs.KodeBarang', '=', 'lelangs.KodeBarang')
                    ->join('databarang_details', 'databarang_details.KodeBarang', '=', 'databarangs.KodeBarang')
                    ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databarangs.KodeKategori')
                    ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'masterkategoris.KodeKlasifikasi')
                    ->where('lelangs.KodeLelang', $id)
                    ->where('lelangs.Status', 'OPN')
                    ->get();

        return view('backend.lelang.edit', compact('datalelang'));
    }

    public function update(Request $request, $id)
    {   

        DB::table('lelangs')->where('KodeLelang', $request->KodeLelang)->update([            
            'TanggalMulai' => $request->TanggalMulai,
            'JamMulai' => $request->JamMulai,
            'TanggalPenutupan' => $request->TanggalPenutupan,
            'JamPenutupan' => $request->JamPenutupan,
            'OpenBid' => $request->OpenBid,
            'BuyItNow' => $request->BuyItNow,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('lelang_kelipatans')->where('KodeLelang', $request->KodeLelang)->insert([
            'KodeLelang' => $newID,
            'Kelipatan1' => $request->Kelipatan1,
            'Kelipatan2' => $request->Kelipatan2,
            'Kelipatan3' => $request->Kelipatan3,
            'Kelipatan4' => $request->Kelipatan4,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Ubah lelang ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Lelang ' . $id . ' berhasil ditambahkan';
        return redirect('/admin/lelang/belumdimulai')->with(['created' => $pesan]);
    }
}