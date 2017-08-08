<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockBuku extends Model
{
    protected $table = 'stockbuku';

    public function buku()
	{
    return $this->belongsTo('App\Buku');
	}

	public function penerbit()
	{
    return $this->belongsTo('App\Penerbit');
	}
}
