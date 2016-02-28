<?php

use Illuminate\Database\Seeder;
use App\Models\Lists;
use App\Models\Categories;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ListSeeder::class);
    }
}

class ListSeeder extends Seeder
{
    public function run(){
        DB::table('Lists')->delete();
        Lists::create([
            'name' =>'meat',
            'category' => 'eat',
            'price' => '60000',
            'bought' => false,
        ]);
        Lists::create([
            'name' =>'soap',
            'category' => 'cosmetic',
            'price' => '20000',
            'bought' => false,
        ]);
        Lists::create([
            'name' =>'bread',
            'category' => 'eat',
            'price' => '5000',
            'bought' => false,
        ]);
        Lists::create([
            'name' =>'skirt',
            'category' => 'clothes',
            'price' => '350000',
            'bought' => false,
        ]);
        Categories::create([
            'name' => 'eat',
        ]);
        Categories::create([
            'name' => 'clothes',
        ]);
        Categories::create([
            'name' => 'cosmetic',
        ]);
        Categories::create([
            'name' => 'other',
        ]);
    }
}