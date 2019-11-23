<div class="list-group list-group-transparent list-group-flush">
    <a href="{{ route('teams.show', $team) }}" class="list-group-item-action list-group-item {{ active('teams.show') }}">
        <i class="fe fe-info mr-2 text-secondary"></i> Algemene informatie
    </a>
    <a href="" class="list-group-item list-group-item-action">
        <i class="fe fe-users mr-2 text-secondary"></i> Team leden
    </a>
    <a href="" class="list-group-item list-group-item-action">
        <i class="fe fe-trash-2 mr-2 text-danger"></i> Team verwijderen
    </a>
</div>
