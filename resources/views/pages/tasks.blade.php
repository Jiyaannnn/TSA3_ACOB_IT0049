@extends('layouts.main')
@section('content')
<section class="page-hero interactive-hero tasks-hero" aria-labelledby="task-hero-title">
    <div class="hero-introduction">
        <p class="eyebrow">SOLUNA DAILY WORKSPACE</p>
        <h1 id="task-hero-title">Every task.<br><em>One clear schedule.</em></h1>
        <p>From roof surveys to handover. Choose a status to focus the solar work ahead.</p>
        <div class="hero-bottomline"><span class="live-dot" aria-hidden="true"></span>{{ $tasks->count() }} scheduled tasks <span>Asia/Manila</span></div>
    </div>
    <div class="hero-console" aria-label="Filter tasks by status">
        <div class="console-heading"><span>WORK AT A GLANCE</span><button type="button" class="filter-reset" data-directory-filter="" aria-pressed="true">Show all ↗</button></div>
        <div class="console-filters">
        @foreach($groups as $status => $total)
            <button type="button" class="console-filter" data-directory-filter="{{ $status }}" aria-pressed="false"><span class="filter-track" aria-hidden="true"></span><span>{{ ucfirst($status) }}</span><b>{{ $total }}</b><span class="filter-arrow" aria-hidden="true">↗</span></button>
        @endforeach
        </div>
        <p class="console-footnote">Select a status to filter the list below. Search works with your selection.</p>
    </div>
</section>
@include('pages.task-table')
@endsection
