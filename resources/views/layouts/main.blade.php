<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbf9f3">
    <meta name="description" content="Soluna Solar Supply & Installation, a Philippine solar project and account workspace.">
    <title>{{ $title }} | Soluna Solar Supply & Installation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Shared styles keep all four pages visually consistent; the second sheet adds the interactive theme. --}}
    <link rel="stylesheet" href="{{ asset('assets/site.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/interactive.css') }}">
    <script src="{{ asset('assets/site.js') }}" defer></script>
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>
    <div class="utility"><div class="shell utility-inner"><span>Solar systems for Philippine homes and businesses</span><span>Project workspace <span class="utility-dot" aria-hidden="true"></span> Philippines</span></div></div>
    <header class="site-header shell">
        <a class="brand" href="{{ route('home') }}" aria-label="Soluna home"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i><i></i></span><span class="brand-text">soluna<span>solar supply & installation</span></span></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav"><span>Menu</span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
        <nav id="site-nav" class="site-nav" aria-label="Primary navigation">
            <a href="{{ route('home') }}" @if($activePage === 'home') aria-current="page" @endif>Welcome</a>
            <a href="{{ route('tasks.index') }}" @if($activePage === 'tasks') aria-current="page" @endif>Task List</a>
            <a href="{{ route('profile') }}" @if($activePage === 'profile') aria-current="page" @endif>Profile</a>
            <a href="{{ route('about') }}" @if($activePage === 'about') aria-current="page" @endif>About</a>
        </nav>
    </header>
    <main id="main-content" class="shell" tabindex="-1">@yield('content')</main>
    <footer class="site-footer"><div class="shell footer-inner"><div><strong>soluna</strong><span>Solar Supply & Installation · Philippines</span></div><p>A Laravel learning project by Jian Edward A. Acob<br>IT0049 · BSITBA - TW32</p></div></footer>
</body>
</html>
