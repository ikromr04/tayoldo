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

    <section class="ae-section">
      <p>Чтобы сообщить о жалобе на продукт/нежелательном явлении, используйте приведенную ниже контактную информацию.</p>
      <dl>
        <dt style="font-weight: bold">Контактный номер:</dt>
        <dd>
          <a style="text-decoration: none; color: #1a73e8;" href="tel:+77771750099">+77771750099</a>
          <strong style="font-weight: normal; color: #EB2629;">(по вопросам безопасности лекарств)</strong>
        </dd>
        <dt style="font-weight: bold">Контактный E-mail:</dt>
        <dd>
          <a style="text-decoration: none; color: #1a73e8;" href="mailto:drugsafety@evolet.co.uk">drugsafety@evolet.co.uk</a>
          <strong style="font-weight: normal; color: #EB2629;">(по вопросам безопасности лекарств)</strong>
        </dd>
      </dl>
      <form class="form" action="{{ route('ae') }}" method="post">
        @csrf
        <h2 class="form__title sample-wrapper__title sample-wrapper__title--big">Форма для отправки жалобы:</h2>
        <input class="form__input" id="inititals" type="text" name="inititals" placeholder="Инициалы пациента" required data-pristine-required-message="Объязательное поле">
        <input class="form__input" id="age" type="number" name="age" placeholder="Возраст (лет) (необязательный)">
        <input class="form__input" id="weight" type="number" name="weight" placeholder="Вес (кг) (необязательный)">
        <input class="form__input" id="hight" type="number" name="hight" placeholder="Рост (см) (необязательный)">
        <input class="form__input" id="event" type="text" name="event" placeholder="Нежелательная реакция" required data-pristine-required-message="Объязательное поле">
        <input class="form__input" id="suspect" type="text" name="suspect" placeholder="Лекарственные средства, вызвавшие нежелательную реакцию" required data-pristine-required-message="Объязательное поле">
        <input class="form__input" id="name" type="text" name="name" placeholder="Имя сообщающего лица" required data-pristine-required-message="Объязательное поле">
        <input class="form__input" type="email" name="email" id="email" placeholder="Электронная почта сообщающего лица" required data-pristine-required-message="Объязательное поле" data-pristine-email-message="E-mail не является допустимым">
        <input class="form__input" type="tel" id="phone" name="phone" placeholder="Номер мобильного телефона сообщающего лица " required data-pristine-required-message="Объязательное поле">
        <div class="form__footer">
          <button class="form__button" type="submit">Отправить</button>
        </div>
      </form>

      <p>Нажмите, чтобы загрузить <a class="ae-link" href="/ae-form-ru.docx">форму сообщения о нежелательных явлениях</a> для детального отчета.</p>
      <p>После отправки формы онлайн вы получите подтверждение на свой адрес электронной почты. С вами свяжутся лично только в том случае, если потребуется какая-либо дополнительная информация. Если вам нужна помощь в заполнении формы, вы можете позвонить нашему менеджеру для онлайн-поддержки.</p>

      <h3>Конфиденциальность:</h3>
      <p>Вся информация и личные данные, которыми вы делитесь с нами, будут защищены и сохранены в тайне. Предоставленная вами информация может быть передана органам здравоохранения.</p>
      <p>Сообщение здесь не означает признания того, что продукт компании вызвал реакцию или способствовал ей.</p>
    </section>
  </main>
@endsection
