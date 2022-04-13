<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Producao;

class Voto extends Model
{
    protected $table = 'votos';
    protected $fillable = ['id', 'id_user', 'id_producao', 'voto'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function producao(){
        return $this->belongsTo(Producao::class, 'id_producao', 'id');
    }
}
