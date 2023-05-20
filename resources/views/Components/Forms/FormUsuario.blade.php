@extends('template')

@section('conteudo')
<h1>Cadastro de Usuário</h1>
<form action="{{url('usuario/salvar')}}" method="post">
    <input type="hidden" class="form-control" id="id" value="{{$usuario->id}}" name="id">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" value="{{$usuario->nome}}" name="nome">
    </div>

    <div class="mb-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" value="{{$usuario->cep}}">
    </div>

    <div class="mb-3">
        <label for="numero_casa" class="form-label">Numero da Casa</label>
        <input type="number" class="form-control" id="numero_casa" value="{{$usuario->numero_casa}}"
            name="numero_casa">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" value="{{$usuario->email}}" name="email">
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" value="{{$usuario->senha}}" name="senha">
    </div>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>
@endsection