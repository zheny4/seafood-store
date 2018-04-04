@extends('layouts.app')

@section('content')
    <h1>@lang('silvex.products.create')</h1>
    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST']) !!}
        <div>
            {{Form::label('title', __('silvex.products.create.title'))}}
            {{Form::text('title', '', ['placeholder' => __('silvex.products.create.title')])}}
        </div>
        <div>
            {{Form::label('category', __('silvex.products.create.category'))}}
            {{Form::select('category',
                           [
                            'fish' => __('silvex.products.create.category.fish'),
                            'fish_products' => __('silvex.products.create.category.fish_products'),
                            'accessories' => __('silvex.products.create.category.accessories')
                           ],
                           ['placeholder' => 'Description...'])}}
        </div>
        <div>
            {{Form::label('description', __('silvex.products.create.description'))}}
            {{Form::textarea('description', '', ['placeholder' => __('silvex.products.create.description.placeholder')])}}
        </div>
    {{Form::submit(__('silvex.products.create'))}}
    {!! Form::close() !!}
@endsection