<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    function listar()
    {
        $usuarios = Usuario::orderBy('id')->get();
        return view(
            'Components/Listings/ListagemUsuarios',
            compact('usuarios')
        );
    }

    function idAtual()
    {
        $usuario = new Usuario();
        $dado = $usuario->max('id');

        return $dado + 1;
    }

    function novo() {
        $usuario = new Usuario();
        $usuario->id = $this->idAtual();
        $usuario->nome = "";
        $usuario->cep = "";
        $usuario->numero_casa = "";
        $usuario->email = "";
        $usuario->senha = "";
        return view('Components/Forms/FormUsuario',
          compact('usuario'));
      }

    function salvar(Request $request) {
        if ($request->input('id') == $this->idAtual()) {
          $usuario = new Usuario();
        } else {
          $usuario = Usuario::find($request->input('id'));
        }
  
        /*if ($request->hasFile('arquivo')) {
          $arquivo = $request->file('arquivo');
          $arquivoSalvo = $arquivo->store('public/imagens');
          $arquivoSalvo = explode("/", $arquivoSalvo);
          $tamanho = count($arquivoSalvo);
          if ($autor->figura != "") {
            Storage::delete("public/imagens/$autor->figura");
          }
          $autor->figura = $arquivoSalvo[$tamanho-1];
        }*/
  
        $usuario->nome = $request->input('nome');
        $usuario->cep = $request->input('cep');
        $usuario->numero_casa = $request->input('numero_casa');
        $usuario->email = $request->input('email');
        $usuario->senha = $request->input('senha');

        $usuario->save();

        return redirect('/');
      }

    /*function editar($id)
    {
        $modelo = new Usuario();
        $usuario = $modelo->getById($id);

        $this->view("formUsuario", compact('usuario'));
    }

    function excluir($id)
    {
        $modelo = new Usuario();
        $modelo->delete($id);

        $this->redirect('usuario/listar');
    }*/
}