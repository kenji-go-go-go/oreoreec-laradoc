<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name'           => 'トマト試作',
                'image_path'      => '1_thumbnail.jpg',
                'unit_price'      => '999',
                'stock_number'       => 9,
                'description'           => 'フレッシュで甘いトマト！まさにフレッシュフレッシュフレッシュ',
                'box_number'       => 10,
            ],
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name'           => 'とてもフレッシュ',
                'image_path'      => '2_thumbnail.jpg',
                'unit_price'      => '111',
                'stock_number'       => 9,
                'description'           => 'とてもフレッシュ！まさにフレッシュフレッシュフレッシュ',
                'box_number'       => 10,
            ],
            [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name'           => 'フレッシュ極まれリ',
                'image_path'      => '3_thumbnail.jpg',
                'unit_price'      => '11111',
                'stock_number'       => 9,
                'description'           => 'フレッシュ極まれリ！まさにフレッシュフレッシュフレッシュ',
                'box_number'       => 10,
            ],
        ]);
    }
}
