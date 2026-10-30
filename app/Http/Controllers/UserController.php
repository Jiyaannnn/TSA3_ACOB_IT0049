<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('pages.profile', ['title' => 'Profile', 'activePage' => 'profile', 'user' => User::orderBy('id')->first()]);
    }

    public function index(): View
    {
        // Eloquent reads persisted rows; the same collection supplies rows and filter counts.
        $users = TeamMember::orderBy('id')->get();
        $groups = $users->countBy('team')->all();

        return view('pages.users', ['title' => 'User Accounts', 'activePage' => 'users', 'users' => $users, 'groups' => $groups]);
    }
}
