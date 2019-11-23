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
                @include ('teams.partials._sidenav', ['team' => $team])
            </div> {{-- /// END sidenav --}}

            <div class="col-9"> {{-- Content --}}
                <div class="card border-0 shadow-sm">
                    <form action="" method="POST" id="team-info-form" class="card-body">
                        <h6 class="border-bottom border-gray pb-1 mb-3"><i class="text-muted fe fe-info mr-1"></i> Team informatie</h6>

                        @csrf               {{-- Form field protection --}}
                        @form ($team)       {{-- Bind the team data to the form --}}
                        @method ('PATCH')   {{-- Method spoofing --}}

                        <div class="form-row">
                            <div class="form-group col-7">
                                <label for="name">Naam <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control @error('name', 'is-invalid')" placeholder="Team naam" @input('name')>
                                @error('name')
                            </div>

                            <div class="form-group col-5">
                                <label for="verantwoordelijke">Verantwoordelijke <span class="text-danger">*</span></label>

                                <select id="verantwoordelijke" class="custom-select @error('verantwoordelijke', 'is-invalid')" @input('verantwoordelijke')>
                                    <option value="">-- Selecteer verantwoordelijke --</option>

                                    @foreach ($users as $user) {{-- loop trough the applications users --}}
                                        <option value="{{ $user->id }}" @if (old('verantwoordelijke') === $user->id || $user->id === $team->owner_id) selected @endif>
                                            {{ ucfirst($user->voornaam) }} {{ ucfirst($user->achternaam) }}
                                        </option>
                                    @endforeach {{-- /// END loop --}}
                                </select>

                                @error('verantwoordelijke') {{-- Validation error view partial --}}
                            </div>

                            <div class="form-group mb-0 col-12">
                                <label for="description">Beschrijving</label>
                                <textarea id="description" class="form-control" rows="4" @input('description') placeholder="Korte beschrijving van het team">{{ $team->description ?? old('description') }}</textarea>
                            </div>
                        </div>
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
