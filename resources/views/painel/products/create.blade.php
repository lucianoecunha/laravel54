@extends('painel.template');
@section('content')
<h1 class="title-pg">Cadastro de Produtos do banco</h1>
@if(isset($errors) && count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>

@endif

<form class="form" method="post" action="{{route('produtos.store')}}">
    <input type="hidden" name='_token' value="{{csrf_token()}}">
    <div class="form-group">
        <input type="text" name='name' placeholder="Nome: " class="form-control" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <input type="text" name='number' placeholder="Numero: " class="form-control"value="{{old('number')}}">
    </div>
    <div class="form-group">
        <label>Ativo
            <input type="checkbox" name='active' value ="1" placeholder="Ativar: ">
        </label>
    </div>
    <div class="form-group">
        <input type="text" name='image' placeholder="Image: " class="form-control" value="{{old('image')}}">
    </div>
    <div class="form-group">
        <select name="categoria" class="form-control"value="{{old('categoria')}}">
            <option value="">Selecione a opção</option>
            @foreach($categories as $category)
            <option value="{{$category}}">{{$category}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <textarea name="description" placeholder="Descrição: " class="form-control"value="{{old('description')}}"></textarea>
    </div>
    <div class="form-group">
        <button class="button btn-primary">Enviar</button>
    </div>



</form>
@endsection
