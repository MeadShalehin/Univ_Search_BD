<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Image;
use App\Models\User;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id'); // Get all user IDs from the database

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Blog $blog) {
            $imageCount = mt_rand(1, 3); // Choose the number of images per blog entry
            
            for ($i = 1; $i <= $imageCount; $i++) {

                // $name = $key . '-' . time() . '.' . $file->extension();
                // $file->move(public_path('AdminPanelAsset/img/blog/'), $name);
                // $location = 'AdminPanelAsset/img/blog/' . $name;
                // $extension = explode('.' ,$name);


                $name = $i . '-' . time() . '.jpg'; // Change the extension as needed
                $location = 'images/blog/' . $name; // Change the path as needed

                // Move an actual image to the public folder
                $imagePath = public_path($location);
                copy('path/to/your/image.jpg', $imagePath);

                $image = new Image();
                $image->url = $location;
                $image->type = 'jpg';
                $image->parentable_id = $blog->id;
                $image->parentable_type = Blog::class;
                $image->save();
            }
        });
    }


}
