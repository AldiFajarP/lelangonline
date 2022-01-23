<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $klasifikasi = DB::table('masterklasifikasis')
                    ->where('Status', 'OPN')
                    ->get();
        return view('frontend.index', compact('klasifikasi'));
    }
}
