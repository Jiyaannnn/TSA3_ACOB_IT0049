@extends('layouts.main')

@section('content')
{{-- The banner and directory share one Eloquent collection, so filter counts reflect the displayed records. --}}
<section class="page-hero interactive-hero users-hero">
    <div class="hero-introduction">
        <p class="eyebrow">THE SOLUNA TEAM</p>
        <h1>User <em>accounts.</em></h1>
        <p>Five familiar people, one coordinated team. Choose a team to explore the people behind the work.</p>
        <div class="hero-bottomline"><span class="live-dot" aria-hidden="true"></span>{{ count($users) }} sample accounts <span>Philippines</span></div>
    </div>
    <div class="hero-console">
        <div class="console-heading"><span>TEAM ROSTER</span><button type="button" class="filter-reset" data-directory-filter="" aria-pressed="true">Show all ↗</button></div>
        <div class="console-filters">
        @foreach($groups as $group => $total)
            <button type="button" class="console-filter" data-directory-filter="{{ $group }}" aria-pressed="false"><span class="filter-track" aria-hidden="true"></span><span>{{ $group }}</span><b>{{ $total }}</b><span class="filter-arrow" aria-hidden="true">↗</span></button>
        @endforeach
        </div>
        <p class="console-footnote">Select a row to filter the directory below.</p>
    </div>
</section>
<section class="listing-heading"><div><p class="eyebrow">TEAM DIRECTORY</p><h2>Everyone has a part</h2><p>Sample user records retrieved from the database.</p></div><span class="read-only">READ-ONLY PREVIEW</span></section>
<div class="directory-tools"><label for="directory-search">Search team members, roles, or locations</label><div class="search-field"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.7" cy="10.7" r="6.7"/><path d="m16 16 5 5"/></svg><input id="directory-search" type="search" autocomplete="off" placeholder="Search user accounts…" data-directory-search></div><p role="status" aria-live="polite" data-directory-count>{{ count($users) }} accounts shown</p></div>
<div class="table-wrap"><table data-directory-table><thead><tr><th scope="col">Team member</th><th scope="col">Role</th><th scope="col">Team</th><th scope="col">Base</th><th scope="col">Status</th></tr></thead><tbody>
{{-- Blade loops create one escaped table row for each database record. --}}
@foreach($users as $user)
<tr data-filter-value="{{ $user->team }}"><td data-label="Team member"><span class="person-name"><span class="person-avatar" aria-hidden="true">{{ collect(explode(' ', $user->full_name))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->implode('') }}</span><span><span class="account-name">{{ $user->full_name }}</span><small>{{ '@'.$user->username }} · {{ $user->code }}</small></span></span></td><td data-label="Role">{{ $user->role }}</td><td data-label="Team">{{ $user->team }}</td><td data-label="Base">{{ $user->location }}</td><td data-label="Status"><span class="status status-active">{{ $user->status }}</span></td></tr>
@endforeach
</tbody></table><p class="directory-empty" data-directory-empty hidden>No user accounts match that search. Try a name, role, or city.</p></div>
<div class="listing-note"><span aria-hidden="true">↗</span><p>This is a display of sample roles. It does not provide sign-in or store passwords.</p></div>
@endsection
