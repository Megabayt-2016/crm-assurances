<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    public function show(){
        $user = Auth::user();
        if ($user->role == 'Agent'){
        return view('/importer');
        }
        else {
            return view ('Admin/importer');
        }
    }

    

    public function store(Request $request){
        $file=$request->file('file')->store('imports');
        Excel::import(new ClientsImport, $file);
        return back()->with('message', 'Fichier Excel importé avec succés!');
    }
}
