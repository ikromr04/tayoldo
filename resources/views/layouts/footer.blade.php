<footer class="footer">
  <div class="container footer__container">
    <a class="logo footer__logo" @if ($route != 'home') href="{{ route('home') }}" @endif>
      <img class="logo__img" src="{{ asset('img/logo.svg') }}" alt="Логотип компании Tayoldo" width="173" height="43">
    </a>

    <p class="txt copyright" data-text="copyright">{{ $data['copyright'] }}</p>

    <ul class="social-list footer__social-list">
      <li class="social-list__item">
        <a class="social-link" style="background-image: url('{{ asset('files/socials/facebook.svg') }}')" href="#">Фейсбук</a>
      </li>
      <li class="social-list__item">
        <a class="social-link" style="background-image: url('{{ asset('files/socials/instagram.svg') }}')" href="#">Инстаграм</a>
      </li>
      <li class="social-list__item">
        <a class="social-link" style="background-image: url('{{ asset('files/socials/linkedin.svg') }}')" href="#">Линкед ин</a>
      </li>
    </ul>

    <div class="footer__contacts">
      <a class="contact-link contact-link--email" data-text="email" href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
      <a class="contact-link contact-link--phone" data-text="phone" href="tel:{{ str_replace([' ', '(', ')', '-'], '', $data['phone']) }}">{{ $data['phone'] }}</a>
    </div>

    <div class="footer__review-links">
      <a class="review-link" href="#">Правовое соглашение</a>
      <a class="review-link" href="#">Политика конфиденциональности</a>
    </div>
  </div>
</footer>
