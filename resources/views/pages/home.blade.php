@extends('layouts.main')

@section('content')
{{-- The landing hero links directly to named Laravel routes and introduces the shop. --}}
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow"><span class="eyebrow-line"></span> SOLAR PROJECT WORKSPACE · PHILIPPINES</p>
        <h1 id="hero-title">Powering plans.<br><em>Connecting people.</em></h1>
        <p class="hero-lead">A practical home for the customer relationships and field teams behind every solar installation.</p>
        <div class="hero-actions"><a class="button button-primary" href="{{ route('customers.index') }}">Explore customer accounts <span aria-hidden="true">↗</span></a><a class="button button-text" href="{{ route('about') }}">About the project <span aria-hidden="true">→</span></a></div>
        <div class="hero-proof"><span class="proof-icon" aria-hidden="true">✳</span><span><strong>From inquiry to installation</strong><small>A six page Laravel foundation built for the Philippine solar setting</small></span></div>
    </div>
    <div class="solar-scene rooftop-explorer">
        <img src="{{ asset('assets/solar-rooftop-ph.png') }}" width="1586" height="1024" fetchpriority="high" alt="Illustrative image of technicians working on solar panels atop a Philippine home at sunset">
        <span class="scene-label">SOLAR IN MOTION <span>PHILIPPINES / 2026</span></span>
        {{-- Hotspots use real buttons; the selected explanation is announced without moving focus. --}}
        <div class="rooftop-markers" role="group" aria-label="Explore the rooftop installation">
            <button type="button" class="rooftop-marker marker-panels" data-rooftop="panels" aria-pressed="true" aria-controls="rooftop-detail"><span aria-hidden="true">01</span> Panels</button>
            <button type="button" class="rooftop-marker marker-crew" data-rooftop="crew" aria-pressed="false" aria-controls="rooftop-detail"><span aria-hidden="true">02</span> Crew</button>
            <button type="button" class="rooftop-marker marker-home" data-rooftop="home" aria-pressed="false" aria-controls="rooftop-detail"><span aria-hidden="true">03</span> Home</button>
        </div>
        <div class="rooftop-detail" id="rooftop-detail" aria-live="polite" aria-atomic="true">
            <div class="rooftop-detail-heading"><span data-rooftop-label>01 / SOLAR ARRAY</span><span class="rooftop-badge">ILLUSTRATIVE SYSTEM</span></div>
            <strong data-rooftop-title>5.5 kWp on the rooftop</strong>
            <p data-rooftop-copy>The sample system's rated panel capacity. Actual output varies with sunlight, shade, and site conditions.</p>
        </div>
        <span class="rooftop-hint">Select a marker to explore <span aria-hidden="true">↗</span></span>
    </div>
</section>

{{-- Summary figures describe the current sample dataset and application scope. --}}
<section class="overview-strip" aria-label="Workspace summary"><div><span class="strip-icon" aria-hidden="true">☼</span><strong>Solar, made practical</strong><small>Projects grounded in the Philippine setting</small></div><div><strong>05</strong><small>Sample customer accounts</small></div><div><strong>05</strong><small>Sample team accounts</small></div><div><strong>06</strong><small>Connected application pages</small></div></section>

<section class="section-intro"><div><p class="eyebrow">THE WORKSPACE</p><h2>Follow the work<br>behind the power.</h2></div><p>This Laravel workspace continues the same six page structure as the earlier POS activity. Customer and user records now come from a database through Eloquent models.</p></section>
{{-- The two linked cards provide another route to the account directories. --}}
<section class="feature-grid" aria-label="Account sections"><a class="feature-card feature-customer" href="{{ route('customers.index') }}"><span class="feature-top"><small>01 · PROJECT PIPELINE</small><span aria-hidden="true">↗</span></span><span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 80 80"><path d="M13 63h54M20 62V34l20-16 20 16v28M30 62V42h20v20M9 35l31-25 31 25"/></svg></span><strong>Customer accounts</strong><span>See the households and businesses behind each proposed solar system.</span></a><a class="feature-card feature-team" href="{{ route('users.index') }}"><span class="feature-top"><small>02 · PEOPLE & ROLES</small><span aria-hidden="true">↗</span></span><span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 80 80"><circle cx="40" cy="27" r="12"/><path d="M17 68c0-13 10-23 23-23s23 10 23 23M13 22h9M58 22h9M40 4v8"/></svg></span><strong>User accounts</strong><span>Meet the sales, survey, installation, and operations team.</span></a></section>
<section class="solar-workflow" aria-labelledby="workflow-title"><div class="workflow-heading"><p class="eyebrow">WHAT AN INSTALLATION TAKES</p><h2 id="workflow-title">More than panels<br>on a roof.</h2><p>Each account connects to real decisions in a solar project. The current site is a read only foundation for later POS and project features.</p></div><div class="workflow-steps"><div><span>01 / SURVEY</span><strong>Understand the site</strong><p>Roof space, shade, and electricity use shape the proposed system.</p></div><div><span>02 / PLAN</span><strong>Match the components</strong><p>Panel capacity and inverter selection follow the customer's needs.</p></div><div><span>03 / INSTALL</span><strong>Coordinate the crew</strong><p>Technicians and operations staff carry the project through handover.</p></div></div></section>
<section class="section-intro"><div><p class="eyebrow">DAILY TASKS</p><h2>Make room for today.</h2></div><p>Task management joins the existing customer and team directories. Browse today's priorities, the complete schedule, or the profile.</p></section>
<div class="hero-actions"><a class="button button-primary" href="{{ route('tasks.index') }}">View all tasks →</a><a class="button button-text" href="{{ route('profile') }}">Profile →</a></div>
@include('pages.task-table')
@endsection
