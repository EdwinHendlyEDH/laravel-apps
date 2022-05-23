<?php

namespace App\Http\Controllers;

use App\Models\tb_murid;
use Illuminate\Http\Request;
class MuridController extends Controller
{
    //
    public function index(){
        $data = tb_murid::all();
        return view('murid.index', compact(['data']));
    }

    public function create(){
        $data = tb_murid::all();
        return view('murid.create', compact(['data']));
    }

    public function storeAdd(Request $request){
        tb_murid::create($request->except(['_token', 'submit']));
        return redirect('/murid');
    }

    public function change($id){
        $dataId = tb_murid::find($id);
        $dataFull = tb_murid::all();
        return view('murid.change', compact(['dataFull', 'dataId']));
    }

    public function storeChange($id, Request $request){
        $dataId = tb_murid::find($id);
        $dataId->update($request->except(['_token', 'submit']));
        return redirect('/murid');
    }

    public function delete($id){
        $data = tb_murid::find($id);
        $data->delete();
        return redirect('/murid');
    }

}
