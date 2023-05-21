<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    function listar()
    {
        $produtos = Produto::orderBy('id')->get();

        return view(
            'Components/Listings/ListagemProdutos',
            compact('produtos')
        );
    }

    function novo()
    {
        $produto = new Produto();
        $produto->id = $produto->max('id') + 1;
        $produto->nome = "";
        $produto->preco = "";
        $categorias = Categoria::orderBy('nomecategoria')->get();
        $fornecedores = Fornecedor::orderBy('nomefornecedor')->get();
        return view("Components/Forms/FormProduto", compact('produto', 'categorias', 'fornecedores'));
    }

    function salvar(Request $request)
    {
        if ($request->input('id') == Produto::max('id') + 1) {
            $produto = new Produto();
        } else {
            $produto = Produto::find($request->input('id'));
        }

        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $arquivoSalvo = $arquivo->store('public/ImagensProdutos');
            $arquivoSalvo = explode("/", $arquivoSalvo);
            $tamanho = count($arquivoSalvo);
            if ($produto->img != "") {
                Storage::delete("public/ImagensProdutos/$produto->img");
            }
            $produto->img = $arquivoSalvo[$tamanho-1];
        }

        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->fornecedor_id = $request->input('fornecedor_id');
        $produto->save();

        return redirect('produto/listar');
    }

    function editar($id) {
        $produto = Produto::find($id);
        $categorias = Categoria::orderBy('nomecategoria')->get();
        $fornecedores = Fornecedor::orderBy('nomefornecedor')->get();
        return view("Components/Forms/FormProduto", compact('produto', 'categorias', 'fornecedores'));
    }

    function excluir($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('produto/listar');
    }
}