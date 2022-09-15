@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card">
                    <div class="card-header text-black fw-bold text-center ">Adesão prestamista</div>
                    <div class="card-body ">

                        <form class="row g-3" method="POST" action="{{ route('forms.update', [$form->id]) }}" role="ajax">
                        @csrf
                            {{method_field('PUT')}}
                            <div class="col-md-6">
                                <label for="document" class="form-label">CPF</label>
                                <input type="text" class="form-control mask-cpf" name="document" id="document"
                                    value="{{ $form->document }}">
                            </div>
                            <div class="col-6">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $form->name }}">
                            </div>
                            <div class="col-6">
                                <label for="date" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    value="{{ $form->date }}">
                            </div>
                            <div class="col-md-6">
                                <label for="deathcover" class="form-label">Capital</label>
                                <input type="text" class="form-control mask-money" name="deathcover" id="deathcover"
                                    value="{{ $form->deathcover }}">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-primary">Editar</button>
                            </div>
                        </form>
                        <!-- JavaScript Bundle with Popper -->
                        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
                        </script> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
