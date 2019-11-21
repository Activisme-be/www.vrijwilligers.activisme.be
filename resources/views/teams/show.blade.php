@extends ('layouts.app', ['title' => 'Team overzicht'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">Team Informatie</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.index') }}" class="btn btn-secondary shadow-sm" role="button">
                    <i class="fe fe-list mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidenav --}}

            </div> {{-- /// END sidenav --}}

            <div class="col-9"> {{-- Content --}}
                <div class="card border-0 shadow-sm">
                    <form action="" method="POST" id="team-info-form" class="card-body">

                    </form>

                    <div class="card-footer border-top-0 bg-card-footer">
                        <button class="btn btn-success" type="submit" form="team-info-form">Aanpassen</button>
                        <button class="btn btn-light" type="reset" form="team-info-form">
                            <i class="fe fe-rotate-ccw  text-danger mr-1"></i> Reset
                        </button>
                    </div>
                </div>
            </div> {{-- content --}}
        </div>
    </div>
@endsection
