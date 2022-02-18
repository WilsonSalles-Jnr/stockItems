@extends('layouts/main')

@section('title', $produto->nome)

@section('search')
<a href="/" class="btn btn-outline-light ms-3">Início</a>
@endsection

@section('main')

<section class="showcase">
  <img src="/img/items/{{$produto->src}}" class="card-img-top" alt="...">
  <article class="sc-descr">
    <h1>{{$produto->nome}}</h1>
    <hr>
    <p>{{$produto->descricao}}</p>
    <h3>R$ {{number_format($produto->valor,2,",",".")}}</h3>
    <article class="art-btn">
      @if($produto->disponivel)
      <button class="btn btn-success">Comprar</button>
      @else
      <button class="btn btn-danger disabled">Indisponível</button>
      @endif
    </article>
  </article>
</section>

@endsection