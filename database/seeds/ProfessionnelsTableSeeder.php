<?php

use Illuminate\Database\Seeder;
use App\Models\Professionnel;

class ProfessionnelsTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professionnel::create([
          'category_id' => 1,
          'pro_id' => 1,
          'user_id' => 1,
          'title' => 'Vente Appartement',
          'content' => '
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
          Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
          Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
          'price' => 120000,
          'premium' => 0
        ]);

        Professionnel::create([
            'category_id' => 2,
            'pro_id' => 1,
            'user_id' => 1,
            'title' => 'Vente Auto',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 20000,
            'premium' => 0
          ]);

          Professionnel::create([
            'category_id' => 3,
            'pro_id' => 1,
            'user_id' => 2,
            'title' => 'Vente Smarphone',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 500,
            'premium' => 0
          ]);

          Professionnel::create([
            'category_id' => 1,
            'pro_id' => 1,
            'user_id' => 2,
            'title' => 'Vente Maison',
            'content' => '
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime, unde ad pariatur quibusdam, quam obcaecati mollitia nesciunt accusamus architecto praesentium rerum! Ut exercitationem et ratione asperiores dolor, consequuntur soluta fuga.
            Animi excepturi commodi ab vitae, velit culpa voluptate, iusto maiores impedit, facilis veritatis! Temporibus perspiciatis quaerat soluta tempore adipisci accusamus, odio deleniti iusto a repudiandae iste ut eum. Fugiat, necessitatibus.
            Eius at, ex labore consectetur soluta itaque asperiores sapiente a aliquid quisquam nostrum numquam consequatur beatae, perferendis aut est error repudiandae delectus rem quidem officiis. Ducimus ipsa id doloribus consequatur!',
            'price' => 220000,
            'premium' => 0
          ]);
        //
    }
}
