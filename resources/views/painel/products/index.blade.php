@extends('painel.template')
@section('content')

  <h1 class="title-pg">Listagem de Produtos do banco</h1>
  
  <a href="{{route('produtos.create')}}" class="btn btn-primary btn-add"> <span class="glyphicon glyphicon-plus">Cadastrar</span> </a>
      

   <!-- Table -->
  <table class="table table-striped">
      <tr>
          <th>Nome</th>
          <th>Description</th>
          <th width="100px">Ações</th>
      </tr>
      @forelse($products as $product)
      <tr>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>
          <a href="{{route('produtos.edit', $product->id)}}"class="edit actions">
              <span class="glyphicon glyphicon-pencil"></span>
          </a>
          <a href="{{route('produtos.show',$product->id)}}" class="delete actions">
                 <span class="glyphicon glyphicon-eye-open"></span>
          </a>
      </td>
      </tr>
      
      @empty
      <p>Não existem produtos cadastrados</p>
      @endforelse
  </table>
   <{!!$products->links()!!}
   @endsection
