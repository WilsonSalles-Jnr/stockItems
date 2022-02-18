@extends('layouts/main')

@section('title', $produto->nome)

@section('search')
<a href="/" class="btn btn-outline-light ms-3">Início</a>
@endsection

@section('main')

<section class="showcase">
  <img src="/img/items/{{$produto->src}}" class="card-img-top" alt="...">
  <article class="sc-descr">
    <h1 class="text-center">|O seguinte item será excluído|</h1>
    <h2>{{$produto->nome}}</h2>
    <hr>
    <p>{{$produto->descricao}}</p>
    <h3>{{$produto->valor}}</h3>
    <article class="art-btn">
      <form action="/deletar/{{$produto->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
      <a href="/dashboard" class="btn btn-primary ms-3">Voltar</a>
    </article>
  </article>
</section>

@endsection