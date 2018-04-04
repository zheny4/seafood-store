@extends('layouts.app')

@section('content')
    <h1>@lang('silvex.products.products')</h1>
    @if(count($products) > 1)
        @foreach($products as $product)
            <div>
                <h3><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
                <h4>@lang('silvex.products.category'): {{$product->category}}</h4>
                <h5>@lang('silvex.products.description'): {{$product->description}}</h5>
                <small>@lang('silvex.products.products.added_on') {{$product->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>@lang('silvex.products.products.none_found')</p>
    @endif
@endsection