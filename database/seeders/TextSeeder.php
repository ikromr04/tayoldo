<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $texts = [
      [
        'page' => null,
        'slug' => 'copyright',
        'text' => '© ООО “Tayoldo”
Все права защищены',
      ],
      [
        'page' => null,
        'slug' => 'email',
        'text' => 'info@tayoldo.com'
      ],
      [
        'page' => null,
        'slug' => 'phone',
        'text' => '+992 918 55 64 64',
      ],

      [
        'page' => 'home',
        'slug' => 'home-vitrin-title',
        'text' => 'Tayoldo pharma',
      ],

      [
        'page' => 'home',
        'slug' => 'home-vitrin-subtitle',
        'text' => 'Молодая и перспективная компания с ключевыми компетенциями в сфере фармацевтики.
Благодаря нашим инновационным продуктам мы помогаем людям с неизлечимой болезнью.',
      ],
      [
        'page' => 'home',
        'slug' => 'home-mission-title',
        'text' => 'Миссия нашей компании',
      ],
      [
        'page' => 'home',
        'slug' => 'home-mission-subtitle',
        'text' => 'Cтать ведущей фармацевтической компанией мирового уровня, в которой будут работать сплоченные талантливые люди, занимающиеся созданием инновационных продуктов.',
      ],
      [
        'page' => 'home',
        'slug' => 'home-production-title',
        'text' => 'Наша продукция',
      ],
      [
        'page' => 'home',
        'slug' => 'home-production-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-vitrin-title',
        'text' => 'Tayoldo pharma',
      ],
      [
        'page' => 'about',
        'slug' => 'about-vitrin-subtitle',
        'text' => 'Молодая и перспективная компания с ключевыми компетенциями в сфере фармацевтики.

Благодаря нашим инновационным продуктам мы помогаем людям с неизлечимой болезнью.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-card-description',
        'text' => 'Мы ведем наш глобальный бизнес с максимальной честностью и прозрачностью. Мы поддерживаем
программы, инициативы и организации, которые помогают улучшить здоровье.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-card-text',
        'text' => 'Быстро растущее и стареющее население мира требует особого внимания в снабжении и улучшении медицинских услуг. Благодаря нашим инновационным продуктам мы вносим свой вклад в поиск решений некоторых из основных проблем нашего времени. Поскольку ожидаемая продолжительность жизни продолжает расти, мы улучшаем качество жизни растущего населения, сосредоточив наши исследования и разработки на профилактике, облегчении и лечении заболеваний.

Мы стремимся работать устойчиво и выполнять
наши социальные и этические обязательства.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-foundation-title',
        'text' => 'Наша основа',
      ],
      [
        'page' => 'about',
        'slug' => 'about-foundation-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-mission-title',
        'text' => 'Миссия нашей компании ',
      ],
      [
        'page' => 'about',
        'slug' => 'about-mission-description',
        'text' => 'Стать ведущей фармацевтической компанией мирового уровня, в которой будут работать сплоченные талантливые люди, занимающиеся созданием инновационных продуктов.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-vision-title',
        'text' => 'Наше Видение',
      ],
      [
        'page' => 'about',
        'slug' => 'about-vision-description',
        'text' => 'Оказывать положительное влияние на сообщества, в которых мы живем и работаем.',
      ],
      [
        'page' => 'about',
        'slug' => 'about-values-title',
        'text' => 'Наши ценности',
      ],
      [
        'page' => 'about',
        'slug' => 'about-values-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-1',
        'text' => 'Здоровье',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-2',
        'text' => 'Инновации',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-3',
        'text' => 'Сотрудники',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-4',
        'text' => 'Сплоченность',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-5',
        'text' => 'Общество',
      ],
      [
        'page' => 'about',
        'slug' => 'values-item-6',
        'text' => 'Здоровье',
      ],
      [
        'page' => 'products',
        'slug' => 'products-title',
        'text' => 'Наша продукция',
      ],
      [
        'page' => 'products',
        'slug' => 'products-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => 'products.show',
        'slug' => 'similar-products-title',
        'text' => 'Похожая продукция',
      ],
      [
        'page' => 'products.show',
        'slug' => 'similar-products-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => 'contacts',
        'slug' => 'contacts-title',
        'text' => 'Связь с нами',
      ],
      [
        'page' => 'contacts',
        'slug' => 'contacts-subtitle',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec et egestas ultrices placerat id rhoncus. Sapien semper odio rhoncus, aliquam nulla quisque. Pharetra mauris commodo, varius eget sit aliquam amet.',
      ],
      [
        'page' => '',
        'slug' => '',
        'text' => '',
      ],
    ];

    foreach ($texts as $text) {
      Text::create([
        'page' => $text['page'],
        'slug' => $text['slug'],
        'text' => $text['text'],
      ]);
    }
  }
}
