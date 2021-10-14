<?php

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
        DB::table('category_recipe')->insert([
            'name' => 'Italian Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category_recipe')->insert([
            'name' => 'Argetine Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);     
    
        DB::table('category_recipe')->insert([
            'name' => 'Desserts',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);  

        DB::table('category_recipe')->insert([
            'name' => 'Salads',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipe')->insert([
            'name' => 'Dinners',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipe')->insert([
            'name' => 'breakfasts',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipe')->insert([
            'name' => 'Meats',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipe')->insert([
            'name' => 'Mexican Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
