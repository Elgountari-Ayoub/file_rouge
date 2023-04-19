<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        $photos = [
            'C:\Users\adm\Desktop\clients\one.jpg',
            'C:\Users\adm\Desktop\clients\two.jpg',
            'C:\Users\adm\Desktop\clients\three.jpg',
            'C:\Users\adm\Desktop\clients\four.jpg',
            'C:\Users\adm\Desktop\clients\five.jpg',
            'C:\Users\adm\Desktop\clients\six.jpg',
            'C:\Users\adm\Desktop\clients\seven.jpg',
            'C:\Users\adm\Desktop\clients\eight.jpg',
            'C:\Users\adm\Desktop\clients\nine.jpg',
            'C:\Users\adm\Desktop\clients\ten.jpg',
        ];

        $password = Hash::make('client'); // password is hashed for security
        $user = User::factory()->create([
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'role' => 'client'
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
            'gender' => $this->faker->randomElement(['male', 'female']),
            'height' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(50, 100),
            'goal' => $this->faker->sentence,
            'birthday' => $this->faker->date('Y-m-d', '-20 years'), // generate a random date in the past 20 years
            'user_id' => $user->id,
        ];
    }
}
