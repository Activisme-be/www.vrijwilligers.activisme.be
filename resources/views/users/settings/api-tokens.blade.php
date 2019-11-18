@extends ('layouts.app', ['title' => 'API tokens'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ ucfirst($currentUser->name) }}</h1>
            <div class="page-subtitle">API tokens</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3">
                @include ('users.components.settings-sidenav', ['user' => $currentUser])
            </div>

            <div class="col-9">
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection
