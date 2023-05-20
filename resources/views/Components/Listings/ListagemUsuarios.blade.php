@extends('template')

@section('conteudo')
    <h1 class="text-center mb-5">Listagem de Usuários</h1>
    <table class="table table-hover w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>IMAGEM</th>
            <th>Nome</th>
            <th>CEP</th>
            <th>Número da Casa</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td><i class='fa-solid fa-circle-user fs-3 me-3'></i></td>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->cep}}</td>
            <td>{{$usuario->numero_casa}}</td>
            <td>{{$usuario->email}}</td>
            <td><a class='btn btn-primary' href='#'>+</a></td>
            <td><a class='btn btn-danger' href='#'>-</a></td>
        </tr>
      @endforeach

    </tbody>
    </table>
@endsection