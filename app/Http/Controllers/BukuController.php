<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
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
        $bukus = Buku::paginate(2);
        return view('buku.index',compact('bukus'));
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $bukus = Buku::where('nama','LIKE',"%$keyword%")->paginate(16);
        return view('buku.index',compact('bukus'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
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
        'nama' => 'required',
        'harga_jual' => 'required',
        'harga_dasar' => 'required',
    ]);
        $flight = new Buku;

        $flight->nama = $request->nama;
        $flight->harga_jual = $request->harga_jual;
        $flight->harga_dasar = $request->harga_dasar;

        $flight->save();
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        $view = Buku::findOrFail($buku);
        return view('buku.detail',compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $edit = Buku::findOrFail($buku);
        return view('buku.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
        'nama' => 'required',
        'harga_jual' => 'required',
        'harga_dasar' => 'required',
    ]);
        $flight = Buku::findOrFail($buku);

        $flight->nama = $request->nama;
        $flight->harga_jual = $request->harga_jual;
        $flight->harga_dasar = $request->harga_dasar;

        $flight->save();
        return redirect('buku');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $flight = Buku::find($buku);

        $flight->delete();
        return redirect('buku');
    }
}
