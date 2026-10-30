<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Task;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['code' => 'CUS-001', 'full_name' => 'Santos Family Residence', 'location' => 'Quezon City', 'project' => 'Rooftop solar', 'capacity' => '5.5 kWp', 'status' => 'Site survey'],
            ['code' => 'CUS-002', 'full_name' => 'Bayanihan Grocery', 'location' => 'Marikina City', 'project' => 'Retail solar', 'capacity' => '8.0 kWp', 'status' => 'Quotation'],
            ['code' => 'CUS-003', 'full_name' => 'Del Rosario Learning Center', 'location' => 'Antipolo City', 'project' => 'School solar', 'capacity' => '12.0 kWp', 'status' => 'For installation'],
            ['code' => 'CUS-004', 'full_name' => 'Mabuhay Bakehouse', 'location' => 'Pasig City', 'project' => 'Commercial solar', 'capacity' => '6.6 kWp', 'status' => 'Installed'],
            ['code' => 'CUS-005', 'full_name' => 'Riverbend Farm', 'location' => 'San Mateo, Rizal', 'project' => 'Hybrid solar', 'capacity' => '10.0 kWp', 'status' => 'Monitoring'],
        ];
        foreach ($customers as $index => $customer) {
            // Reserved example.com addresses and fictitious phones keep sample contact data safe.
            $customer['email'] = 'customer'.($index + 1).'@example.com';
            $customer['phone'] = '0900-000-000'.($index + 1);
            Customer::updateOrCreate(['code' => $customer['code']], $customer);
        }

        $users = [
            ['code' => 'USR-001', 'username' => 'jacob', 'full_name' => 'Jian Acob', 'role' => 'System administrator', 'team' => 'Operations', 'location' => 'Quezon City', 'status' => 'Active'],
            ['code' => 'USR-002', 'username' => 'ivicencio', 'full_name' => 'Isaiah Vicencio', 'role' => 'Sales coordinator', 'team' => 'Sales', 'location' => 'Quezon City', 'status' => 'Active'],
            ['code' => 'USR-003', 'username' => 'abarcelona', 'full_name' => 'Aaron Barcelona', 'role' => 'Solar technician', 'team' => 'Installation', 'location' => 'Marikina City', 'status' => 'Active'],
            ['code' => 'USR-004', 'username' => 'ajamito', 'full_name' => 'Amiel Jamito', 'role' => 'Site surveyor', 'team' => 'Engineering', 'location' => 'Antipolo City', 'status' => 'Active'],
            ['code' => 'USR-005', 'username' => 'smacaldo', 'full_name' => 'Sean Macaldo', 'role' => 'Inventory assistant', 'team' => 'Warehouse', 'location' => 'Pasig City', 'status' => 'Active'],
        ];
        foreach ($users as $user) {
            // Stable keys make re-seeding update existing samples instead of duplicating them.
            TeamMember::updateOrCreate(['username' => $user['username']], $user);
        }
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
