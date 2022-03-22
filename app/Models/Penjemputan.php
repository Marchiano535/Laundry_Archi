<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjemputan extends Model
{
    use HasFactory;
    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'penjemputans';
    protected $fillable = ['id_member', 'petugas', 'status'];

    
    public function member()
    {
        return $this->belongsTo(member::class, 'id_member');
    }
}