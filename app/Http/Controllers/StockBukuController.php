<?php

namespace App\Http\Controllers;

use App\StockBuku;
use App\Buku;
use App\Penerbit;
use Illuminate\Http\Request;

class StockBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $stockbuku = StockBuku::paginate(2);
        return view('stockbuku.index',compact('stockbuku'));
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $stockbuku = StockBuku::where('tgl_masuk','LIKE',"%$keyword%")->paginate(16);

        return view('stockbuku.index',compact('stockbuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bukus = Buku::all();
        $penerbits = Penerbit::all();

        return view('stockbuku.create',compact(['bukus'],['penerbits']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        'tgl_masuk' => 'required',
        'buku_id' => 'required',
        'penerbit_id' => 'required',
        'jumlah' => 'required',
    ]);
        $flight = new StockBuku;

        $flight->tgl_masuk = $request->tgl_masuk;
        $flight->buku_id = $request->buku_id;
        $flight->penerbit_id = $request->penerbit_id;
        $flight->jumlah = $request->jumlah;

        $flight->save();
        return redirect('stockbuku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockBuku  $stockBuku
     * @return \Illuminate\Http\Response
     */
    public function show(StockBuku $stockbuku)
    {
        $view = StockBuku::findOrFail($stockbuku);
        return view('stockbuku.detail',compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockBuku  $stockBuku
     * @return \Illuminate\Http\Response
     */
    public function edit(StockBuku $stockbuku)
    {
        $bukus = Buku::all();
        $penerbits = Penerbit::all();
        $stockbuku = StockBuku::findOrFail($stockbuku);
        return view('stockbuku.edit',compact(['bukus'],['penerbits'],['stockbuku']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockBuku  $stockBuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockBuku $stockbuku)
    {
        $this->validate($request, [
        'tgl_masuk' => 'required',
        'buku_id' => 'required',
        'penerbit_id' => 'required',
        'jumlah' => 'required',
    ]);
        $flight = StockBuku::findOrFail($stockbuku);

        $flight->tgl_masuk = $request->tgl_masuk;
        $flight->buku_id = $request->buku_id;
        $flight->penerbit_id = $request->penerbit_id;
        $flight->jumlah = $request->jumlah;

        $flight->save();
        return redirect('stockbuku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockBuku  $stockBuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockBuku $stockbuku)
    {
         $flight = StockBuku::find($stockbuku);

        $flight->delete();
        return redirect('stockbuku');
    }
}
