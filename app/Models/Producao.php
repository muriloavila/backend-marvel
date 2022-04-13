<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voto;

class Producao extends Model
{
    protected $table = 'producao';
    protected $fillable = ['name', 'tipo', 'data_lancamento', 'fase', 'link_picture', 'descricao'];

    public function votos(){
        return $this->hasMany(Voto::class, 'id_producao');
    }
}
