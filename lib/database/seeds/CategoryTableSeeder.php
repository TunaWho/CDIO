<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Catedata = [
            [
                'cate_name'=>'Xiaomi',
                'cate_slug'=> str_slug('Xiaomi'),
            ],
            [
                'cate_name'=>'iPhone',
                'cate_slug'=> str_slug('iPhone'),
            ]
        ];
        DB::table('vp_categories')->insert($Catedata);
    }
}
