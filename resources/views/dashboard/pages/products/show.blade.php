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
      <li class="page__breadcrumb">
        <a href="{{ route('dashboard.products') }}">Продукты</a>
        <svg width="10" height="16" fill="none">
          <path d="M4.936 7.41s2.132-3.422 1.092-5.223C4.988.386 5.155.69 5.155.69S4.796 0 4.199 0H.515l4.421 7.41Z" fill="currentColor" />
          <path d="M5.473 7.766c.39-.648.723-1.336.995-2.055a7.19 7.19 0 0 0 .474-2.031l2.305 3.857a.835.835 0 0 1-.002.934l-4.017 6.722a4.301 4.301 0 0 1-.131.22c-.126.193-.441.587-.895.587H.5l4.973-8.233Z" fill="currentColor" />
        </svg>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">{{ $data['product'] ? 'Редактирование' : 'Добавление' }}</li>
    </ul>

    <div class="page__link-wrapper">
      @if ($data['product'])
        <h1 class="page__title">Редактирование</h1>
      @else
        <h1 class="page__title">Добавление</h1>
      @endif
      <a class="page__link" data-action="submit">{{ $data['product'] ? 'Редактировать' : 'Сохранить' }}</a>
    </div>

    <form class="form-dash" @if ($data['product']) action="{{ route('dashboard.products.post', ['action' => 'update']) }}" @else action="{{ route('dashboard.products.post', ['action' => 'store']) }}" @endif method="post" enctype="multipart/form-data">
      @csrf
      @if ($data['product'])
        <input type="hidden" name="product_id" value="{{ $data['product']->id }}">
        <img style="grid-row: span 3; justify-self: center; object-fit: contain;" src="{{ asset('files/products/img/' . $data['product']->img) }}" width="100%" height="100%">
      @else
        <img style="grid-row: span 3; justify-self: center; object-fit: contain;" width="100%" height="100%">
      @endif
      <label class="form-dash__element" style="grid-column-start: 1">
        <span class="form-dash__label">Фото</span>
        <input class="visually-hidden" name="img" type="file" accept="image/*">
        <input class="form-dash__field" type="text" placeholder="{{ $data['product'] && $data['product']->img ? $data['product']->img : 'Выберите файл' }}" value="{{ $data['product']->img ?? '' }}" readonly>
      </label>

      <label class="form-dash__element" style="grid-column: span 2;">
        <span class="form-dash__label">Название*</span>
        <input class="form-dash__field" name="title" type="text" placeholder="Протацит" value="{{ $data['product']->title ?? '' }}" required data-pristine-required-message="Объязательное поле" autocomplete="off">
      </label>

      <label class="form-dash__element" style="grid-row: 5/8; grid-column: 1/4;">
        <span class="form-dash__label">Описание</span>
        <textarea class="form-dash__field" name="description" cols="30" rows="10">{{ $data['product']->description ?? '' }}</textarea>
      </label>

      <label class="form-dash__element" style="grid-column-start: 2; grid-row-start: 1;">
        <span class="form-dash__label">Уловия отпуска*</span>
        <select class="form-dash__field form-dash__field--select" name="prescription">
          <option value="RX" @if ($data['product'] && $data['product']->prescription == 'RX') selected @endif>RX</option>
          <option value="OTC" @if ($data['product'] && $data['product']->prescription == 'OTC') selected @endif>OTC</option>
        </select>
      </label>

      <label class="form-dash__element" style="grid-column-start: 2; grid-row-start: 2;">
        <span class="form-dash__label">Форма выпуска*</span>
        @if (count($data['release_forms']) != 0)
          <select class="form-dash__field form-dash__field--select" name="release_form_id">
            @foreach ($data['release_forms'] as $releaseForm)
              <option value="{{ $releaseForm->id }}" @if ($data['product'] && $data['product']->release_form_id == $releaseForm->id) selected @endif>{{ $releaseForm->title }}</option>
            @endforeach
            <option value="add-new-release-form">Добавить форму выпуска</option>
          </select>
        @else
          <input class="form-dash__field" name="release_form" type="text" placeholder="Таблетки" required data-pristine-required-message="Объязательное поле" autocomplete="off">
        @endif
      </label>

      <label class="form-dash__element" style="grid-column-start: 2; grid-row-start: 3;">
        <span class="form-dash__label">Категория*</span>
        @if (count($data['categories']) != 0)
          <select class="form-dash__field form-dash__field--select" name="category_id">
            @foreach ($data['categories'] as $category)
              <option value="{{ $category->id }}" @if ($data['product'] && $data['product']->category_id == $category->id) selected @endif>{{ $category->title }}</option>
            @endforeach
            <option value="add-new-category">Добавить категорию</option>
          </select>
        @else
          <input class="form-dash__field" name="category" type="text" placeholder="Категория" required data-pristine-required-message="Объязательное поле" autocomplete="off">
        @endif
      </label>

      <label class="form-dash__element" style="grid-column-start: 3; grid-row-start: 2;">
        <span class="form-dash__label">Ссылка для приобретения</span>
        <input class="form-dash__field" name="gain_url" type="url" placeholder="Ссылка" autocomplete="off" value="{{ $data['product']->gain_url ?? '' }}">
      </label>

      <label class="form-dash__element" style="grid-column-start: 3; grid-row-start: 3;">
        <span class="form-dash__label">Инструкция</span>
        <input class="visually-hidden" name="instruction" type="file">
        <input class="form-dash__field" type="text" placeholder="{{ $data['product'] && $data['product']->instruction ? $data['product']->instruction : 'Выберите файл' }}" value="{{ $data['product']->instruction ?? '' }}" readonly>
      </label>

      <label class="form-dash__element" style="grid-row: 8/11; grid-column: 1/4;">
        <span class="form-dash__label">Контент</span>
        <textarea class="form-dash__field" name="content" cols="30" rows="10">{{ $data['product']->content ?? '' }}</textarea>
      </label>
    </form>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard-products-show.js') }}" type="module"></script>
@endsection
