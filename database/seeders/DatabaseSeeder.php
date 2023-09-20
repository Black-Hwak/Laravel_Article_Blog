<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->count(20)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(30)->create();

        User::factory()->create([
            'name' => 'Hset Paing',
            'email' => 'hsetpaing@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'Paing Paing',
            'email' => 'paingpaing@gmail.com'
        ]);
    }
}
