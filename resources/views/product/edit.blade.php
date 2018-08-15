@extends('layouts.aplikasi')
@section('title', 'Edit Product')
@section('content')
<h1>Edit Product</h1>
@if($errors->any())
<div class="aler alert-danger">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

{!! Form::model($product, [ 'method' => 'PATCH', 'route' => ['product.update',$product->id]]) !!}
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

{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection