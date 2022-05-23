<?php

namespace App\Http\Controllers;

use App\Models\Music_Table;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function main(){

        // ini adalah laravel collection
        $musics = Music_Table::all(); 
        // dd($musics);
        return view('music.index', compact(['musics']));
    }

    public function create(){
        return view('music.add');
    }

    public function simpan(Request $request){
        // dd($request->all());
        // dd($request->except('_token', 'submit'));
        Music_Table::create($request->except('_token', 'submit'));
        return redirect('/music');
    }

    public function change($id){
        $music = Music_Table::find($id);
        return view('music.change', compact(['music']));
    }

    public function update($id, Request $request){
        $music = Music_Table::find($id);
        $music->update($request->except('_token', 'submit'));
        return redirect('/music');
    }

    public function destroy($id){
        $music = Music_Table::find($id);
        $music->delete();
        return redirect('/music');
    }
}
