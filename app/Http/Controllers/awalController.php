<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pemasukan;
use App\Models\pengeluaran;


class awalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = DB::table('pengeluaran')->get();
        $pemasukan = DB::table('pemasukan')->get();
        $dataPengeluaran = 0;
        $dataPemasukan = 0;
        foreach ($pengeluaran as $keluar){
            $dataPengeluaran += $keluar->uangKeluar;
        }
        foreach ($pemasukan as $masuk){
            $dataPemasukan += $masuk->uangMasuk;
        }
        
        $pemasukan = $this->moneyFormat($dataPemasukan);
        $pengeluaran = $this->moneyFormat($dataPengeluaran);
        $saldo = $this->moneyFormat($dataPemasukan - $dataPengeluaran);
        return view('home.awal', compact(
            'pengeluaran', 'pemasukan', 'saldo'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masuk = new pemasukan;
        $masuk = new pengeluaran;
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->uangMasuk != null){
            $masuk = new pemasukan;
            $masuk->uangMasuk = $request->uangMasuk;
            $masuk->save();
            return redirect('awal');  
        } else {
            $keluar = new pengeluaran;
            $keluar->uangKeluar = $request->uangKeluar;
            $keluar->deskripsi = $request->deskripsi;
            $keluar->save();
            return redirect('awal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function moneyFormat($amount)
    {
        return 'Rp ' . number_format($amount, 0,',','.');
    }

    public function pertanggal($tanggalAwal,$tanggalAkhir){

        // $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        // $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $tglawal = $tanggalAwal;
        $tglakhir = $tanggalAkhir;

        return $tglakhir;
    }
}
