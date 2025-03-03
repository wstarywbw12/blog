<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert(
            [
                [
                    'user_id' => 1,
                    'image' => '1.jpg',
                    'title' => 'Belajar Laravel 12',
                    'content' => 'Some quick example text to build on the card title and make up the bulk of the cards content.',
                    'categorie' => 'Laravel',
                ],
                [
                    'user_id' => 1,
                    'image' => '2.jpg',
                    'title' => 'Belajar Laravel 11',
                    'content' => 'Some quick example text to build on the card title and make up the bulk of the cards content.',
                    'categorie' => 'Laravel',
                ],
                [
                    'user_id' => 1,
                    'image' => '3.jpg',
                    'title' => 'Belajar Laravel 10',
                    'content' => 'Some quick example text to build on the card title and make up the bulk of the cards content.',
                    'categorie' => 'Laravel',
                ],
            ]
        );
    }
}
