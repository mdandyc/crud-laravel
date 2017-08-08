<?php

namespace App\Http\Controllers;

use App\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
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
        $penerbit = Penerbit::paginate(2);
        return view('penerbit.index',compact('penerbit'));
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $penerbit = Penerbit::where('nama','LIKE',"%$keyword%")->paginate(16);
        return view('penerbit.index',compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create');
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
        'alamat' => 'required',
        'kontak' => 'required',
    ]);
        $flight = new Penerbit;

        $flight->nama = $request->nama;
        $flight->alamat = $request->alamat;
        $flight->kontak = $request->kontak;

        $flight->save();
        return redirect('penerbit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        $view = Penerbit::findOrFail($penerbit);
        return view('penerbit.detail',compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        $edit = Penerbit::findOrFail($penerbit);
        return view('penerbit.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
         $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
    ]);
        $flight = Penerbit::findOrFail($penerbit);

        $flight->nama = $request->nama;
        $flight->alamat = $request->alamat;
        $flight->kontak = $request->kontak;

        $flight->save();
        return redirect('penerbit');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $flight = Penerbit::find($penerbit);

        $flight->delete();
        return redirect('penerbit');
    }
}
