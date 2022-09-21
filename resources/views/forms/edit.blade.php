@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card shadow">
                    <div class="card-header text-left ">Adesão prestamista</div>
                    <div class="card-body ">

                        <form class="row g-3" method="POST" action="{{ route('forms.update', [$form->id]) }}" role="ajax">
                        @csrf
                            {{method_field('PUT')}}

                            <small>Criado por: {{ $createdUser->name }}</small>
                            <div>
                                    <label class=" mb-2">Status</label>

                                    <div class="mx-auto"
                                        aria-label="Basic radio toggle button group">

                                        <input {{ $form->inactive == 0 ? 'checked' : '' }} type="radio" class="btn-check"
                                            id="active" name="inactive" value="0">
                                        <label class="btn btn-outline-success col-2" for="active">Ativado</label>

                                        <input {{ $form->inactive == 1 ? 'checked' : '' }} type="radio" class="btn-check"
                                            id="inactive" name="inactive" value="1">
                                        <label class="btn btn-outline-danger col-2" for="inactive">Desativado</label>

                                    </div>
                            </div>

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
                                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
