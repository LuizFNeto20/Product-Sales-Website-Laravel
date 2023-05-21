@extends('template')

@section('conteudo')

@if($produto->img != "")
    <img style="width:150px;height:150px;object-fit:cover;border-radius:20px;border:1px solid gray;padding: 0.25rem" src="/storage/ImagensProdutos/{{$produto->img}}">
@endif

<h1>Cadastro de Produto</h1>
<form action="{{url('produto/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input readonly type="text" class="form-control" id="id" value="{{$produto->id}}" name="id">
    </div>
    <div class="mb-3">
      <label for="arquivo" class="form-label">Imagem</label>
      <input class="form-control" type="file" name="arquivo" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" value="{{$produto->nome}}" name="nome">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" class="form-control" id="preco" value="{{$produto->preco}}" name="preco">
    </div>

    <div class="mb-3">
        <label for="fornecedor" class="form-label">Fornecedor</label>
        <select class="form-select" name="fornecedor_id" id="fornecedor_id">
            @foreach ($fornecedores as $fornecedor)
                <option {{$fornecedor->id==old('fornecedor_id',$produto->fornecedor_id)? 'selected':''}} value="{{$fornecedor->id}}">{{$fornecedor->nomefornecedor}}</option>
            @endforeach
        </select>
    </div>

    <a class="btn btn-primary mb-2" href="#">Cadastrar fornecedor</a>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" name="categoria_id" id="categoria_id">
            @foreach($categorias as $categoria)
                <option {{$categoria->id==old('categoria_id',$produto->categoria_id)? 'selected':''}} value="{{$categoria->id}}">{{$categoria->nomecategoria}}</option>
            @endforeach
        </select>
    </div>

    <a class="btn btn-primary mb-4" href="#">Cadastrar categoria</a>

    <br>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>
@endsection