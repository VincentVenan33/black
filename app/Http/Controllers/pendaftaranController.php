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

    // Fetch pendaftaranpasien data with join
    $pendaftaran_data = DB::table('pendaftaranpasien')
        ->join('pasien', 'pendaftaranpasien.idpasien', '=', 'pasien.id')
        ->select('pendaftaranpasien.*', 'pasien.nama')
        ->orderBy('pendaftaranpasien.created_at', 'asc') // Sort by creation date in descending order (new to old)
        ->get();

    // Initialize an empty array to store the queue numbers for each doctor
    $doctorQueueNumbers = [];

    // Iterate through pendaftaran_data to calculate and assign queue numbers
    foreach ($pendaftaran_data as $pdfn) {
        $doctorName = $pdfn->jadwal;

        // Check if the doctor has an existing queue number, if not, initialize it to 1
        $queueNumber = isset($doctorQueueNumbers[$doctorName]) ? $doctorQueueNumbers[$doctorName] + 1 : 1;

        // Update the queue number for the doctor
        $doctorQueueNumbers[$doctorName] = $queueNumber;

        // Assign the queue number to the current pendaftaran_data
        $pdfn->nomor_antrian = $queueNumber;
    }

    // Convert the collection to an array and reverse the order to display from old to new
    $reversedPendaftaranData = array_reverse($pendaftaran_data->toArray());

    // Manually paginate the modified pendaftaran_data
    $perPage = 10;
    $currentPage = request()->get('page', 1);
    $pagedData = array_slice($reversedPendaftaranData, ($currentPage - 1) * $perPage, $perPage);
    $paginatedPendaftaranData = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($reversedPendaftaranData), $perPage, $currentPage);

    $data['title'] = "Pendaftaran Pasien";
    $data['pendaftaranpasien'] = $paginatedPendaftaranData;

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

    public function deletependaftaran($id)
    {
        $pendaftaran_data = PendaftaranModel::where('id', $id)->first();
        $pendaftaran_data->delete();
        return redirect()->route('pages.viewpendaftaran')->with('error','Data Canceled');
    }

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