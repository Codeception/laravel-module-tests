@inject('converter', 'App\Utils\Contracts\StringConverterInterface')

@extends('layout')
<?php /** @var App\Utils\Contracts\StringConverterInterface $converter */ ?>
@section('content')
    <p class="converted">{{ $converter->convert('String To Convert') }}</p>
@endsection
