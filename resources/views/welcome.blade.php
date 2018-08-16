@extends('layouts.aplikasi')
@section('title', 'Aplikasi Helpdesk :: Home')
<link href="{{ asset('css\welcome.css') }}" rel="stylesheet">
@section('content')
<div class="content">
    <div class="title m-b-md">
        Helpdesk
    </div>

    <div class="links">
        <a href="{{URL::to('product')}}">Katalog</a>
        <a href="{{URL::to('problem')}}">Problem</a>
    </div>
</div>
@endsection
