<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';

    public function stockbuku()
    {
        return $this->hasMany('App\StockBuku');
    }
}

