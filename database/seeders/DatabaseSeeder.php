<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Cache::flush();
        
        Storage::makeDirectory('posts');
        
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        Category::factory(5)->create();
        Tag::factory(10)->create();

        $this->call(PostSeeder::class);

    }
}
