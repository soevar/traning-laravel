@extends('layouts.aplikasi')
@section('title', 'Product List')
@section('content')
<h1>Problem List</h1>
<a href="{{route('problem.create')}}" class="btn btn-sm btn-info">Add New Problem</a>

{{ Form::open(array('method'=>'get', 'url'=>'problem', 'class'=>'form-inline float-right')) }}
<div class="form-group">
    {{ Form::text('kata', null, ['class' => 'form-group mx-sm-3 mb-2', 'aria-label'=>'Search Title', 'placeholder'=>'Search Title']) }}
    {{ Form::submit('Search', ['class' => 'btn btn-primary mb-2']) }}
</div>
{{ Form::close() }}

<table class="table table-striped table-condensed table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Attachment</th>
            <th scope="col">Product</th>
            <th scope="col">User</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($problem as $p)
        <tr>
            <td>{{$p->title}}</td>
            <td>{{$p->description}}</td>
            <td>{{$p->attachment}}</td>
            <td>{{$p->product->code}}</td>
            <td>{{$p->user->name}}</td>
            <td class="form-inline">
                <a href="{{route('problem.edit',['id'=>$p->id])}}" class="btn btn-sm btn-primary">edit</a>
                &nbsp;
                {{ Form::open(array('url'=>'problem/'.$p->id, 'class'=>'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('delete', array('class'=> 'btn btn-sm btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">    
                {{ $problem->links() }}
            </td>
        </tr>
    </tfoot>
</table>
@endsection
