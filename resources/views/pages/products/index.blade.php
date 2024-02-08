@extends('layouts.master')

@section('title', 'Продукты | Tayoldo')

@section('content')
  <main class="container content">
    <h1 class="title" id="products" data-text="products-title">{{ $data['products-title'] }}</h1>
    <p class="txt subtitle products__subtitle" data-text="products-subtitle">{{ $data['products-subtitle'] }}</p>

    <section class="products-filter">
      <form class="filter-form" action="{{ route('products') }}#products" method="GET">
        <div class="filter-form__field-wrap">
          <select class="filter-form__field" name="prescription" onchange="this.form.submit()">
            <option value="">Условия отпуска</option>
            <option value="RX" @if ($data['prescription'] && $data['prescription'] == 'RX') selected @endif>RX</option>
            <option value="OTC" @if ($data['prescription'] && $data['prescription'] == 'OTC') selected @endif>OTC</option>
          </select>
        </div>

        <div class="filter-form__field-wrap">
          <select class="filter-form__field" name="release_form_id" onchange="this.form.submit()">
            <option value="">Форма выпуска</option>
            @foreach ($data['release_forms'] as $releaseForm)
              <option value="{{ $releaseForm->id }}" @if ($data['release_form_id'] && $data['release_form_id'] == $releaseForm->id) selected @endif>{{ $releaseForm->title }}</option>
            @endforeach
          </select>
        </div>

        <div class="filter-form__field-wrap">
          <select class="filter-form__field" name="category_id" onchange="this.form.submit()">
            <option value="">Категории</option>
            @foreach ($data['categories'] as $category)
              <option value="{{ $category->id }}" @if ($data['category_id'] && $data['category_id'] == $category->id) selected @endif>{{ $category->title }}</option>
            @endforeach
          </select>
        </div>
        <input type="hidden" name="page" value="1">
      </form>
    </section>

    <section class="our-products">
      @foreach ($data['products'] as $product)
        <x-product-card :product="$product" />
      @endforeach

      {{ $data['products']->appends(request()->input())->fragment('products')->links('components.pagination') }}
    </section>
  </main>
@endsection
