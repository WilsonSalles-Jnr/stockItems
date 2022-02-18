@extends('layouts/main')

@section('title', 'Criar Produto')

@section('search')
<a href="/" class="btn btn-outline-light ms-3">Início</a>
<a href="/dashboard" class="btn btn-outline-light ms-3">Dashboard</a>
@endsection

@section('main')
<form action="/dashboard" method="POST" enctype="multipart/form-data" class="showcase">
  @csrf
  <!-- <article class="sc-descr">
    <img src="https://s2.glbimg.com/fPQS-2PM80vKZ8TNZBEQNp5ex3g=/0x0:695x574/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2021/V/W/z1AWGPStqtqrs1WphP1Q/2014-01-31-pc-desktop-compaq.jpg" class="card-img-top" alt="..."><br>
    
  </article> -->
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
      <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" maxlength="25">
    </div>
    @error('nome')
    <p class="error-text">{{$message}}</p>
    @enderror
    <hr>
    <div class="input-group">
      <label class="input-group-text" for="descricao">Descrição</label>
      <textarea cols="50" class="form-control @error('descricao') is-invalid @enderror" maxlength="250" rows="5" name="descricao" id="descricao"></textarea>
    </div><br>
    @error('descricao')
    <p class="error-text">{{$message}}</p>
    @enderror
    <div class="input-group mb-3">
      <label class="input-group-text" for="valor">R$ @error('valor') <span class="error-text"> *</span> @enderror</label>
      <input type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" id="valor">
      <label class="input-group-text" for="quantidade">Quantia @error('quantidade') <span class="error-text"> *</span> @enderror</label>
      <input type="text" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" id="quantidade">
        <label for="disponivel" class="input-group-text" id="basic-addon1">Disponível</label>
        <select name="disponivel" id="disponivel" class="form-select">
          <option value="1">Sim</option>
          <option value="0">Não</option>
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
      <button type="submit" class="btn btn-success">Criar</button>
      <a href="/dashboard" class="btn btn-danger">Voltar</a>
    </article>
  </article>
</form>

@endsection