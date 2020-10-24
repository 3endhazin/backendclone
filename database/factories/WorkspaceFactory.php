<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker; 

// class WorkspaceFactory extends Factory
// {
//     /**
//      * The name of the factory's corresponding model.
//      *
//      * @var string
//      */
//     protected $model = Workspace::class;

//     /**
//      * Define the model's default state.
//      *
//      * @return array
//      */
//     public function definition()
//     {
//         return [
//             'user_id' => Workspace::factory(),

//             'title' => $this->faker->title,

//         ];
//     }
// }

$factory->define(Workspace::class, function(Faker $faker){
    return[
        'title'=>$faker->title(),

    ];
});