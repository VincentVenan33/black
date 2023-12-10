<?php

namespace App\Http\Controllers;
use App\Models\PendaftaranModel;
use App\Models\PasienModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function viewpendaftaran()
    {
        $data = array();
        $pendaftaran_data = DB::table('pendaftaranpasien')
            ->join('pasien', 'pendaftaranpasien.idpasien', '=', 'pasien.id')
            ->select('pendaftaranpasien.*', 'pasien.nama')
            ->orderBy('pendaftaranpasien.id', 'desc')
            ->paginate(10);

        $data['title'] = "Pendaftaran Pasien";
        $data['pendaftaranpasien'] = $pendaftaran_data;

        return view('pendaftaran.viewpendaftaran', $data);
    }

    public function addpendaftaran()
    {
        $listPasien = PasienModel::all();
        $data = array();
        $data['title'] = "Tambah pendaftaran";
        return view('pendaftaran.addpendaftaran', $data, compact('listPasien'));
    }

    public function savependaftaran(Request $request)
    {
        $request->validate([
            "idpasien" => "required",
            "tanggaldaftar" => "required",
        ]);
        $pendaftaran_data = PendaftaranModel::create([
            "idpasien" => $request->idpasien,
            "tanggaldaftar" => $request->tanggaldaftar,
            "jadwal" => $request->jadwal,
        ]);
        if($pendaftaran_data){
            return redirect()->route('pages.viewpendaftaran')->with('message','Data added Successfully');
        }else{
            return redirect()->route('pendaftaran.viewpendaftaran')->with('error','Data added Error');
        }
    }

    // public function changepasien($id)
    // {
    //     $data = array();
    //     $pasien_data = PendaftaranModel::select('*')
    //                 ->where('id', $id)
    //                 ->first();
    //     $data['title'] = "Ubah Pasien";
    //     $data['pasien'] = $pasien_data;
    //     return view('pasien.changepasien', $data);
    // }

    // public function updatepasien(Request $request)
    // {


    //     $request->validate([
    //         "nomorrekammedis" => "required|min:5",
    //         "nama" => "required|min:3",
    //         "tempat" => "required|min:3",
    //         "tanggallahir" => "required",
    //         "jeniskelamin" => "required",
    //         "alamatlengkap" => "required|min:5",
    //         "pendidikan" => "required",
    //         "agama" => "required",
    //         "pekerjaan" => "required|min:3",
    //         "status" => "required",
    //         "notelp" => "required",
    //         "poli" => "required|min:3",

    //     ]);
    //     $pasien_data = PendaftaranModel::find($request->id);
    // if(!$pasien_data) {
    //     return response()->json(['message' => 'Pasien tidak ditemukan'], 404);
    // }
    //     $pasien_data = PendaftaranModel::where('id', $request->id)
    //                 ->update([
    //                     "nomorrekammedis" => $request->nomorrekammedis,
    //                     "nama" => $request->nama,
    //                     "tempat" => $request->tempat,
    //                     "tanggallahir" => $request->tanggallahir,
    //                     "jeniskelamin" => $request->jeniskelamin,
    //                     "alamatlengkap" => $request->alamatlengkap,
    //                     "pendidikan" => $request->pendidikan,
    //                     "agama" => $request->agama,
    //                     "pekerjaan" => $request->pekerjaan,
    //                     "status" => $request->status,
    //                     "notelp" => $request->notelp,
    //                     "poli" => $request->poli,
    //                 ]);

    //     return redirect()->route('pages.viewpasien')->with('message','Data update succeesfully');
    // }

    // public function deletepasien($id)
    // {
    //     $pasien_data = PendaftaranModel::where('id', $id)->first();
    //     $pasien_data->delete();
    //     return redirect()->route('pages.viewpasien')->with('error','Data Deleted');
    // }

    // public function detailpasien($id)
    // {
    //     $data = array();
    //     $pasien_data = PendaftaranModel::select('*')
    //                 ->where('id', $id)
    //                 ->first();
    //     $data['title'] = "Detail Pasien";
    //     $data['pasien'] = $pasien_data;
    //     return view('pasien.detailpasien', $data);
    // }
}