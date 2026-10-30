@extends('layouts.main')
@section('content')
<section class="page-hero interactive-hero profile-hero" aria-labelledby="profile-title">
    <div class="hero-introduction">
        <p class="eyebrow">THE PERSON BEHIND SOLUNA</p>
        <h1 id="profile-title">A little about<br><em>the developer.</em></h1>
        <p>Meet the student building Soluna’s solar workspace. Explore my background, course, and project.</p>
        <div class="hero-bottomline"><span class="live-dot" aria-hidden="true"></span>Jian Edward A. Acob <span>BSITBA · TW32</span></div>
    </div>
    <div class="hero-console">
        <div class="console-heading"><span>DEVELOPER SNAPSHOT</span><span aria-hidden="true">↘</span></div>
        <div class="console-filters" role="group" aria-label="Explore the developer profile">
            <button class="console-filter" type="button" data-profile-topic data-profile-title="Jian Edward A. Acob" data-profile-copy="I am a BSITBA student in section TW32, developing Soluna as my IT0049 learning project." aria-pressed="true" aria-controls="profile-detail"><span class="filter-track" aria-hidden="true"></span><span>About me</span><span class="filter-arrow" aria-hidden="true">↗</span></button>
            <button class="console-filter" type="button" data-profile-topic data-profile-title="Web System Technologies" data-profile-copy="In IT0049, I use Laravel routes, controllers, Eloquent models, migrations, and Blade views to build a database-backed application." aria-pressed="false" aria-controls="profile-detail"><span class="filter-track" aria-hidden="true"></span><span>My course</span><span class="filter-arrow" aria-hidden="true">↗</span></button>
            <button class="console-filter" type="button" data-profile-topic data-profile-title="Soluna Solar Supply & Installation" data-profile-copy="My TSA3 adds daily solar tasks, status filters, and this profile alongside the existing customer and team account directories." aria-pressed="false" aria-controls="profile-detail"><span class="filter-track" aria-hidden="true"></span><span>My project</span><span class="filter-arrow" aria-hidden="true">↗</span></button>
        </div>
        <div class="energy-description" id="profile-detail" aria-live="polite" aria-atomic="true"><h2 data-profile-detail-title>Jian Edward A. Acob</h2><p data-profile-detail-copy>I am a BSITBA student in section TW32, developing Soluna as my IT0049 learning project.</p></div>
    </div>
</section>
<section class="about-grid"><div class="story"><p class="eyebrow">MY LARAVEL PROJECT</p><h2>Learning through<br>every solar project.</h2><p>I built this workspace for IT0049 — Web System Technologies. It brings customer accounts, team members, and daily solar tasks together using Laravel and Eloquent.</p><p>My profile is the single record in the users table. The five existing Soluna team accounts remain in their own directory.</p><a class="button button-primary" href="{{ route('tasks.index') }}">Explore the schedule →</a></div><aside class="profile-card"><span class="profile-label">STUDENT DEVELOPER</span><div class="profile-avatar" aria-hidden="true">JA</div>@if($user)<h2>{{ $user->full_name }}</h2><dl><div><dt>Username</dt><dd>{{ $user->username }}</dd></div><div><dt>Demo email</dt><dd>{{ $user->email }}</dd></div><div><dt>Program and section</dt><dd>BSITBA · TW32</dd></div><div><dt>Course</dt><dd>IT0049 — Web System Technologies</dd></div></dl><p>The email is a sample address for this activity.</p>@else<p>No profile record is available.</p>@endif</aside></section>
@endsection
