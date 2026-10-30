@extends('layouts.main')
@section('content')
<section class="page-hero"><p class="eyebrow">SOLUNA DAILY WORKSPACE</p><h1>Every task.<br><em>One clear schedule.</em></h1><p>Browse the complete schedule, ordered from the earliest date to the latest.</p></section>
@include('pages.task-table')
@endsection
