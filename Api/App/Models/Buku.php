<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['judul', 'id_penulis','id_kategori'];
    protected $table ="buku";

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,  'id_kategori');
    }


}