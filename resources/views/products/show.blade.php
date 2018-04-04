@extends('layouts.app')

@section('content')
    <h1>@lang('silvex.products.product') {{$product->title}}</h1>
    <h3>@lang('silvex.products.category'): {{$product->category}}</h3>
    <h4>@lang('silvex.products.description'): {{$product->description}}</h4>
    <small>@lang('silvex.products.products.added_on') {{$product->created_at}}</small>
@endsection