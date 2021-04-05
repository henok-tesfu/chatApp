<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatRoom;



class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ChatRoom::factory()->create(["name"=>"General"]);
      ChatRoom::factory()->create(["name"=>"Tech Talk"]);
    }
}
