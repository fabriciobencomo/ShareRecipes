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
        DB::table('category_recipes')->insert([
            'name' => 'Italian Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category_recipes')->insert([
            'name' => 'Argentine Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);     
    
        DB::table('category_recipes')->insert([
            'name' => 'Desserts',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);  

        DB::table('category_recipes')->insert([
            'name' => 'Salads',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipes')->insert([
            'name' => 'Dinners',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipes')->insert([
            'name' => 'Breakfasts',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipes')->insert([
            'name' => 'Meats',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        
        DB::table('category_recipes')->insert([
            'name' => 'Mexican Food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
