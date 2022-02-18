@extends('layouts/main')

@section('title', 'Editar')

@section('search')
<a href="/" class="btn btn-outline-light ms-3">Início</a>
<a href="/dashboard" class="btn btn-outline-light ms-3">Dashboard</a>
@endsection

@section('main')
<form action="/editar/{{$produto->id}}" method="POST" enctype="multipart/form-data" class="showcase">
  @csrf
  @method('PUT')
  <article class="sc-descr">
    <img src="/img/items/{{$produto->src}}" class="card-img-top" alt="..."><br>
    
  </article>
  <article class="sc-descr">
    @if($errors->any())
    <ul class="error-list">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif

    <div class="input-group mb-3">
      <input type="file" name="src" class="form-control @error('src') is-invalid @enderror" id="src">
    </div>
    @error('src')
    <p class="error-text">{{$message}}</p>
    @enderror
    <div class="input-group mb-3">
      <label for="nome" class="input-group-text" id="basic-addon1">Nome</label>
      <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" maxlength="25" value="{{$produto->nome}}">
    </div>
    @error('nome')
    <p class="error-text">{{$message}}</p>
    @enderror
    <hr>
    <div class="input-group">
      <label class="input-group-text" for="descricao">Descrição</label>
      <textarea cols="50" class="form-control @error('descricao') is-invalid @enderror" maxlength="250" rows="5" name="descricao" id="descricao">{{$produto->descricao}}</textarea>
    </div><br>
    @error('descricao')
    <p class="error-text">{{$message}}</p>
    @enderror
    <div class="input-group mb-3">
      <label class="input-group-text" for="valor">R$ @error('valor') <span class="error-text"> *</span> @enderror</label>
      <input type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" id="valor" value="{{$produto->valor}}">
      <label class="input-group-text" for="quantidade">Quantia @error('quantidade') <span class="error-text"> *</span> @enderror</label>
      <input type="text" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" id="quantidade"  value="{{$produto->quantidade}}">
        <label for="disponivel" class="input-group-text" id="basic-addon1">Disponível</label>
        <select name="disponivel" id="disponivel" class="form-select">
          
          <option value="1">Sim</option>
          <option value="0" {{$produto->disponivel === 0 ? "selected='selected'" : ""}}>Não</option>
          
        </select>
    </div>
    @error('valor')
    <p class="error-text">* campos obrigatórios</p>
    @enderror
    @error('quantidade')
    <p class="error-text">* campos obrigatórios</p>
    @enderror
    <br>
    <article class="art-btn gap-2">
      <button type="submit" class="btn btn-success">Editar</button>
      <a href="/dashboard" class="btn btn-danger">Voltar</a>
    </article>
  </article>
</form>

@endsection