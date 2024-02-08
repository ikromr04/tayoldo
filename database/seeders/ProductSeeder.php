<?php

namespace Database\Seeders;

use App\Models\ActiveSubstance;
use App\Models\Impact;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\ReleaseForm;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $prescriptions = ['RX', 'OTC'];

    foreach (range(1, 50) as $key) {
      Product::create([
        'prescription_id' => $faker->numberBetween($min = 1, $max = 2),
        'impact_id' => $faker->numberBetween($min = 1, $max = 3),
        'active_substance_id' => $faker->numberBetween($min = 1, $max = 3),
        'release_form_id' => $faker->numberBetween($min = 1, $max = 3),
        'title' => 'Протацит',
        'slug' => SlugService::createSlug(Product::class, 'slug', 'Протацит'),
        'img' => 'product.png',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla faucibus massa, malesuada duis phasellus tincidunt. Tortor, feugiat magna viverra pellentesque. Quam tortor, erat ac eu ut nibh.',
        'gain_url' => 'https://salomat.tj/index.php/main/product/969?from=main',
        'instruction' => 'instruction.pdf',
        'content' => '<h3>Показания к применению:</h3><p>Местное симптоматическое лечение и обезболивание у детей с рождения и взрослых при:</p><ul><li>среднем отите в остром периоде в момент воспаления;</li><li>отите как осложнении после гриппа;</li><li>баротравматическом отеке.</li></ul><h3>Способ применения и дозы:</h3><p>Отибелс применяется местно, путем закапывания в наружный слуховой проход 2-3 раза в день по 3-4 капли. Во избежание соприкосновения холодного раствора с ушной раковиной, флакон перед применением следует согреть в ладонях.</p><p>Продолжительность применения препарата Отибелс не более 10 дней, после чего следует пересмотреть назначенное лечение.</p><p>После первого вскрытия флакона препарат следует использовать в течение 6 месяцев. Не использовать по истечении срока годности, указанного на упаковке.</p><h3>Показания к применению</h3><p>Местный противовоспалительный, анальгезирующий антисептик. Местное симптоматическое лечение и обезболивание у детей с рождения и взрослых при:</p><ul><li>среднем отите в остром периоде в момент воспаления;</li><li>отите как осложнении после гриппа;</li><li>баротравматическом отеке.</li></ul><h3>Способ применения:</h3><p>Отибелс применяется местно, путем закапывания в наружный слуховой проход 2-3 раза в день по 3-4 капли. Во избежание соприкосновения холодного раствора с ушной раковиной, флакон перед применением следует согреть в ладонях. Продолжительность применения препарата Отибелс не более 10 дней, после чего следует пересмотреть назначенное лечение. После первого вскрытия флакона препарат следует использовать в течение 6 месяцев. Не использовать по истечении срока годности, указанного на упаковке.</p>',
      ]);
    }
  }
}
