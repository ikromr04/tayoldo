@extends('layouts.master')

@section('title', 'Контакты | Tayoldo')

@section('content')
  <main class="container content">
    <div class="map" id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24954.21253914786!2d68.76884171599121!3d38.573478523652966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1655878302290!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="contacts__inner">
      <h1 class="title contacts__title" data-text="contacts-title">{{ $data['contacts-title'] }}</h1>
      <p class="txt contacts__subtitle" data-text="contacts-subtitle">{{ $data['contacts-subtitle'] }}</p>

      <div class="contacts__contacts">
        <a class="contact-link contact-link--email" data-text="email" href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
        <a class="contact-link contact-link--phone" data-text="phone" href="tel:{{ str_replace([' ', '(', ')', '-'], '', $data['phone']) }}">{{ $data['phone'] }}</a>
      </div>
    </div>
  </main>
@endsection
