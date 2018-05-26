@extends('layouts.app')

@section('content')
    <h1>@lang('silvex.products.edit')</h1>
    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST']) !!}
    <div>
        {{Form::label('title', __('silvex.products.create.title'))}}
        {{Form::text('title', $product->title, ['placeholder' => __('silvex.products.create.title')])}}
    </div>
    <div>
        {{Form::label('category', __('silvex.products.create.category'))}}
        {{Form::select('category',
                       [
                        'fish' => __('silvex.products.create.category.fish'),
                        'fish_products' => __('silvex.products.create.category.fish_products'),
                        'accessories' => __('silvex.products.create.category.accessories')
                       ],
                       ['value' => $product->category])}}
    </div>
    <div>
        {{Form::label('image_url', __('silvex.products.create.image_url'))}}
        {{Form::text('image_url', $product->image_url, ['placeholder' => __('silvex.products.create.image_url')])}}
    </div>
    <div>
        {{Form::label('price', __('silvex.products.create.price'))}}
        {{Form::number('price', $product->price, ['class' => 'form-control','step'=>'any'])}}
    </div>
    <div>
        {{Form::label('on_sale', __('silvex.products.create.on_sale'))}}
        {{Form::checkBox('on_sale', 1, $product->on_sale == 1)}}
    </div>
    <div>
        {{Form::label('description', __('silvex.products.create.description'))}}
        {{Form::textarea('description', $product->description, ['placeholder' => __('silvex.products.create.description.placeholder')])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit(__('silvex.products.edit.save'))}}
    {!! Form::close() !!}
@endsection