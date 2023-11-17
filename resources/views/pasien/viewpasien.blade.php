@extends('layouts.app', ['page' => __('Pasien List'), 'pageSlug' => 'viewpasien'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Pasien List</h4>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('pages.addpasien') }}"><i class="tim-icons icon-simple-add"></i> Tambah Pasien</a><br><br>
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nomor Rekam Medis
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Poli
                </th>
                <th>
                   Di buat pada
                </th>
                <th>
                   Di ubah pada
                </th>
                <th>
                   Action
                </th>
              </tr>
            </thead>
            @php $no = 1; @endphp

                    <tbody>
                        @foreach($pasien as $psn)
                            <tr>
                                <th>{{ ( $pasien->currentPage() - 1 ) * $pasien->perPage() + $loop->iteration }}</th>
                                <td>{{$psn->nomorrekammedis}}</td>
                                <td>{{$psn->nama}}</td>
                                <td>{{$psn->poli}}</td>
                                <td>{{$psn->created_at}}</td>
                                <td>{{$psn->updated_at}}</td>
                                <td>
                                    <a href="{{ route('pages.detailpasien', $psn->id)}}" class="btn btn-info btn-sm"><i class="tim-icons icon-zoom-split"></i></a>
                                    <a href="{{ route('pages.changepasien', $psn->id)}}" class="btn btn-warning btn-sm"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="{{ route('pages.deletepasien', $psn->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
