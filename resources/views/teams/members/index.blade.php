@extends ('layouts.app', ['title' => 'Team leden'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilliger teams</h1>
            <div class="page-subtitle">Leden overzicht van {{ ucfirst($team->name) }}</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.members.create', $team) }}" class="btn btn-secondary shadow-sm">
                    <i class="fe fe-plus"></i>
                </a>

                <form method="GET" action="" class="border-0 shadow-sm form-inline ml-2">
                    <div class="form-group has-search">
                        <label for="search" class="sr-only">Zoek lid</label>
                        <span class="fe fe-search form-control-feedback"></span>
                        <input id="search" type="text" name="term" value="{{ request()->get('term') }}" placeholder="Zoeken" class="form-search border-0 form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3">
                @include ('teams.partials._sidenav', ['team' => $team])
            </div>

            <div class="col-9">
                <div class="card card-body border-0 shadow-sm">
                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        <i class="text-muted fe fe-users mr-1"></i> Leden overzicht van {{ ucfirst($team->name) }}
                    </h6>


                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Naam</th>
                                    <th scope="col" class="border-top-0">Functie</th>
                                    <th scope="col" class="border-top-0">Status</th>
                                    <th scope="col" class="border-top-0">Email</th>
                                    <th scope="col" class="border-top-0">Lid sinds</th>
                                    <th scope="col" class="border-top-0">&nbsp;</th> {{-- Specific column for the functions only --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members as $member) {{-- Loop trough the team members --}}
                                    <tr>
                                        <td></td>
                                    </tr>
                                @empty {{-- There are no memebers found --}}
                                    <tr>
                                        <td colspan="6" class="text-muted">
                                            <i class="fe fe-info mr-2"></i> Er zijn momenteel nog geen vrijwilligers als lid onder dit team.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $members->links() }} {{-- Pagination view instance --}}
                </div>
            </div>
        </div>
    </div>
@endsection
