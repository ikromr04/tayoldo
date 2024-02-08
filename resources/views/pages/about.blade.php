@extends('layouts.master')

@section('title', 'О нас | Tayoldo')

@section('content')
  <main class="container content">
    <div class="vitrin about__vitrin">
      <div class="vitrin__inner">
        <h1 class="title vitrin__title" data-text="about-vitrin-title">{{ $data['about-vitrin-title'] }}</h1>
        <p class="txt subtitle" data-text="about-vitrin-subtitle">{{ $data['about-vitrin-subtitle'] }}</p>
      </div>
    </div>

    <div class="about-card">
      <p class="about-card__description" data-text="about-card-description">{{ $data['about-card-description'] }}</p>
      <p class="txt about-card__text" data-text="about-card-text">{{ $data['about-card-text'] }}</p>
    </div>

    <section class="foundation">
      <h2 class="title" data-text="about-foundation-title">{{ $data['about-foundation-title'] }}</h2>
      <p class="txt subtitle" data-text="about-foundation-subtitle">{{ $data['about-foundation-subtitle'] }}</p>

      <div class="foundation__inner">
        <section class="about-mission">
          <div class="mission-vision__inner">
            <h3 class="txt mission-vision-title" data-text="about-mission-title">{{ $data['about-mission-title'] }}</h3>
            <p class="txt mission-vision-description" data-text="about-mission-description">{{ $data['about-mission-description'] }}</p>
          </div>
        </section>

        <section class="about-vision">
          <div class="mission-vision__inner">
            <h3 class="txt mission-vision-title" data-text="about-vision-title">{{ $data['about-vision-title'] }}</h3>
            <p class="txt mission-vision-description" data-text="about-vision-description">{{ $data['about-vision-description'] }}</p>
          </div>
        </section>
      </div>
    </section>

    <section class="values">
      <h2 class="title values__title" data-text="about-values-title">{{ $data['about-values-title'] }}</h2>
      <p class="txt subtitle" data-text="about-values-subtitle">{{ $data['about-values-subtitle'] }}</p>

      <ul class="value-list">
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-1">{{ $data['values-item-1'] }}</h3>
        </li>
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-2">{{ $data['values-item-2'] }}</h3>
        </li>
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-3">{{ $data['values-item-3'] }}</h3>
        </li>
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-4">{{ $data['values-item-4'] }}</h3>
        </li>
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-5">{{ $data['values-item-5'] }}</h3>
        </li>
        <li class="value-item">
          <h3 class="value-item__title" data-text="values-item-6">{{ $data['values-item-6'] }}</h3>
        </li>
      </ul>
    </section>
  </main>
@endsection
