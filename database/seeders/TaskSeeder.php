<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity_ids = Activity::all()->pluck('id');
        $user_ids = User::all()->pluck('id');

        foreach ($activity_ids as $activity_id)
            foreach (range(0, rand(2, 4)) as $num)
                Task::factory()->create([
                    'activity_id' => $activity_id,
                    'user_id' => $user_ids->random()
                ]);
    }
}
