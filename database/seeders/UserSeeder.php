<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::factory()
//            ->count(5)
//            ->create();
        // Create the user
        $user = User::create([
            'name' => 'Developer',
            'email' => 'muhammad.ali@remarkhb.com',
            'password' => Hash::make('123'),
            'approved_by' => 1,
            'approve_status' => 1,
            'is_super_dev' => 1,
            'user_type' => "developer",
        ]);

        // Create personal team
        $team = Team::create([
            'user_id' => $user->id,
            'name' => "{$user->name}'s Team",
            'personal_team' => true,
        ]);

// Attach user to team (team_user)
        $team->users()->attach($user->id, [
            'role' => 'owner',
        ]);

        // Set current team
        $user->current_team_id = $team->id;
        $user->save();
    }
}
