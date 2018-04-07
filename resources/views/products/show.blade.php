@extends('layouts.app')

@section('content')
    <h1>@lang('silvex.products.product') {{$product->title}}</h1>
    <h3>@lang('silvex.products.category'): @lang('silvex.products.category'.'.'.$product->category)</h3>
    <h4>@lang('silvex.products.description'): {{$product->description}}</h4>
    <a href="/products/{{$product->id}}/edit">@lang('silvex.products.edit')</a>
    <br>
    {{-- TODO: Add confirmation dialog. --}}
    {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit(__('silvex.products.delete'))}}
    {!!Form::close()!!}
    <br>
    <small>@lang('silvex.products.products.added_on') {{$product->created_at}}</small>
@endsection