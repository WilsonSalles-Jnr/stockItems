<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
  //
  public function home() {
    $produto = Product::all();
    return view('cards', ['produtos' => $produto]);
  }

  public function dashboard(Request $request) {
    $produto = Product::all();
    $request;
    $name;
    if($request->tipo) {
      switch($request->tipo) {
        case 'valor maior':
          $name = Product::where('valor','>=',$request->search)->get();
          break;
        case 'valor menor':
          $name = Product::where('valor','<=',$request->search)->get();
          break;
        case 'valor igual':
          $name = Product::where('valor','==',$request->search)->get();
          break;
        default:
          $name = Product::where($request->tipo,'LIKE','%'.$request->search.'%')->get();
          
      }
      return view('dashboard', ['produtos' => $name, 'req' => $request]);
    };
    return view('dashboard', ['produtos' => $produto]);
  }

  public function detail() {
    $produto = Product::all();
    return view('detailList', ['produtos' => $produto]);
  }

  public function productDetail($id) {
    $produto = Product::findOrFail($id);
    return view('detail', ['produto' => $produto]);
  }

  public function editar($id) {
    $produto = Product::findOrFail($id);
    return view('edit', ['produto' => $produto]);
  }

  public function create() {
    return view('create');
  }

  public function store(StoreItemRequest $request) {
    $item = new Product;
    
    $item->nome = $request->nome;
    $item->descricao = $request->descricao;
    $item->valor = $request->valor;
    $item->quantidade = $request->quantidade;
    $item->disponivel = $request->disponivel;
    
    if ($request->hasFile('src') && $request->file('src')->isValid()) {
      $requestImage = $request->src;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

      $requestImage->move(public_path('img/items'), $imageName);

      $item->src = $imageName;
    }

    $item->save();

    return redirect('/dashboard')->with('msg', 'Produto cadastrado com sucesso!');
  }
  
  public function update(StoreItemRequest $request) {
    $data = $request->all();

    if ($request->hasFile('src') && $request->file('src')->isValid()) {
      $requestImage = $request->src;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

      $requestImage->move(public_path('img/items'), $imageName);

      $data['src'] = $imageName;
    }

    Product::findOrFail($request->id)->update($data);

    return redirect('/dashboard')->with('change', 'Produto editado com sucesso!');
  }

  public function delete($id) {
    $produto = Product::findOrFail($id);

    return view('delete', ['produto' => $produto]);
  }

  public function destroy($id) {
    Product::findOrFail($id)->delete();

    return redirect('/dashboard')->with('change','Produto excluído');
  }
}
