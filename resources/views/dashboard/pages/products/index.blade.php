@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">{{ session()->get('fail') }}</div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">{{ session()->get('success') }}</div>
    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home') }}">Главная</a>
        <svg width="10" height="16" fill="none">
          <path d="M4.936 7.41s2.132-3.422 1.092-5.223C4.988.386 5.155.69 5.155.69S4.796 0 4.199 0H.515l4.421 7.41Z" fill="currentColor" />
          <path d="M5.473 7.766c.39-.648.723-1.336.995-2.055a7.19 7.19 0 0 0 .474-2.031l2.305 3.857a.835.835 0 0 1-.002.934l-4.017 6.722a4.301 4.301 0 0 1-.131.22c-.126.193-.441.587-.895.587H.5l4.973-8.233Z" fill="currentColor" />
        </svg>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">Продукты</li>
    </ul>

    <div class="page__link-wrapper" style="padding: 0 2px">
      <h1 class="page__title">Продукты</h1>
      <a class="page__link" href="{{ route('dashboard.products', ['action' => 'create']) }}">Добавить новый продукт</a>
    </div>

    @if (count($data['products']) != 0)
      <table class="page__table">
        <thead>
          <tr>
            <th>№</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Категория</th>
            <th colspan="2">Действия</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data['products'] as $key => $product)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                <div style="min-width: max-content">{{ $product->title }}</div>
              </td>
              <td>
                <div>{{ $product->description }}</div>
              </td>
              <td>
                <div style="min-width: max-content;">{{ $product->category->title }}</div>
              </td>
              <td>
                <a href="{{ route('dashboard.products', ['action' => 'edit', 'product' => $product->id]) }}">Редактировать</a>
              </td>
              <td>
                <a data-action="delete" data-id="{{ $product->id }}">Удалить</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Нет данных</p>
    @endif

  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard-products.js') }}" type="module"></script>
@endsection
