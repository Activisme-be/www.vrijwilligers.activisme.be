@extends ('layouts.app', ['title' => 'Vrijwilliger toevoegen'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Vrijwilligers</h1>
            <div class="page-subtitle">Vrijwilliger toevoegen</div>

            <div class="page-options d-flex">
                <a href="{{ route('volunteer.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fe fe-list mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <form action="{{ route('volunteer.store') }}" method="POST" class="card border-0 shadow-sm">
            @csrf

            <div class="card-body">
                <h6 class="border-bottom border-gray pb-1 mb-3">
                    <i class="fe fe-user-plus text-muted mr-1"></i> Vrijwillliger toevoegen
                </h6>

                <div class="form-row">
                    <div class="form-group col-9">
                        <label for="name">Naam <span class="text-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name', 'is-invalid')" placeholder="Naam van de vrijwilliger (voornaam + achternaam)" @input('name')>
                        @error('name')
                    </div>

                    <div class="form-group col-3">
                        <label for="publish_date">Geboortedatum <span class="text-danger">*</span></label>
                        <input type="text" autocomplete="off" class="form-control datepicker @error('birth_date', 'is-invalid')" @input('birth_date')>
                        @error('birth_date')
                    </div>

                    <div class="form-group col-6">
                        <label for="email">Email adres <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email', 'is-invalid')" placeholder="Email adres van de vrijwilliger" @input('email')>
                        @error('email')
                    </div>

                    <div class="form-group col-6">
                        <label for="number">Tel. nummer</label>
                        <input type="text" class="form-control" placeholder="Telefoon nummer van de vrijwilliger" @input('phone_number')>
                    </div>
                </div>

                <hr class="mt-0">

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="information">Extra informatie</label>
                        <textarea placeholder="Extra informatie omtrent de vrijwilliger" @input('extra_information') class="form-control" id="information" rows="5">{{ old('extra_information') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-top-0 card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fe fe-user-plus mr-1"></i> Toevoegen
                </button>
            </div>
        </form>
    </div>
@endsection
