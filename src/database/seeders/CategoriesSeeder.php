<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['content' => '商品について'],
            ['content' => '注文について'],
            ['content' => '支払いについて'],
            ['content' => '配送について'],
            ['content' => 'その他'],
        ]);
    }
}
