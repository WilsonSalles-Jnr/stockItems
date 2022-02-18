@extends('layouts/main')

@section('title','Dashboard')

@section('search')
<a href="/" class="btn btn-outline-light ms-3">Início</a>
@endsection

@section('main')
<section class="mass-edit bg-primary bg-gradient bg-opacity-50">
  <form action="/dashboard" method="get">
    <div class="d-flex input-group-sm mb-3">
    <select class="input-group-text" name="tipo" id="tipo">
      <option value="nome">Nome</option>
      <option value="descricao">Descrição</option>
      <option value="valor maior">Valor maior que</option>
      <option value="valor menor">Valor menor que</option>
      <option value="valor igual">Valor igual a</option>
    </select>
    <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    <button class="btn btn-primary" type="submit">buscar</button>
  </div>
  </form>
  <label class="input-group-text bg-secondary bg-gradient bg-opacity-50" for="atualizar">Disponível: 
    <select class="input-group-text ms-3" name="atualizar" id="atualizar">
      <option value="Sim">Sim</option>
      <option value="Não">Não</option>
    </select>
  </label>
  <button class="btn btn-primary">Atualizar selecionados</button>
  <button class="btn btn-danger">Excluir selecionados</button>
  <a href="/criar" class="btn btn-success">Cadastrar Novo</a>
</section>
@if($req ?? '' ?? ''->search)
<div class="mass-edit bg-primary bg-gradient bg-opacity-50" >
  <p>Busca: {{$req->search}}</p> 
  <p>Resultado: {{count($produtos)}}</p>
  <form action="/dashboard" method="GET">
    <button type="submit" class="btn btn-outline-light">Limpar resultado de busca</button>
  </form>
</div>
@endif
<table class="table table-striped table-primary">
  <tr>
    <th>#</th>
    <th>Nome</th>
    <th class="tb-descr">Descrição</th>
    <th>Qtd</th>
    <th>Valor</th>
    <th>Disponível</th>
    <th>Detalhes</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>
  @foreach($produtos as $produto)
  <tr>
    <td><input type="checkbox" name="select" id="selector" value="{{$produto->id}}"></td>
    <td>{{$produto->nome}}</td>
    <td>{{$produto->descricao}}</td>
    <td>{{$produto->quantidade}}</td>
    <td>R$ {{number_format($produto->valor,2,",",".")}}</td>
    @if($produto->disponivel)
    <td>SIM</td>
    @else
    <td>NÃO</td>
    @endif
    <td><a href="/detalhes/{{$produto->id}}" class="icon icon-view"><ion-icon name="list-outline"></ion-icon></a></td>
    <td><a href="/editar/{{$produto->id}}" class="icon icon-edit"><ion-icon name="create-outline"></ion-icon></a></td>
    <td><a href="/deletar/{{$produto->id}}" class="icon icon-del"><ion-icon name="trash-outline"></ion-icon></a></td>
  </tr>
  @endforeach
</table>

@endsection