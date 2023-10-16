<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Listing::factory(30)->create();

        // Listing::create([
        //     'title'=>'Laravel developer',
        //     'tags'=>'laravel,javascript',
        //     'company'=>'Acme corp',
        //     'description'=>'this is the company description text',
        //     'url'=>'https://www.google.com',
        //     'location'=> 'Tokyo'
        // ]);
    }
}
