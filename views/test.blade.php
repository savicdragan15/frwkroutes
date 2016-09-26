@extends('layout')

@section('content')

    {{ dump($data) }}
    {{ $data->ID }} <br>
    {{ $data->product_description }}
    
@endsection