<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Logo;

class LogoController extends Controller
{
    
    public function addLogo(){
        $logos = Logo::all();

        return view('pages.add-logo', compact('logos'));
    }
    public function storeLogo(Request $request){
        if(request()->hasFile('logo')){
            $path = $request->file('logo')->store('public/logo');
            $logoName = str_replace('public/', '', $path);
        }
        Logo::create([
            'logo'=>$logoName,
        ]);
        return redirect('/');
    }
}
