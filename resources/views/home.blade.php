@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard Cek Ongkir - Raja Ongkir</div>
                <div class="card-body">
                    <!-- Data wilayah asal -->
                    <div class="form-group row">
                        <!-- Provinsi Asal -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Provinsi Asal</label>
                        <div class="col-md-4">
                            <select id="provinsi_asal" class="form-control" name="provinsi_asal">
                                @foreach($dataProvinsi as $provinsiAsal)
                                    <option value="$provinsiAsal->province_id">{{ $provinsiAsal->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Kota Asal -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Kota Asal</label>
                        <div class="col-md-4">
                            <select id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <option>Ok</option>
                            </select>
                        </div>
                    </div>

                    <!-- Data wilayah tujuan -->
                    <div class="form-group row">
                        <!-- Provinsi Tujuan -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Provinsi Tujuan</label>
                        <div class="col-md-4">
                            <select id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <option>Ok</option>
                            </select>
                        </div>
                        <!-- Kota Tujuan -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Kota Tujuan</label>
                        <div class="col-md-4">
                            <select id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <option>Ok</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-5"></div>
                    <hr>
                    <div class="my-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
