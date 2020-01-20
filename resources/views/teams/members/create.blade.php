@extends ('layouts.app', ['title' => 'Team leden'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">Een lid toevoegen voor {{ ucfirst($team->name) }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.members.show', $team) }}" class="btn btn-secondary shadow-sm">
                    <i class="fe fe-list mr-2"></i> Ledenoverzicht
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
                <form action="" method="POST" class="card border-0 shadow-sm">
                    @csrf
                    @include ('flash::message')

                    <div class="card-body">
                        <h6 class="border-bottom border-gray pb-1 mb-3">
                            <i class="fe fe-user-plus mr-2 text-muted"></i>Lid toevoegen aan het team
                        </h6>

                        <p class="text-info">
                            <i class="fe fe-info mr-2"></i>
                            U staat op het punt om een vrijwilliger toe te voegen aan {{ ucfirst($team->name) }}. Dit gebeurt op basis van zijn/haar email adres.
                        </p>

                        <hr class="mt-0">

                        <div class="form-row">
                            <div class="form-group mb-0 col-6">
                                <label for="email">E-mail adres <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email', 'is-invalid')" placeholder="Email adres van de vrijwilliger in de applicatie" id="email" @input('email')>
                                @error('email')
                            </div>

                            <div class="form-group mb-0 col-6">
                                <label for="role">Functie<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('role', 'is-invalid')" placeholder="Functie in het team" id="role" @input('role')>
                                @error('role')
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-top-0">
                        <button type="submit" class="btn btn-success">
                            <i class="fe fe-user-plus mr-1"></i> Toevoegen
                        </button>

                        <button type="reset" class="btn btn-light">
                            <i class="fe fe-rotate-ccw text-danger mr-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
