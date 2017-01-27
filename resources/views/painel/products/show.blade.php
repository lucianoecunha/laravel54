@extends('painel.template')
@section('content')

<h1 class="title-pg"><a  class="glyphicon glyphicon-arrow-left
"href="{{route('produtos.index')}}">Voltar</a>Mostra {{$product->name or ''}}</h1>

@if(isset($errors) && count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif


  <p><b>Nome:</b> {{$product->name}}</p>
  <p><b>Numero:</b> {{$product->number}}</p>
  <p><b>Ativo:</b> {{$product->active}}</p>
  <p><b>Imagem:</b> {{$product->image}}</p>
  <p><b>Categoria:</b> {{$product->categoria}}</p>
  <p><b>Descrição:</b> {{$product->description}}</p>
  
  <hr>
  {!!Form::open(['route'=> ['produtos.destroy', $product->id],'method'=>'DELETE'])!!}
  {!!Form::submit("Deletar Produto: $product->name",['class'=> 'btn btn-danger'])!!}
  {!!Form::close()!!}
 @endsection
 
 <p class="text-center"> Paginação: {!!$product->paginate()!!}</p>
  
