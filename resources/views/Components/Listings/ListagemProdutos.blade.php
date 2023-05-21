@extends('template')

@section('conteudo')
<!-- {{var_dump($produtos)}} -->
    <h1 class="text-center mb-5">Listagem de Produtos</h1>
    <table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Imagem</th>
      <th>Nome</th>
      <th>Preco Unitário</th>
      <th>Fornecedor</th>
      <th>Categoria</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>
            @if($produto->img != "")
              <img alt="" style="width:50px;height:50px;object-fit:cover" src="/storage/ImagensProdutos/{{$produto->img}}">
            @endif
            </td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->preco}}</td>
            <td>{{$produto->fornecedor->nomefornecedor}}</td>
            <td>{{$produto->categoria->nomecategoria}}</td>
            <td><a class='btn btn-primary' href='editar/{{$produto->id}}'>+</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$produto->id}}'>-</a></td>
        </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary mb-2" href="novo">Novo</a>
@endsection