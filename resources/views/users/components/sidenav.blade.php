@php
    /** @var \App\Models\User $currentUser */
    /** @var \App\Models\User $user */
@endphp

<div class="list-group list-group-transparent list-group-flush">
    <a href="{{ route('users.show', $user) }}" class="{{ active('users.show') }} list-group-item list-group-item-action">
        <i class="fe fe-info text-secondary mr-2"></i> Algemene informatie
    </a>

    <a href="{{ route('users.activity', $user) }}" class="{{ active('users.activity') }} list-group-item list-group-item-action">
        <i class="fe fe-activity mr-2 text-secondary"></i> Activiteiten
    </a>

    <a href="mailto: {{ $user->email }}" class="list-group-item list-group-item-action">
        <i class="fe fe-mail text-secondary mr-2"></i> E-mail persoon
    </a>

    @if ($user->isBanned() && $currentUser->can('activate-user', $user))
        <a href="{{ route('users.unlock', $user) }}" class="{{ active('users.unlock') }} list-group-item list-group-item-action">
            <i class="fe fe-unlock text-secondary mr-2"></i> Actieveer login
        </a>
    @elseif ($currentUser->can('deactivate-user', $user)) {{-- User is not banned --}}
        <a href="{{ route('users.lock', $user) }}" class="{{ active('users.lock') }} list-group-item list-group-item-action">
            <i class="fe fe-lock text-secondary mr-2"></i> Blokkeer login
        </a>
    @endif

    <a href="{{ route('users.destroy', $user) }}" class="{{ active('users.destroy') }} list-group-item list-group-item-action">
        <i class="fe fe-user-x text-danger mr-2"></i> Verwijder login
    </a>
</div>
