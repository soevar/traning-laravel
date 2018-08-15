@extends('layouts.aplikasi')
@section('title', 'Create New List')
@section('content')
<h1>Create New Product</h1>
@if($errors->any())
<div class="aler alert-danger">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

{!! Form::open(['files'=>true,'route' => 'product.store']) !!}
<div class="form-group">
    {{ Form::label('code', 'Code', ['class' => 'control-label']) }}
    {{ Form::text('code', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('photo', 'Photo', ['class' => 'control-label']) }}
    {{ Form::file('photo', null, ['class' => 'form-control']) }}
</div>

{{ Form::submit('Create New Product', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection