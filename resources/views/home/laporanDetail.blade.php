@extends('layouts.layout')

@section('content')

    <div class="d-print-none">
        <form class="row" action="{{ url('laporanDetail') }}" method="GET">
        @csrf 
        <div class="col-auto my-3">
            <label for="tanggalAwal" class="form-label">Dari Taggal</label>
            <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal">
        </div>
        <div class="col-auto my-3">
            <label for="tanggalAkhir" class="form-label">Sampai Taggal</label>
            <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir">
        </div>
        <div class="col-auto my-3">
            <br>
            <button type="submit" class="btn btn-success mt-2">Cari</button>
        </div>
        <div class="col-auto my-3">
            <br>
            <button type="button" class="btn btn-danger mt-2" onclick="window.print()">Print</button>
        </div>
        </form>
    </div>

    <div class="d-none d-print-block h3 fw-bold text-center">Laporan Keuangan</div>
    <p class="mb-3 mt-5 h4">{{$tanggalAwal}} / {{$tanggalAkhir}}</p>

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
        @foreach ($dataPemasukan as $key=>$value) 
        <tr>
            <td>{{ $key+1}} </td>
            <td>{{ $value->created_at}} </td>
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
        @foreach ($dataPengeluaran as $key=>$value) 
        <tr>
            <td> {{ $key+1}} </td>
            <td> {{ $value->created_at}} </td>
            <td>{{ $value->deskripsi }}</td>
            <td>{{@money($value->uangKeluar) }}</td>
        </tr>
        @endforeach
        <tr class="table-secondary text-center">
            <th colspan="3">Total</th>
            <th>{{ @money($totalPengeluaran)}}</th>
        </tr>
    </table>

    <table class="table table-bordered text-center mb-5">
    <thead>
        <tr>
            <th colspan="4" class="bg-info text-white">SALDO</th>
        </tr>
        <tr>
            <th scope="col">Pemasukan</th>
            <th scope="col">Pengeluaran</th>
            <th scope="col" class="table-secondary">Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{@money($totalPemasukan)}}</td>
            <td>{{@money($totalPengeluaran)}}</td>
            <td class="table-secondary">{{@money($totalPemasukan-$totalPengeluaran)}}</td>
        </tr>
    </table>


@endsection
