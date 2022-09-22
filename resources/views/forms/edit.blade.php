@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-3">
                <div class="card">
                    <div class="card-header text-black text-left ">Editar seguro prestamista</div>
                    <div class="card-body ">

                        <form class="row g-3" method="POST" action="{{ route('forms.update', [$form->id]) }}" role="ajax">
                        @csrf
                            {{method_field('PUT')}}

                            <div class="mb-3">


                                <div class="mb-0 text-center">
                                    <label class="mb-2">Status</label>

                                    <div class="mx-auto text-center"
                                        aria-label="Basic radio toggle button group">

                                        <input {{ $form->inactive == 0 ? 'checked' : '' }} type="radio" class="btn-check"
                                            id="active" name="inactive" value="0">
                                        <label class="btn btn-outline-success col-2" for="active">Ativado</label>

                                        <input {{ $form->inactive == 1 ? 'checked' : '' }} type="radio" class="btn-check"
                                            id="inactive" name="inactive" value="1">
                                        <label class="btn btn-outline-danger col-2" for="inactive">Desativado</label>

                                    </div>


                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="document" class="col-md-4 col-form-label text-md-end">CPF</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control mask-cpf" name="document" id="document" autofocus
									value="{{ $form->document }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name= "name" id="name" autofocus
									value="{{ $form->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-form-label text-md-end">Data</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control mask-data" name="date" id="date" autofocus
									value="{{ $form->date }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="deathcover" class="col-md-4 col-form-label text-md-end">Capital</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control mask-money" name="deathcover" id="deathcover" autofocus
									value="{{ $form->deathcover }}">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
