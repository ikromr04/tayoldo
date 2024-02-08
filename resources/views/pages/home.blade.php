@extends('layouts.master')

@section('title', 'Главная | Tayoldo')

@section('content')
  <main class="container content">
    <div class="vitrin home__vitrin">
      <div class="vitrin__inner">
        <h1 class="title vitrin__title" data-text="home-vitrin-title">{{ $data['home-vitrin-title'] }}</h1>
        <p class="txt subtitle" data-text="home-vitrin-subtitle">{{ $data['home-vitrin-subtitle'] }}</p>

        <a class="btn vitrin__btn" href="{{ route('products') }}">Наши продукты</a>
      </div>
    </div>

    <section class="mission">
      <div class="mission__inner">
        <h2 class="title mission__title" data-text="home-mission-title">{{ $data['home-mission-title'] }}</h2>
        <p class="txt subtitle" data-text="home-mission-subtitle">{{ $data['home-mission-subtitle'] }}</p>

        <a class="btn mission__btn" href="{{ route('about') }}">Подробнее о нас</a>
      </div>
    </section>

    <section class="our-production">
      <h2 class="title" data-text="home-production-title">{{ $data['home-production-title'] }}</h2>
      <p class="txt subtitle" data-text="home-production-subtitle">{{ $data['home-production-subtitle'] }}</p>

      @foreach ($data['products'] as $product)
        <x-product-card :product="$product" />
      @endforeach

      <div class="our-production__link-wrap">
        <a class="our-production__link" href="{{ route('products') }}">Все продукты</a>
      </div>
    </section>
  </main>
@endsection
