@extends('layouts.app', ['page' => __('pendaftaran Pasien'), 'pageSlug' => 'viewpendaftaran'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Pendaftaran Pasien</h4>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('pages.addpendaftaran') }}"><i class="tim-icons icon-simple-add"></i> Daftar</a><br><br>
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama Pasien
                </th>
                <th>
                  Tanggal Daftar
                </th>
                <th>
                   Jadwal
                </th>
              </tr>
            </thead>
            @php $no = 1; @endphp

                    <tbody>
                        @foreach($pendaftaranpasien as $pdfn)
                            <tr>
                                <th>{{ ( $pendaftaranpasien->currentPage() - 1 ) * $pendaftaranpasien->perPage() + $loop->iteration }}</th>
                                <td>{{$pdfn->nama}}</td>
                                <td>{{$pdfn->tanggaldaftar}}</td>
                                <td>{{$pdfn->jadwal}}</td>
                                <td>
                                    <a href="{{ route('pages.deletependaftaran', $pdfn->id)}}" onclick="return confirm('Apakah Anda Yakin Membatalkan Pendaftaran?');" class="btn btn-danger btn-sm"><i class="tim-icons icon-simple-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
