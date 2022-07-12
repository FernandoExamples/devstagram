@extends('layouts.app')

@section('title')
    Pagina Principal
@endsection

@section('content')
    <x-post-list :posts="$posts" />
@endsection
