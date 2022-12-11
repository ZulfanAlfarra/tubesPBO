@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card my-5">
                <div class="card-header text-center fw-bold">
                    Bulan Ini
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="fw-bold">Pemasukan</pc>
                            <p class="fw-bold">Pengeluaran</p>
                            <p class="fw-bold mt-5">Saldo</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-success fw-bold">{{ @money($totalPemasukanBulanan) }}</p>
                            <p class="text-danger fw-bold">{{ @money($totalPengeluaranBulanan )}}</p>
                            <p class="text-info fw-bold mt-5">{{ @money($totalPemasukanBulanan - $totalPengeluaranBulanan) }}</p>
                        </div>
                    </div>
                </div>
                <a href="http://localhost/tubesPBO/public/laporanDetail" class="btn btn-info">Lihat Detail</a>
            </div>
        </div>
    </div>

    <p><span class="h5">{{$hari}}</span> {{ $today}} </p>
    <table class="table table-bordered mb-5 text-center">
    <thead>
        <tr>
            <th colspan="3" class="bg-success text-white">PEMASUKAN</th>
        </tr>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Taggal</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPemasukanToday as $key=>$value) 
        <tr>
            <td> {{ $key+1}} </td>
            <td> {{ $value->created_at}} </td>
            <td>{{ @money($value->uangMasuk) }}</td>
        </tr>

        @endforeach
        <tr class="table-secondary text-center">
            <th colspan="2">Total</th>
            <th>{{ @money($totalPemasukan) }}</th>
        </tr>
    </tbody>
    </table>

    <table class="table table-bordered text-center mb-5">
    <thead>
        <tr>
            <th colspan="4" class="bg-danger text-white">PENGELUARAN</th>
        </tr>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Taggal</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPengeluaranToday as $key=>$value) 
        <tr>
            <td> {{ $key+1}} </td>
            <td> {{ $value->created_at}} </td>
            <td>{{ $value->deskripsi }}</td>
            <td>{{@money($value->uangKeluar) }}</td>
        </tr>
        @endforeach
        <tr class="table-secondary text-center">
            <th colspan="3">Total</th>
            <th>{{ @money($totalPengeluaran) }}</th>
        </tr>
    </table>

@endsection