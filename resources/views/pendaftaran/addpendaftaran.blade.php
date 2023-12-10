@extends('layouts.app', ['page' => __('Daftar'), 'pageSlug' => 'addpendaftaran'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Pendaftaran Pasien') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.savependaftaran') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')
                        <div class="form-group{{ $errors->has('namapasien') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama Pasien') }}</label>
                            <input type="text" name="namapasien" class="form-control{{ $errors->has('namapasien') ? ' is-invalid' : '' }}" placeholder="{{ __('Namapasien') }}" value="{{ old('namapasien') }}">
                            @include('alerts.feedback', ['field' => 'namapasien'])
                        </div>
                        <!-- <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                            <label>{{ __('Poli') }}</label>
                            <select name="poli" class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Poli') }}</option>
                                <option style="color: black;" value="Spesialis Anak" {{ old('poli') == 'Spesialis Anak' ? 'selected' : '' }}>{{ __('Spesialis Anak') }}</option>
                                <option style="color: black;" value="Splesialis Bedah" {{ old('poli') == 'Splesialis Bedah' ? 'selected' : '' }}>{{ __('Splesialis Bedah') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik" {{ old('poli') == 'Splesialis Gizi Klinik' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan 1" {{ old('poli') == 'Splesialis Kandungan 1' ? 'selected' : '' }}>{{ __('Splesialis Kandungan 1') }}</option>
                                <option style="color: black;" value="Splesialis kandungan 2" {{ old('poli') == 'Splesialis kandungan 2' ? 'selected' : '' }}>{{ __('Splesialis kandungan 2') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'poli'])
                        </div> -->
                        <div class="form-group{{ $errors->has('tanggaldaftar') ? ' has-danger' : '' }}">
                            <label>{{ __('Tanggal daftar') }}</label>
                            <input type="date" name="tanggaldaftar" class="form-control{{ $errors->has('tanggaldaftar') ? ' is-invalid' : '' }}" value="{{ old('tanggaldaftar') }}">
                            @include('alerts.feedback', ['field' => 'tanggaldaftar'])
                        </div>
                        <div class="form-group{{ $errors->has('jadwal') ? ' has-danger' : '' }}">
                            <label>{{ __('Jadwal Dokter') }}</label>
                            <select name="Senin" class="form-control{{ $errors->has('Senin') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00" {{ old('jadwal') == 'Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00' ? 'selected' : '' }}>{{ __('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00') }}</option>
                            </select>
                            <select name="Selasa" class="form-control{{ $errors->has('Selasa') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00" {{ old('jadwal') == 'Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00' ? 'selected' : '' }}>{{ __('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00') }}</option>
                            </select>
                            <select name="Rabu" class="form-control{{ $errors->has('Rabu') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00" {{ old('jadwal') == 'Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00' ? 'selected' : '' }}>{{ __('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00') }}</option>
                            </select>
                            <select name="Kamis" class="form-control{{ $errors->has('Kamis') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00" {{ old('jadwal') == 'Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00' ? 'selected' : '' }}>{{ __('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr.  Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr.  Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr.  Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00') }}</option>
                            </select>
                            <select name="Jumat" class="form-control{{ $errors->has('Jumat') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00" {{ old('jadwal') == 'Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00' ? 'selected' : '' }}>{{ __('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00') }}</option>
                            </select>
                            <select name="Sabtu" class="form-control{{ $errors->has('Sabtu') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                                <option style="color: black;" value="Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00" {{ old('jadwal') == 'Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00' ? 'selected' : '' }}>{{ __('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00') }}</option>
                                <option style="color: black;" value="Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30" {{ old('jadwal') == 'Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30' ? 'selected' : '' }}>{{ __('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30') }}</option>
                                <option style="color: black;" value="Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00" {{ old('jadwal') == 'Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00' ? 'selected' : '' }}>{{ __('Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'jadwal'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Save') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.viewpendaftaran') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection