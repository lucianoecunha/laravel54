@extends('site.template.template')

@section('content')
<h1>pagina index</h1>

{{$teste or ''}}

@if($teste == 123)
<p>eh igual</p>
@else
<p>eh diferente</p>
@endif

@unless($teste==123)

<p>nao é</p>

@endunless

@for($i=0;$i<10;$i++)
<p>i do for: {{$i}}</p>

@endfor

@foreach($arrayData as $array)

<p>for each do array {{$array}}</p>

@endforeach

@forelse($arrayData as $array)
<p>dados do forelse: {{$array}}</p>
@empty 
<p>array vazio</p>
@endforelse

@include('site.includes.sidebar', compact('teste'))

@endsection('content')
@push('scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush