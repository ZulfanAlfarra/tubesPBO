<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Input;
use App\Models\pengeluaran;
use App\Models\pemasukan;
use Carbon\Carbon;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->endOfMonth()->addDays()->format('Y-m-d');

        $today = Carbon::today()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        $hari = Carbon::createFromFormat('Y-m-d', $today)->format('l');

        $totalPengeluaran = 0;
        $totalPengeluaranBulanan = 0;
        $totalPemasukan = 0;
        $totalPemasukanBulanan = 0;
        $totalBulanan = 0;


            $dataPengeluaran = pengeluaran::whereBetween('created_at',[$start,$end])->get();
            $dataPemasukan = pemasukan::whereBetween('created_at',[$start,$end])->get();
            $tanggalAwal = $start;
            $tanggalAkhir = $end;
            foreach ($dataPemasukan as $m =>$value){
                $totalPemasukanBulanan += $value->uangMasuk;
            }
            foreach ($dataPengeluaran as $k=>$value){
                $totalPengeluaranBulanan += $value->uangKeluar;
            }

        $dataPemasukanToday = pemasukan::whereBetween('created_at',[$today,$tomorrow])->get();
        $dataPengeluaranToday = pengeluaran::whereBetween('created_at',[$today,$tomorrow])->get();
        foreach ($dataPemasukanToday as $m =>$value){
            $totalPemasukan += $value->uangMasuk;
        }
        foreach ($dataPengeluaranToday as $k=>$value){
            $totalPengeluaran += $value->uangKeluar;
        }

        return view('home.laporan', compact(
            'datas','today','hari','dataPemasukanToday','dataPengeluaranToday', 'totalPengeluaran','totalPemasukan','totalPengeluaranBulanan','totalPemasukanBulanan','totalBulanan'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  laporan detail
    public function store(Request $request)
    {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->endOfMonth()->addDays()->format('Y-m-d');

        $today = Carbon::today()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        $totalPengeluaran = 0;
        $totalPemasukan = 0;

        if($tanggalAwal != null && $tanggalAkhir != null){
            $dataPengeluaran = pengeluaran::whereBetween('created_at',[$tanggalAwal,$tanggalAkhir])->get();
            $dataPemasukan = pemasukan::whereBetween('created_at',[$tanggalAwal,$tanggalAkhir])->get();
            foreach ($dataPemasukan as $m =>$value){
                $totalPemasukan += $value->uangMasuk;
            }
            foreach ($dataPengeluaran as $k=>$value){
                $totalPengeluaran += $value->uangKeluar;
            }
        }else {
            $dataPengeluaran = pengeluaran::whereBetween('created_at',[$start,$end])->get();
            $dataPemasukan = pemasukan::whereBetween('created_at',[$start,$end])->get();
            $end = Carbon::now()->endOfMonth()->format('Y-m-d');
            $tanggalAwal = $start;
            $tanggalAkhir = $end;
            foreach ($dataPemasukan as $m =>$value){
                $totalPemasukan += $value->uangMasuk;
            }
            foreach ($dataPengeluaran as $k=>$value){
                $totalPengeluaran += $value->uangKeluar;
            }
        }


        return view('home.laporanDetail', compact(
            'tanggalAwal','tanggalAkhir','dataPengeluaran','dataPemasukan','totalPengeluaran','totalPemasukan','start','end'
        ));
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

}
