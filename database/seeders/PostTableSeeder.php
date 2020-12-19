<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Первый пост',
            'content' => 'Это первый тестовый пост. Пост является проверкой работоспособности блога и не несёт полезной информации',
            'category_id' => '1'
        ]);
    }
}
