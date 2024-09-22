<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ایجاد 10 کاربر و هر کدام 5 پست
        User::factory(100)->create()->each(function ($user) {
            $posts = Post::factory(5)->create(['user_id' => $user->id]);

            // ایجاد دسته‌بندی‌ها و اتصال به پست‌ها
            $categories = Category::factory(3)->create(['user_id' => $user->id]);

            $posts->each(function ($post) use ($categories) {
                $post->categories()->attach($categories->pluck('id')->toArray());
            });
        });
    }

}
