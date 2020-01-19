@extends ('layouts.app', ['title' => 'Team verwijderen'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">{{ ucfirst($team->name) }} verwijderen als team.</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.index') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3">
                @include ('teams.partials._sidenav', ['team' => $team])
            </div>

            <div class="col-9">
                <form action="{{ route('teams.delete', $team) }}" method="POST" class="card border-0 shadow-sm">
                    @csrf
                    @method ('DELETE')

                    <div class="card-body">
                        <h6 class="border-bottom border-gray pb-1 mb-3"><i class="fe fe-trash-2 text-danger mr-1"></i> {{ ucfirst($team->name) }} verwijderen als team</h6>

                        <p class="card-text text-danger">
                            <i class="fe fe-alert-triangle mr-1"></i> U staat op het punt een een team te verwijderen.
                        </p>

                        <p class="card-text">
                            Bij het verwijderen van {{ ucfirst($team->name) }} als vrijwilligers team zal alle data worden verwijderen alsook zullen
                            de vrijwilligers die bij het team horen worden losgekoppeld. Vandaar dat we u vragen om zeker te zijn in je beslissing om dit
                            team te verwijderen. Want deze actie kan niet ongedaan worden gemaakt.
                        </p>
                    </div>

                    <div class="card-footer border-top-0">
                        <button type="submit" class="btn btn-danger">
                            <i class="fe fe-trash-2 mr-1"></i> Verwijderen
                        </button>
                        <a href="{{ route('teams.show', $team) }}" class="btn btn-light" role="button">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
