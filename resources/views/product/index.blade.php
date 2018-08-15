@extends('layouts.aplikasi')
@section('title', 'Product List')
@section('content')
<h1>Product List</h1>
<a href="{{route('product.create')}}" class="btn btn-sm btn-info">Add New Product</a>
<table class="table table-striped table-condensed table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{$p->code}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->description}}</td>
            <td class="form-inline">
                <a href="{{route('product.edit',['id'=>$p->id])}}" class="btn btn-sm btn-primary">edit</a>
                &nbsp;
                {{ Form::open(array('url'=>'product/'.$p->id, 'class'=>'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('delete', array('class'=> 'btn btn-sm btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">    
                {{ $products->links() }}
            </td>
        </tr>
    </tfoot>
</table>
@endsection
