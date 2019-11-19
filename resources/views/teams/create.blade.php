@extends ('layouts.app', ['title' => 'Team toevoegen'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">Team toevoegen</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fe fe-users mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card shadow-sm border-0">
            <form action="{{ route('teams.store') }}" id="create-form" method="POST" class="card-body">
                <h6 class="border-bottom border-gray pb-1 mb-3">
                    <i class="fe fe-plus mr-1 text-muted"></i> Team van vrijwilligers toevoegen
                </h6>

                @csrf {{-- Form field protection --}}

                <div class="form-row">
                    <div class="form-group col-8">
                        <label for="name">Naam <span class="text-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name', 'is-invalid')" placeholder="Naam van de ploeg" @input('name')>
                        @error('name')
                    </div>

                    <div class="form-group col-4">
                        <label for="owner">Verantwoordelijke <span class="text-danger">*</span></label>

                        <select id="owner" class="custom-select" @error('verantwoordelijke', 'is-invalid')>
                            <option value="">-- Selecteer verantwoordelijke --</option>

                            @foreach ($users as $user) {{-- loop trough the applications users --}}
                                <option value="{{ $user->id }}" @if (old('verantwoordelijke') === $user->id) selected @endif>
                                    {{ ucfirst($user->voornaam) }} {{ ucfirst($user->achternaam) }}
                                </option>
                            @endforeach {{-- /// END loop --}}
                        </select>

                        @error('verantwoordelijke') {{-- Validation error view partial --}}
                    </div>

                    <div class="form-group mb-0 col-12">
                        <label for="description">Beschrijving</label>
                        <textarea id="description" class="form-control" rows="4" placeholder="Korte beschrijving van het team">{{ old('description') }}</textarea>
                    </div>
                </div>
            </form>

            <div class="card-footer bg-card-footer border-top-0">
                <button type="submit" form="create-form" class="btn btn-success">
                    <i class="fe fe-save mr-1"></i> Toevoegen
                </button>

                <button type="reset" form="create-form" class="btn btn-light">
                    <i class="fe fe-rotate-ccw text-danger"></i> Reset
                </button>
            </div>
        </div>
    </div>
@endsection
