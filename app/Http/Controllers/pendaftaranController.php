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
            ->orderBy('pendaftaranpasien.created_at', 'asc')
            ->orderBy('pendaftaranpasien.tanggaldaftar', 'asc')
            ->get();

        $doctorQueueNumbers = [];
        $currentDate = null;

        foreach ($pendaftaran_data as $pdfn) {
            if ($pdfn->status == 0) {
                continue;
            }

            $doctorName = $pdfn->jadwal;
            $registrationDate = $pdfn->tanggaldaftar;

            if ($registrationDate != $currentDate) {
                $currentDate = $registrationDate;
                $doctorQueueNumbers = [];
            }

            $queueNumber = isset($doctorQueueNumbers[$doctorName]) ? $doctorQueueNumbers[$doctorName] + 1 : 1;

            $doctorQueueNumbers[$doctorName] = $queueNumber;

            $pdfn->nomor_antrian = $queueNumber;
        }

        $reversedPendaftaranData = array_reverse($pendaftaran_data->toArray());

        $perPage = 20;
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
            "jadwal" => "required",
        ]);
        $pendaftaran_data = PendaftaranModel::create([
            "idpasien" => $request->idpasien,
            "tanggaldaftar" => $request->tanggaldaftar,
            "jadwal" => $request->jadwal,
            'status' => ($request->status != "" ? "1" : "0"),
        ]);
        if ($pendaftaran_data) {
            return redirect()->route('pages.viewpendaftaran')->with('message', 'Data added Successfully');
        } else {
            return redirect()->route('pendaftaran.viewpendaftaran')->with('error', 'Data added Error');
        }
    }

    public function changependaftaran($id)
    {
        $listPasien = PasienModel::all();
        // $data = array();
        $pendaftaran_data = PendaftaranModel::select('*')
            ->where('id', $id)
            ->first();
            $data = [
                'title' => "Ubah Pendaftaran",
                'pendaftaranpasien' => $pendaftaran_data,
                'listPasien' => $listPasien,
            ];
        return view('pendaftaran.changependaftaran', $data);
    }

    public function updatependaftaran(Request $request)
    {
        $request->validate([
            // "idpasien" => "required",
            "tanggaldaftar" => "required",
            "jadwal" => "required",

        ]);
        $pendaftaran_data = PendaftaranModel::find($request->id);
        if (!$pendaftaran_data) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }
        $pendaftaran_data = PendaftaranModel::where('id', $request->id)
            ->update([
                // "idpasien" => $request->idpasien,
                "tanggaldaftar" => $request->tanggaldaftar,
                "jadwal" => $request->jadwal,
                'status' => ($request->status != "" ? "1" : "0"),
            ]);

        return redirect()->route('pages.viewpendaftaran')->with('message', 'Data update succeesfully');
    }

    public function deletependaftaran($id)
    {
        $pendaftaran_data = PendaftaranModel::where('id', $id)->first();
        $pendaftaran_data->delete();
        return redirect()->route('pages.viewpendaftaran')->with('error', 'Data Canceled');
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