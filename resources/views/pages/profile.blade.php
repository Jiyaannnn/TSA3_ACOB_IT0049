@extends('layouts.main')
@section('content')
<section class="page-hero"><p class="eyebrow">THE PERSON BEHIND THE PLAN</p><h1>My <em>profile.</em></h1><p>The single sample account carried over from TSA1.</p></section>
<section class="about-grid"><div class="story"><p class="eyebrow">DAILY WORKSPACE</p><h2>A familiar account.<br>A new foundation.</h2><p>This profile uses the same sample user as my earlier task management system. Laravel retrieves the record from the database through the User Eloquent model.</p><a class="button button-primary" href="{{ route('tasks.index') }}">Explore the schedule →</a></div><aside class="profile-card"><span class="profile-label">SAMPLE USER</span><div class="profile-avatar" aria-hidden="true">MS</div>@if($user)<h2>{{ $user->full_name }}</h2><dl><div><dt>Username</dt><dd>{{ $user->username }}</dd></div><div><dt>Email</dt><dd>{{ $user->email }}</dd></div></dl>@else<p>No profile record is available.</p>@endif</aside></section>
@endsection
