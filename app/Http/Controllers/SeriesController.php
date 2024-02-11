<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome', 'asc')->get();
        $mensagem = $request->session()->get('mensagem.sucesso'); // PEGA A MENSAGEM DE SUCESSO DA SESSÃO

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagem); //ENVIA PARA A VIEW AS INFORMAÇÕES COMO SERIE E A MENSAGEM

    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = new Serie();
        $serie->nome = $request->input('nome');
        $serie->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso"); //REDIRECIONA PARA O INDEX, A LISTAGEM DE SÉRIES
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!"); //CRIA UMA MENSAGEM CASO TENHA SIDO EXCLUIDO COM SUCESSO - METODO FLASH É UM DADO QUE VC ADICIONA NA SESSÃO QUE SÓ DURA 1 REQUEST    }
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}
