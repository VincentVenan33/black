@extends('layouts.app', ['page' => __('Detail Pasien'), 'pageSlug' => 'detailpasien'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Detail Pasien') }}</h5>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            {{-- <label>{{ __('id') }}</label> --}}
                            <input type="hidden" name="id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Rekam Medis') }}" value="{{ old('id', $pasien->id) }}" disabled>
                            @include('alerts.feedback', ['field' => 'id'])
                        </div>

                        <div class="form-group{{ $errors->has('nomorrekammedis') ? ' has-danger' : '' }}">
                            <label>{{ __('Nomor Rekam Medis') }}</label>
                            <input style="color: white;" type="text" name="nomorrekammedis" class="form-control{{ $errors->has('nomorrekammedis') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Rekam Medis') }}" value="{{ old('nomorrekammedis', $pasien->nomorrekammedis) }}" disabled>
                            @include('alerts.feedback', ['field' => 'nomorrekammedis'])
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama') }}</label>
                            <input style="color: white;" type="text" name="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" placeholder="{{ __('Nomor Rekam Medis') }}" value="{{ old('nama', $pasien->nama) }}" disabled>
                            @include('alerts.feedback', ['field' => 'nama'])
                        </div>

                        <div class="form-group{{ $errors->has('tempat') ? ' has-danger' : '' }}">
                            <label>{{ __('Tempat Lahir') }}</label>
                            <input style="color: white;" type="text" name="tempat" class="form-control{{ $errors->has('tempat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tempat Lahir') }}" value="{{ old('tempat', $pasien->tempat) }}" disabled>
                            @include('alerts.feedback', ['field' => 'tempat'])
                        </div>

                        <div class="form-group{{ $errors->has('tanggallahir') ? ' has-danger' : '' }}">
                            <label>{{ __('Tanggal Lahir') }}</label>
                            <input style="color: white;" type="date" name="tanggallahir" class="form-control{{ $errors->has('tanggallahir') ? ' is-invalid' : '' }}" value="{{ old('tanggallahir', $pasien->tanggallahir) }}" disabled>
                            @include('alerts.feedback', ['field' => 'tanggallahir'])
                        </div>

                        <div class="form-group{{ $errors->has('jeniskelamin') ? ' has-danger' : '' }}">
                            <label>{{ __('Jenis Kelamin') }}</label>
                            <select name="jeniskelamin" class="form-control{{ $errors->has('jeniskelamin') ? ' is-invalid' : '' }}" disabled style="color: white;">
                                <option value="" disabled>{{ __('Pilih Jenis Kelamin') }}</option>
                                <option value="Laki-laki" {{ old('jeniskelamin', $pasien->jeniskelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    {{ __('Laki-laki') }}
                                </option>
                                <option value="Perempuan" {{ old('jeniskelamin', $pasien->jeniskelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    {{ __('Perempuan') }}
                                </option>
                            </select>
                            @include('alerts.feedback', ['field' => 'jeniskelamin'])
                        </div>

                        <div class="form-group{{ $errors->has('alamatlengkap') ? ' has-danger' : '' }}">
                            <label>{{ __('Alamat Lengkap') }}</label>
                            <textarea style="color: white;" name="alamatlengkap" class="form-control{{ $errors->has('alamatlengkap') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Lengkap') }}" disabled>{{ old('alamatlengkap', $pasien->alamatlengkap) }}</textarea>
                            @include('alerts.feedback', ['field' => 'alamatlengkap'])
                        </div>

                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-danger' : '' }}">
                            <label>{{ __('Pendidikan Terakhir') }}</label>
                            <select name="pendidikan" class="form-control{{ $errors->has('pendidikan') ? ' is-invalid' : '' }}" disabled style="color: white;">
                                <option value="" disabled>{{ __('Pilih Pendidikan') }}</option>
                                <option value="SD" {{ old('pendidikan', $pasien->pendidikan) == 'SD' ? 'selected' : '' }}>
                                    {{ __('SD') }}
                                </option>
                                <option value="SMP" {{ old('pendidikan', $pasien->pendidikan) == 'SMP' ? 'selected' : '' }}>
                                    {{ __('SMP') }}
                                </option>
                                <option value="SMA/SMK" {{ old('pendidikan', $pasien->pendidikan) == 'SMA/SMK' ? 'selected' : '' }}>
                                    {{ __('SMA/SMK') }}
                                </option>
                                <option value="Diploma" {{ old('pendidikan', $pasien->pendidikan) == 'Diploma' ? 'selected' : '' }}>
                                    {{ __('Diploma') }}
                                </option>
                                <option value="S1" {{ old('pendidikan', $pasien->pendidikan) == 'S1' ? 'selected' : '' }}>
                                    {{ __('S1') }}
                                </option>
                                <option value="S2" {{ old('pendidikan', $pasien->pendidikan) == 'S2' ? 'selected' : '' }}>
                                    {{ __('S2') }}
                                </option>
                                <option value="S3" {{ old('pendidikan', $pasien->pendidikan) == 'S3' ? 'selected' : '' }}>
                                    {{ __('S3') }}
                                </option>
                            </select>
                            @include('alerts.feedback', ['field' => 'pendidikan'])
                        </div>

                        <div class="form-group{{ $errors->has('agama') ? ' has-danger' : '' }}">
                            <label>{{ __('Agama') }}</label>
                            <input style="color: white;" type="text" name="agama" class="form-control{{ $errors->has('agama') ? ' is-invalid' : '' }}" placeholder="{{ __('Agama') }}" value="{{ old('agama', $pasien->agama) }}" disabled>
                            @include('alerts.feedback', ['field' => 'agama'])
                        </div>

                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-danger' : '' }}">
                            <label>{{ __('Pekerjaan') }}</label>
                            <input style="color: white;" type="text" name="pekerjaan" class="form-control{{ $errors->has('pekerjaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Pekerjaan') }}" value="{{ old('pekerjaan', $pasien->pekerjaan) }}" disabled>
                            @include('alerts.feedback', ['field' => 'pekerjaan'])
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" disabled style="color: white;">
                                <option value="" disabled>{{ __('Pilih Status') }}</option>
                                <option value="Menikah" {{ old('status', $pasien->status) == 'Menikah' ? 'selected' : '' }}>
                                    {{ __('Menikah') }}
                                </option>
                                <option value="Belum Menikah" {{ old('status', $pasien->status) == 'Belum Menikah' ? 'selected' : '' }}>
                                    {{ __('Belum Menikah') }}
                                </option>
                                <option value="Cerai" {{ old('status', $pasien->status) == 'Cerai' ? 'selected' : '' }}>
                                    {{ __('Cerai') }}
                                </option>
                            </select>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                        <div class="form-group{{ $errors->has('notelp') ? ' has-danger' : '' }}">
                            <label>{{ __('Nomor Telepon') }}</label>
                            <input style="color: white;" type="text" name="notelp" class="form-control{{ $errors->has('notelp') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Nomor Telepon') }}" value="{{ old('notelp', $pasien->notelp) }}"
                                   pattern="[+0-9]+"
                                   title="Hanya dapat diisi dengan karakter + dan angka" disabled>
                            @include('alerts.feedback', ['field' => 'notelp'])
                        </div>

                        <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                            <label>{{ __('Poli') }}</label>
                            <input style="color: white;" type="text" name="poli" class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}" placeholder="{{ __('Poli') }}" value="{{ old('poli', $pasien->poli) }}" disabled>
                            @include('alerts.feedback', ['field' => 'poli'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.viewpasien') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var notelpInput = document.querySelector('input[name="notelp"]');
            notelpInput.addEventListener('input', function () {
                notelpInput.value = notelpInput.value.replace(/[^0-9+]/g, '');
            });
        });
    </script>
@endsection