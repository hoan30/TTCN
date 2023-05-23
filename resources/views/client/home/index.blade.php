@extends('client.layout.app')

@section('title')
    <title>
        Trang chủ
    </title>
    <meta name="description" content="" />
@endsection

@section('body')
    <x-breadcrumb />

    <x-title />
    @include('client.home.content')
@endsection
