<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $faker->unique()->sentence;
        $is_published = ['1', '0'];

        return [
            'user_id' => rand(1,9),
            'title' => $title,
            'slug' => str_slug($title),
            'sub_title' => $faker->sentence, 
            'details' => $faker->paragraph,
            'post_type' => "post",
            'slug' => str_slug($title),
            'sub_title' => $faker->sentence, 
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
