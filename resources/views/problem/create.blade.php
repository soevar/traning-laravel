@extends('layouts.aplikasi')
@section('title', 'Create New Problem')
@section('content')
<h1>Create New Problem</h1>
@if($errors->any())
<div class="aler alert-danger">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

{!! Form::open(['files'=>true, 'route' => 'problem.store']) !!}
<div class="form-group">
    {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('product_id', 'Product', ['class' => 'control-label']) }}
    {{ Form::select('product_id', $products) }}
</div>

<div class="form-group">
    {{ Form::label('user_id', 'User', ['class' => 'control-label']) }}
    {{ Form::select('user_id', $users) }}
</div>

<div class="form-group">
    {{ Form::label('attachment', 'Attachment', ['class' => 'control-label']) }}
    {{ Form::file('attachment', null, ['class' => 'form-control']) }}
</div>

{{ Form::submit('Create New Problem', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection