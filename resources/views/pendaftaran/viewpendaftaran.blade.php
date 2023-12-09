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
                  Nama Pasien
                </th>
                <th>
                  Poli
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
                        @foreach($pendaftaran_models as $pdfn)
                            <tr>
                                <th>{{ ( $pendaftaran_models->currentPage() - 1 ) * $pendaftaran_models->perPage() + $loop->iteration }}</th>
                                <td>{{$pdfn->namapasien}}</td>
                                <td>{{$pdfn->poli}}</td>
                                <td>{{$pdfn->tanggaldaftar}}</td>
                                <td>{{$pdfn->jadwal}}</td>
                                <td>
                                    <!-- <a href="{{ route('pages.detailpasien', $pdfn->id)}}" class="btn btn-info btn-sm"><i class="tim-icons icon-zoom-split"></i></a>
                                    <a href="{{ route('pages.changepasien', $pdfn->id)}}" class="btn btn-warning btn-sm"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="{{ route('pages.deletepasien', $pdfn->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
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
