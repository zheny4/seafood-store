@extends('layouts.app')

@section('content')
    <h2>
        {{$product->title}}
        <span style="color: #e2000b;">
            {{ $product->on_sale == 1 ? __('silvex.products.create.on_sale.title') : '' }}
        </span>
    </h2>
    <img src='{{ $product->image_url }}' height="100px">
    <h3>@lang('silvex.products.price'): {{$product->price}}</h3>
    <h3>@lang('silvex.products.category'): @lang('silvex.products.category'.'.'.$product->category)</h3>
    <h4>@lang('silvex.products.description'): {{$product->description}}</h4>
    @if(Auth::check() and Auth::user()->role==='admin')
        <button onclick="location.href='/products/{{$product->id}}/edit'"
                type="button">
            @lang('silvex.products.edit')
        </button>
        {{-- TODO: Add confirmation dialog. --}}
        {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit(__('silvex.products.delete'))}}
        {!!Form::close()!!}
        <br>
    @endif
    <br>
    <small>@lang('silvex.products.products.added_on') {{$product->created_at}}</small>
@endsection