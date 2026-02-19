@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard ZYGA</h1>
    <p>Bienvenido, {{ auth()->user()->nombre }}</p>
</div>
@endsection
