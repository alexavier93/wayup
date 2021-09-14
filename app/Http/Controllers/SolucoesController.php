<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Models\SolutionItem;
use Illuminate\Http\Request;

class SolucoesController extends Controller
{
    public function index()
    {
        
        $solucoes = Solution::all();

        return view('solucoes.index', compact('solucoes'));
    }

    public function info($solucao)
    {


        $solucao = Solution::where('slug', $solucao)->firstOrFail();

        $solucao_itens = SolutionItem::where('solution_id', $solucao->id)->get();


        return view('solucoes.info',  compact('solucao', 'solucao_itens'));

    }
}
