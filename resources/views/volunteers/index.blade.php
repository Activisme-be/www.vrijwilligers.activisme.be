@extends ('layouts.app', ['title' => 'Vrijwilliger'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilligers</h1>
            <div class="page-subtitle">Overzicht</div>

            <div class="page-options d-flex">
                <a href="{{ route('volunteer.create') }}" class="btn btn-secondary shadow-sm mr-2">
                    <i class="fe fe-user-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 shadow-sm fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('volunteer.index') }}">Alle vrijwilligers</a>
                        <a class="dropdown-item" href="{{ route('volunteer.index', ['filter' => 'actief']) }}">Actieve vrijwilligers</a>
                        <a class="dropdown-item" href="{{ route('volunteer.index', ['filter' => 'non-actief']) }}">Non-actieve vrijwilligers</a>
                    </div>
                </div>

                <form method="GET" action="" class="border-0 shadow-sm form-search form-inline ml-2">
                    <div class="form-group has-search">
                        <label for="search" class="sr-only">Zoek vrijwilliger</label>
                        <span class="fe fe-search form-control-feedback"></span>
                        <input id="search" type="text" name="term" value="{{ request()->get('term') }}" placeholder="Zoek vrijwilliger" class="form-search border-0 form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card card-body border-0 shadow-sm">
            <h6 class="border-bottom border-gray pb-1 mb-3">
                <i class="fe fe-users text-muted mr-1"></i> Overzicht van alle vrijwilligers
            </h6>

            <div class="table-responsive">
                <table class="table table-sm mb-0 table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0" scope="col">Naam</th>
                            <th class="border-top-0" scope="col">Status</th>
                            <th class="border-top-0" scope="col">Email adres</th>
                            <th class="border-top-0" scope="col">Geboortedatum</th>
                            <th class="border-top-0" scope="col">&nbsp;</th> {{-- Column specified for the functions --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($volunteers as $volunteer) {{-- Loop trough the volunteers --}}
                            <tr>
                                <td class="font-weight-bold text-muted">{{ ucfirst($volunteer->name) }}</td>
                                <td>
                                    @if ($volunteer->is_active)
                                        <span class="badge badge-active">actief</span>
                                    @else {{-- The user is not active currently --}}
                                        <span class="badge badge-non-active">non-actief</span>
                                    @endif
                                </td>

                                <td><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></td>
                                <td>{{ $volunteer->birth_date->format('d/m/Y') }}</td>

                                <td> {{-- Options --}}
                                    <span class="float-right">
                                        {{-- TODO: Define options --}}
                                    </span>
                                </td> {{-- /// Options --}}
                            </tr>
                        @empty {{-- There are no volunteers in the application --}}
                            <tr>
                                <td class="text-muted" colspan="5">
                                    <i class="fe fe-info mr-1"></i> Er zijn momenteel geen vrijwilligers in de organisatie.
                                </td>
                            </tr>
                        @endforelse {{-- /// END volunteer loop --}}
                    </tbody>
                </table>
            </div>

            {{ $volunteers->links() }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection
