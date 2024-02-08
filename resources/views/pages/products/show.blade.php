@extends('layouts.master')

@section('title', 'Продукты | Tayoldo')

@section('content')
  <main class="container content product">
    <h1 class="title product__title">
      <span class="product__prescription">{{ $data['product']->prescription ?? '' }}</span>
      {{ $data['product']->title }}
    </h1>

    <img class="product__img" src="{{ asset('files/products/img/' . $data['product']->img) }}" alt="{{ $data['product']->title }}" width="560" height="560">
    <p class="product__descripiton">{{ $data['product']->description }}</p>
    @if ($data['product']->instruction)
      <a class="btn product__instruction" href="{{ asset('files/products/files/' . $data['product']->instruction) }}" target="_blank">Скачать инструкцию</a>
    @endif

    <x-product-card :product="$data['product']" :gainurl="true" />

    <div class="product__content simditor">{!! $data['product']->content ?? '' !!}</div>

    <section class="similar-products">
      <h2 class="title">{{ $data['similar-products-title'] }}</h2>
      <p class="txt subtitle">{{ $data['similar-products-subtitle'] }}</p>
    </section>

    <div class="our-products">
      @foreach ($data['similar-products'] as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </main>
@endsection
