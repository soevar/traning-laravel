@extends('layouts.aplikasi')
@section('title', 'Edit Problem')
@section('content')
<h1>Edit Problem</h1>
@if($errors->any())
<div class="aler alert-danger">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

{!! Form::model($problem, ['files'=>true, 'method' => 'PATCH', 'route' => ['problem.update', $problem->id]]) !!}
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

{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection