<a class="nav-link {{ active('home') }}" href="{{ route('home') }}">
    <i class="fe fe-home mr-1 text-secondary"></i> Dashboard
</a>

<a class="nav-link" href="">
    <i class="fe fe-users text-secondary mr-1"></i> Vrijwilligers
</a>

<a class="nav-link {{ active('teams.*') }}" href="{{ route('teams.index') }}">
    <i class="fe fe-users mr-1"></i> Teams
</a>

<a class="nav-link" href="">
    <i class="fe fe-calendar mr-1"></i> Evenementen
</a>

<a class="nav-link" href="">
    <i class="fe fe-list mr-1"></i> Projecten
</a>

<a class="nav-link {{ active('notes.*') }}" href="{{ route('notes.index') }}">
    <i class="fe fe-file-text mr-1"></i> Notities
</a>
