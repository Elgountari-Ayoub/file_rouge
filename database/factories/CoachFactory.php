<?php

namespace Database\Factories;

use App\Models\User;


use App\Models\Coach;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
// use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoachFactory extends Factory
{
    protected $model = Coach::class;



    public function definition()
    {
        $photos = [
            'C:\Users\adm\Desktop\coaches\one.jpg',
            'C:\Users\adm\Desktop\coaches\two.jpg',
            'C:\Users\adm\Desktop\coaches\three.jpg',
            'C:\Users\adm\Desktop\coaches\four.jpg',
            'C:\Users\adm\Desktop\coaches\five.jpg',
            'C:\Users\adm\Desktop\coaches\six.jpg',
            'C:\Users\adm\Desktop\coaches\seven.jpg',
            'C:\Users\adm\Desktop\coaches\eight.jpg',
            'C:\Users\adm\Desktop\coaches\nine.jpg',
            'C:\Users\adm\Desktop\coaches\ten.jpg',
        ];

        $password = Hash::make('coach'); // password is hashed for security
        $user = User::factory()->create([
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'role' => 'coach'
        ]);



        return [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'photo' => function () use ($photos) {
                $photo =  Storage::putFile('public/coaches_photos', new \Illuminate\Http\UploadedFile($photos[array_rand($photos)], 'filename'));
                $photo = str_replace('public/', '', $photo);
                return $photo;
            },
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'experience' => $this->faker->realText(250),
            'specialization' => $this->faker->word,
            'story' => $this->faker->sentence,
            'user_id' => $user->id,
            // 'remember_token' => Str::random(10), // generate a random token
        ];
    }
}


// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
//  */
// class CoachFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             //
//         ];
//     }
// }
