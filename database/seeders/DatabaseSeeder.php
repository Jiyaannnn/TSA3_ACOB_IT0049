<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Relative dates guarantee today's view has sample tasks after a fresh seed.
        $entries = [
            ['Sanitize the refill dispensers', 'completed', 0],
            ['Check bulk soap and detergent levels', 'pending', 0],
            ['Prepare customer refill orders', 'in progress', 0],
            ['Record returned containers', 'pending', 0],
            ['Calibrate counter scales', 'completed', -1],
            ['Reconcile refill sales', 'completed', -1],
            ['Receive new cleaning concentrate', 'pending', 1],
            ['Print batch and expiry labels', 'pending', 1],
            ['Review container reuse totals', 'pending', 2],
        ];
        foreach ($entries as $i => [$title, $status, $offset]) {
            Task::updateOrCreate(['id' => $i + 1], ['title' => $title, 'status' => $status, 'task_date' => today()->addDays($offset)->toDateString()]);
        }
        User::updateOrCreate(['username' => 'mara'], ['full_name' => 'Mara Santos', 'email' => 'mara@example.com']);
    }
}
