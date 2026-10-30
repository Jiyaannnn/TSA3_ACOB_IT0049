@extends('layouts.main')

@section('content')
{{-- The banner and directory share one Eloquent collection, so filter counts reflect the displayed records. --}}
<section class="page-hero interactive-hero customers-hero">
    <div class="hero-introduction">
        <p class="eyebrow">PROJECT PIPELINE</p>
        <h1>Customer <em>accounts.</em></h1>
        <p>Explore the households and businesses behind each solar installation. Choose a stage to focus the directory.</p>
        <div class="hero-bottomline"><span class="live-dot" aria-hidden="true"></span>{{ count($customers) }} sample accounts <span>Philippines</span></div>
    </div>
    <div class="hero-console">
        <div class="console-heading"><span>PROJECT STAGES</span><button type="button" class="filter-reset" data-directory-filter="" aria-pressed="true">Show all ↗</button></div>
        <div class="console-filters">
        @foreach($groups as $group => $total)
            <button type="button" class="console-filter" data-directory-filter="{{ $group }}" aria-pressed="false"><span class="filter-track" aria-hidden="true"></span><span>{{ $group }}</span><b>{{ $total }}</b><span class="filter-arrow" aria-hidden="true">↗</span></button>
        @endforeach
        </div>
        <p class="console-footnote">Select a row to filter the directory below.</p>
    </div>
</section>
<section class="listing-heading"><div><p class="eyebrow">CUSTOMER DIRECTORY</p><h2>People behind the projects</h2><p>Sample customer records retrieved from the database.</p></div><span class="read-only">READ-ONLY PREVIEW</span></section>
<div class="directory-tools"><label for="directory-search">Search customers, locations, or stages</label><div class="search-field"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.7" cy="10.7" r="6.7"/><path d="m16 16 5 5"/></svg><input id="directory-search" type="search" autocomplete="off" placeholder="Search customer accounts…" data-directory-search></div><p role="status" aria-live="polite" data-directory-count>{{ count($customers) }} accounts shown</p></div>
<div class="table-wrap"><table data-directory-table><thead><tr><th scope="col">Account</th><th scope="col">Location</th><th scope="col">Project type</th><th scope="col">Capacity</th><th scope="col">Stage</th></tr></thead><tbody>
{{-- Blade loops create one escaped table row for each database record. --}}
@foreach($customers as $customer)
<tr data-filter-value="{{ $customer->status }}"><td data-label="Account"><span class="account-name">{{ $customer->full_name }}</span><small>{{ $customer->code }}</small><small>{{ $customer->email }}</small><small>{{ $customer->phone ?? 'Phone not provided' }}</small></td><td data-label="Location">{{ $customer->location }}</td><td data-label="Project type">{{ $customer->project }}</td><td data-label="Capacity">{{ $customer->capacity }}</td><td data-label="Stage"><span class="status status-{{ \Illuminate\Support\Str::slug($customer->status) }}">{{ $customer->status }}</span></td></tr>
@endforeach
</tbody></table><p class="directory-empty" data-directory-empty hidden>No customer accounts match that search. Try a name, city, or project stage.</p></div>
<div class="listing-note"><span aria-hidden="true">↗</span><p>These project names and capacities are sample data for the activity. No quotation, sale, or live customer record is created here.</p></div>
@endsection
