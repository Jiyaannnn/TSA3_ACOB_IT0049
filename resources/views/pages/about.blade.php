@extends('layouts.main')

@section('content')
{{-- Native buttons make the solar explainer work with a mouse, touch, and keyboard. --}}
<section class="page-hero interactive-hero system-hero">
    <div class="hero-introduction"><p class="eyebrow">ABOUT SOLUNA</p><h1>From sunlight<br>to <em>everyday power.</em></h1><p>A Philippine solar supply and installation concept, built around the people who make each project possible.</p><div class="hero-bottomline"><span class="live-dot" aria-hidden="true"></span>Explore a typical grid connected system</div></div>
    <div class="system-explorer">
        <div class="console-heading"><span>FOLLOW THE ENERGY</span><span aria-hidden="true">↘</span></div>
        <div class="energy-path" aria-label="Solar system components">
            <button type="button" data-energy="panels" aria-pressed="true"><svg viewBox="0 0 64 64" aria-hidden="true"><path d="M14 16h36l7 32H7zM32 16v32M11 32h42M32 48v9M23 57h18"/></svg><span>Panels</span></button>
            <span class="energy-link" aria-hidden="true"></span>
            <button type="button" data-energy="inverter" aria-pressed="false"><svg viewBox="0 0 64 64" aria-hidden="true"><rect x="16" y="7" width="32" height="50" rx="5"/><path d="M23 20h18M37 29l-10 10h10l-9 10"/></svg><span>Inverter</span></button>
            <span class="energy-link" aria-hidden="true"></span>
            <button type="button" data-energy="home" aria-pressed="false"><svg viewBox="0 0 64 64" aria-hidden="true"><path d="M7 30 32 9l25 21M14 25v30h36V25M26 55V37h12v18"/></svg><span>Home</span></button>
        </div>
        <div class="energy-description" aria-live="polite"><span data-energy-label>01 / CAPTURE</span><h2 data-energy-title>Start with sunlight.</h2><p data-energy-description>Photovoltaic panels convert sunlight into direct current electricity. Roof space and shade help determine the panel layout.</p></div>
    </div>
</section>
{{-- Escaped values in the profile come from PageController rather than duplicated personal data. --}}
<section class="about-grid"><div class="story"><p class="eyebrow">THE IDEA</p><h2>From first inquiry to power on.</h2><p>Installing solar is more than selling panels. A team listens to a customer, surveys the roof, prepares a suitable system, coordinates equipment, and completes the installation. This workspace puts the customer and team directories at the start of that journey.</p><p>The account lists continue to use Eloquent models. I added task management: today’s tasks on Overview, a complete Task List, and a separate task profile. Migrations define the tables, a seeder supplies sample data, and Blade displays the records through the existing Soluna layout.</p><div class="process"><div><b>01</b><span>Site survey</span></div><div><b>02</b><span>System proposal</span></div><div><b>03</b><span>Installation</span></div><div><b>04</b><span>Monitoring</span></div></div></div><aside class="profile-card"><span class="profile-label">STUDENT DEVELOPER</span><div class="profile-avatar" aria-hidden="true">JA</div><h2>{{ $student['name'] }}</h2><dl><div><dt>Program and section</dt><dd>{{ $student['section'] }}</dd></div><div><dt>Course</dt><dd>{{ $student['course'] }}</dd></div><div><dt>Activity</dt><dd>TSA3 · Tasks for Today Management System</dd></div></dl></aside></section>
@endsection
