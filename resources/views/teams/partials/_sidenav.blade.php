<div class="card">
    <div class="card-header">
        <i class="fe fe-menu mr-2 text-secondary"></i> Opties
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('teams.show', $team) }}" class="list-group-item-action list-group-item {{ active('teams.show', 'font-weight-bold') }}">
            <i class="fe fe-info mr-2 text-secondary"></i> Algemene informatie
        </a>
        <a href="{{ route('teams.members.show', $team) }}" class="list-group-item list-group-item-action {{ active('teams.members.show', 'font-weight-bold') }}">
            <i class="fe fe-users mr-2 text-secondary"></i> Team leden
        </a>
        <a href="{{ route('teams.delete', $team) }}" class="{{ active('teams.delete', 'font-weight-bold') }} list-group-item list-group-item-action">
            <i class="fe fe-trash-2 mr-2 text-danger"></i> Team verwijderen
        </a>
    </div>
</div>
