@extends('layouts.main')

@section('content')
{{-- The landing hero links directly to named Laravel routes and introduces the shop. --}}
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow"><span class="eyebrow-line"></span> SOLAR PROJECT WORKSPACE · PHILIPPINES</p>
        <h1 id="hero-title">A clear plan.<br><em>For today.</em></h1>
        <p class="hero-lead">Your daily task workspace. Focus on today, then explore the full schedule.</p>
        <div class="hero-actions"><a class="button button-primary" href="{{ route('tasks.index') }}">View all tasks <span aria-hidden="true">↗</span></a><a class="button button-text" href="{{ route('about') }}">About the project <span aria-hidden="true">→</span></a></div>
        <div class="hero-proof"><span class="proof-icon" aria-hidden="true">✳</span><span><strong>One day at a time</strong><small>Tasks for Today Management System · Laravel</small></span></div>
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

@include('pages.task-table')
@endsection
