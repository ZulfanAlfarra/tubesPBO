@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card my-5">
                <div class="card-header text-center fw-bold">
                        Transaksi
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="fw-bold">Pemasukan</pc>
                                <p class="fw-bold">Pengeluaran</p>
                                <p class="fw-bold mt-5">Saldo</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-success fw-bold">{{ $pemasukan }}</p>
                                <p class="text-danger fw-bold">{{ $pengeluaran }}</p>
                                <p class="text-info fw-bold mt-5">{{ $saldo }}</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header fw-bold">
                Pemasukan
                </div>
                <div class="card-body">
                <form action="{{ url('awal') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="uangMasuk" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="uangMasuk" name="uangMasuk">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>                
                </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-header fw-bold">
            Pengeluaran
            </div>
            <div class="card-body">
                <form action="{{ url ('awal') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="uangKeluar" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="uangKeluar" name="uangKeluar">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- <div class="container text-center mt-5">
        <div class="row align-items-start">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title text-light">Saldo</h3>
                    </div>
                    <div class="card-body">
                    <p class="card-text h3 fw-bold">{{ $saldo }}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title text-light">Pemasukan</h3>
                    </div>
                    <div class="card-body">
                    <p class="card-text h3 fw-bold">{{ $pemasukan }}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h3 class="card-title text-light">Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                    <p class="card-text h3 fw-bold">{{ $pengeluaran }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection