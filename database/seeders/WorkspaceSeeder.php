<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workspace;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
      @return void
     */
    // public function run()
    // {

    //     DB::table('workspaces')->insert([
    //         'user_id' => 1,
    //         'title' => Str::random(10),
    //     ]);
        
   // }
public function run (){
   factory(App\Workspace::class,10)->create();
}
}

