<?php

namespace App\Http\Controllers;
use App\Models\PasienModel;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function viewpasien()
    {
        $data = array();
        $pasien_data = PasienModel::select('*')->orderBy('id', 'desc')->paginate(10);
        $data['title'] = "List Pasien";
        $data['pasien'] = $pasien_data;
        return view('pasien.viewpasien', $data);
    }
}
