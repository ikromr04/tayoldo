<aside class="dashboard @if (session('dashboard') == 'shown') dashboard--shown @else dashboard--hidden @endif">
  <button class="dashboard__state-toggle" type="button">
    @if (session('dashboard') == 'shown')
      Скрыть панель администратора
    @else
      Показать панель администратора
    @endif
  </button>

  <div class="dashboard__inner">
    <a class="dashboard__mode-toggle" href="{{ route('dashboard', ['action' => 'toggle-mode']) }}">
      @if (session('editMode'))
        Выключить режим редактирования
      @else
        Включить режим редактирования
      @endif
    </a>

    <ul class="dashboard__menu">
      <li class="dashboard__menu-item @if ($route == 'dashboard.products') dashboard__menu-item--current @endif">
        <a class="dashboard__link" href="{{ route('dashboard.products') }}">Продукты</a>
      </li>
      <li class="dashboard__menu-item">
        <a class="dashboard__link admin-panel__link--logout" href="{{ route('auth.logout', $locale) }}">Выйти</a>
      </li>
    </ul>
  </div>
</aside>
