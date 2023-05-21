@extends('template')

@section('conteudo')
  <div class="d-flex flex-wrap">
    @foreach($produtos as $produto)
      <div class='col-sm-6 col-md-3 mb-3 text-center'>
        <div class='card' style='margin-right: 10px; margin-bottom: 10px;'>
        @if($produto->img != "")
              <img alt="" class='card-img-top' src="/storage/ImagensProdutos/{{$produto->img}}">
            @endif
          <div class='d-flex mt-2' style='margin: 0 0 0 30%'>
            @if (isset($media))
              @for ($i = 0; $i < 5; $i++)
                @if ($i >= $media)
                  <i class='fa-regular fa-star fs-6 star'></i>
                @else
                  <i class='fa-solid fa-star' style='color: #ecdb18;'></i>
                @endif
              @endfor
            @else
              @for ($i = 0; $i < 5; $i++)
                <i class='fa-regular fa-star fs-6 star'></i>
              @endfor
            @endif
          </div>
          <div class='card-body'>
            <h5 class='card-title'>{{$produto->nome}}</h5>
            <p class='card-text'>Preço: R${{$produto->preco}}</p>
            <a href="#" class='btn btn-dark'>Ver produto</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
