<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music_Table extends Model
{
    use HasFactory;
    protected $table = 'music_table';
    // protected $fillable = ['music_name', 'music_writer'] dll dan ini sangat panjang jika tulis satu2

    // ini artinya semua field blh diisi secara massal, tidak ada yang dijaga
    protected $guarded = [];
}
