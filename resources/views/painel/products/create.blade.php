@extends('painel.template');
@section('content')
<h1 class="title-pg">
@if(isset($produto))    
Editar produto
@else 
Cadastrar Produto
@endif
</h1>
@if(isset($errors) && count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>

@endif

@if(isset($product))

{!! Form::model($product,['route'=>['produtos.update',$product->id], 'class'=>'form','method'=>'put'])!!}

@else    
{!! Form::open(['route'=>'produtos.store', 'class'=>'form'])!!}
@endif


<div class="form-group">
    {!!Form::text('name', null,['placeholder' => 'nome', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::text('number', null,['placeholder' => 'numero', 'class'=>'form-control']) !!}

</div>
<div class="form-group">
    <label>Ativo
        {!!Form::checkbox('active')!!}
    </label>
</div>
<div class="form-group">
    {!!Form::text('image', null,['placeholder' => 'image', 'class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!!Form::select('categoria', $categories , null,['placeholder' => 'selecione a opcao', 'class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::textarea('description', null,['placeholder' => 'description', 'class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!!Form::submit('Enviar',['class'=>'button btn-primary'])!!}
</div>



{!!Form::close()!!}
@endsection
