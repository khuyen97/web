<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoidung;
use App\vaitro;
use App\nguoidungvaitro;
use Input;

class AppController extends Controller
{
    public function index() {
        $nd = nguoidung::all();
        $vt = vaitro::all();
        $ndvt = nguoidungvaitro::all();
        return view('layouts.app',compact('nd','vt','ndvt'));
    }

    public function store() {
        $nd = Input::get('giangvien');
        $vt = Input::get('monhoc');
        $date = Input::get('date');
        nguoidungvaitro::create([
            'nguoidungID' => $nd,
            'vaitroID'=> $vt,
            'ngaycap' => $date
        ]);
        return redirect()->back();
    }

    public function destroy($id) {
        $ndvt = nguoidungvaitro::find($id);
        $ndvt->delete();
        return back();
    }

    public function edit($id,$nd,$vt,$nc) {
        $ndvt = nguoidungvaitro::find($id);
        $ndvt->nguoidungID = $nd;
        $ndvt->vaitroID = $vt;
        $ndvt->ngaycap = $nc;
        $ndvt->save();
        return back();
    }
}
