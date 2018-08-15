<?php

use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $product = factory(App\Product::class)->create();
        //$user = factory(App\User::class)->create();
        factory(App\Problem::class, 10)->create(
            ['product_id'=>$product->id]
//            ['user_id']=>$user->id
        );
    }

}
