@extends('site.template.template')
@section('content')

<div class="panel panel-default">
  <h1>Listagem de Produtos do banco</h1>

  <div class="panel-heading">Panel heading</div>

  <!-- Table -->
  <table class="table">
      <tr>
          <th>Nome</th>
          <th>Description</th>
      </tr>
      @forelse($products as $product)
      <tr>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      </tr>
      
      @empty
      <p>Não existem produtos cadastrados</p>
      @endforelse
  </table>
</div>
@endsection
@push('scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush