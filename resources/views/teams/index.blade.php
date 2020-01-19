@extends ('layouts.app', ['title' => 'Teams'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">Overzicht</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.create') }}" class="btn btn-shadow btn-secondary">
                    <i class="fe fe-plus"></i>
                </a>

                <form method="GET" action="" class="border-0 shadow-sm form-search ml-2">
                    <div class="has-search">
                        <label for="search" class="sr-only">Zoek team</label>
                        <span class="fe fe-search form-control-feedback"></span>
                        <input id="search" type="text" name="term" value="{{ request()->get('term') }}" placeholder="Zoeken" class="form-search border-0 form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card card-body border-0 shadow-sm">
            <h6 class="border-bottom border-gray pb-1 mb-3">
                <i class="fe fe-list mr-1"></i> Overzicht van vrijwilliger teams
            </h6>

            @include ('flash::message') {{-- Flash session view partial --}}

            <div class="table-responsive">
                <table class="table table-sm mb-0 table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0" scope="col">Naam</th>
                            <th class="border-top-0" scope="col">Verantwoordelijke</th>
                            <th class="border-top-0" scope="col">Aantal leden</th>
                            <th class="border-top-0" scope="col">Aangemaakt op</th>
                            <th class="border-top-0" scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td class="font-weight-bold">{{ ucfirst($team->owner->name) ?? 'Geen' }}</td>
                                <td class="align-middle">{{ $team->members_count }} leden</td>
                                <td>{{ $team->created_at }} <small class="text-muted">({{ $team->created_at->diffForHumans() }})</small></td>

                                <td> {{-- Options --}}
                                    <span class="float-right">
                                        <a href="{{ route('teams.show', $team) }}" class="text-decoration-none text-secondary">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        <a href="{{ route('teams.delete', $team) }}" class="text-decoration-none text-danger ml-1">
                                            <i class="fe fe-trash-2"></i>
                                        </a>
                                    </span>
                                </td> {{-- /// Options --}}
                            </tr>
                        @empty {{-- There are no volunteer teams in the application --}}
                            <tr>
                                <td colspan="5" class="text-muted">
                                    <i class="fe fe-info"></i> Er zijn momenteel geen teams in de applicatie of gevonden met de matchende criteria
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $teams->links() }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection
