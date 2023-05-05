<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class listTarefas extends Model
{
    protected $table = 'list_tarefas'; // nome da tabela correspondente no banco de dados
    
    protected $fillable = ['Descricao', 'Finalizado']; // colunas da tabela
}
