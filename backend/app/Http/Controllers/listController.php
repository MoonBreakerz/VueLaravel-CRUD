<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listTarefas;


class listController extends Controller
{
    public function listagem(Request $request)
    {
        $listTarefas = new listTarefas();
        $tarefas = $listTarefas->all();
        return response()->json($tarefas);
    }

public function getById($id)
{
    $listTarefas = new listTarefas();
    $tarefa = $listTarefas->find($id);
    return response()->json($tarefa);
}


    public function adicionar(Request $request)
    {
        $newtarefa = new listTarefas();
        $newtarefa->descricao = $request['descricao'];

        $newtarefa->finalizado = 'nao';
        $newtarefa->save();
        return response()->json('sucess');
    }

    public function editar($id, Request $request)
    {
        $listTarefas = new listTarefas();
        $tarefa = $listTarefas->find($id);

        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        // atualizar a tarefa com os dados do request
        $tarefa->update($request->all());

        return response()->json($tarefa);
    }


    public function update(Request $request, $id)
    {
        $tarefas = listTarefas::findOrFail($id);
        $tarefas->Descricao = $request->input('Descricao');
        $tarefas->Finalizado = $request->input('Finalizado');
        $tarefas->save();
        return response()->json('success');
    }


    public function delete($id)
    {
        $tarefa = listTarefas::find($id);

        $tarefa->delete();

    }


    //
}
