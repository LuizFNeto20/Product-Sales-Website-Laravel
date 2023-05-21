<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function listar()
    {
        $produtos = Produto::orderBy('id')->get();
        return view(
            'Components/index',
            compact('produtos')
        );
    }
}
