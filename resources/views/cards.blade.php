@extends('layouts/main')



@section('title','StoreItems')

@section('search')
<li class="nav-item">
  <form class="d-flex">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar Produto" aria-label="Buscar Produto" aria-describedby="button-addon2">
      <button class="btn btn-outline-light" type="submit" id="button-addon2">Buscar</button>
    </div>
    <a href="/dashboard" class="btn btn-success ms-3">Dashboard</a>
  </form>
</li>
@endsection

@section('main')
@foreach($produtos as $produto)
<div class="card m-1" style="width: 18rem;">
  <img src="/img/items/{{$produto->src}}" class="card-img-top" alt="{{$produto->nome}}">
  <div class="card-body">
    <h5 class="card-title">{{$produto->nome}}</h5>
    <p class="card-text item-descr">{{$produto->descricao}}</p>
    <hr class="money">
    <h6 class="card-text text-center">{{number_format($produto->valor,2,",",".")}}</h6>
    <hr>
    <div class="d-grid gap-2">
    <a href="/detalhes/{{$produto->id}}" class="btn btn-primary">Ver detalhes</a>
    </div>
  </div>
</div>
@endforeach

@endsection