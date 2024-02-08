<aside class="dashboard @if (session()->get('isDashClosed')) dashboard--closed @endif">
  <ul class="dash-nav">
    <li class="dash-nav__item">
      <a class="dash-nav__link @if ($route == 'dashboard.products') dash-nav__link--current @endif" href="{{ route('dashboard.products') }}">Продукты</a>
    </li>
  </ul>

  <a class="logout" href="{{ route('auth.logout') }}">Выйти</a>
  <a class="dash__btn" href="#">
    <svg width="100%" height="100%">
      <polyline points="0,0 23,16 23,40 0,56" fill="#334155" stroke="black" stroke-width="2" stroke-linejoin="round"></polyline>
      <polyline class="dash__icon-right" points="9,20 17,28 9,36" fill="none" stroke="gold" stroke-width="3"></polyline>
      <polyline class="dash__icon-left" points="15,20 7,28 15,36" fill="none" stroke="gold" stroke-width="3"></polyline>
    </svg>
  </a>
</aside>
