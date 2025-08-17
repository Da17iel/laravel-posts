<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    const LIST_IMAGE_URL = [
        'https://fastly.picsum.photos/id/643/1920/1080.jpg?hmac=np7L94r1uTf0bRVuUP5k5anA_g8xvpqXHr1BDWGkFkY',
        'https://fastly.picsum.photos/id/598/1920/1080.jpg?hmac=suFILAFoMR4-TNOzsoCpye3cIzq5Ba3VF6HeJJ1vCHU',
        'https://fastly.picsum.photos/id/554/1920/1080.jpg?hmac=xGriRcjdEWz3SykVN_2QvpDz2kHei6eYTV8JKXequVw',
        'https://fastly.picsum.photos/id/996/1920/1080.jpg?hmac=teZ5R2rKaUy60jT8DCvWhLaN8xZjdQTJeQb64B5h5Co',
        'https://fastly.picsum.photos/id/530/1920/1080.jpg?hmac=stzbWT9dFkjkk0BPEBI_KPXC5U9PgMhrNKrOS3Jm5NQ',
        'https://fastly.picsum.photos/id/571/1920/1080.jpg?hmac=msf0nny5Mxd5MPrd_K6BjtAizD6md7Lzsh-jScX-_VQ',
        'https://fastly.picsum.photos/id/402/1920/1080.jpg?hmac=bZbB-f_8B5ZwdFbifdypfX910QWMTY3UoG-0wLBpuAI',
        'https://fastly.picsum.photos/id/69/1920/1080.jpg?hmac=bThY0xblhpQ0Vy9QZvD3I2lLcuPD7hYzVW1LmsR3WrY',
        'https://fastly.picsum.photos/id/1032/1920/1080.jpg?hmac=7wpVjpyV-lhmJZlnDWBHdkZpi6cZe52ixlp93aeB-Zo',
        'https://fastly.picsum.photos/id/398/1920/1080.jpg?hmac=kW-b8_YvR4gd82j8TMXgyWfrBdNthHoN3KMQLXYJWQI',
    ];

    public function definition(): array
    {
        $randomImage = array_rand(self::LIST_IMAGE_URL);
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => fake()->paragraph(30),
            'user_id' => User::all()->random()->id,
            'image_url' => self::LIST_IMAGE_URL[$randomImage],
        ];
    }
}
