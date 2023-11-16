@extends('layouts.app', ['page' => __('Pasien List'), 'pageSlug' => 'viewpasien'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Pasien List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Email
                </th>
                <th>
                   di buat pada
                </th>
                <th>
                   di ubah pada
                </th>
              </tr>
            </thead>
            @php $no = 1; @endphp

                    <tbody>
                        @foreach($pasien as $psn)
                            <tr>
                                <th>{{ ( $pasien->currentPage() - 1 ) * $pasien->perPage() + $loop->iteration }}</th>
                                <td>{{$psn->name}}</td>
                                <td>{{$psn->email}}</td>
                                <td>{{$psn->created_at}}</td>
                                <td>{{$psn->updated_at}}</td>
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
