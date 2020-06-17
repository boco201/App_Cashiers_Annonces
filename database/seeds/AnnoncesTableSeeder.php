<?php

use Illuminate\Database\Seeder;
use App\Models\Annonce;

class AnnoncesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annonce::create([
          'category_id' => 1,
          'particulier_id' => 1,
          'user_id' => 1,
          'title' => 'Vente Appartement',
          'content' => '
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
          Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
          Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
          'price' => 120000,
          'premiums' => 0
        ]);

        Annonce::create([
            'category_id' => 2,
            'user_id' => 1,
            'particulier_id' => 1,
            'title' => 'Vente Auto',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 20000,
            'premiums' => 0
          ]);

          Annonce::create([
            'category_id' => 3,
            'particulier_id' => 1,
            'user_id' => 2,
            'title' => 'Vente Smarphone',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 500,
            'premiums' => 0
          ]);

          Annonce::create([
            'category_id' => 1,
            'particulier_id' => 1,
            'user_id' => 2,
            'title' => 'Vente Maison',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 220000,
            'premiums' => 0
          ]);
        //
    }
}

