@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Criar prestamista</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('forms.store') }}" role="ajax">
							@csrf
                            <div class="row mb-3">
                                <label for="document" class="col-md-4 col-form-label text-md-end">CPF</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control mask-cpf" name="document" id="document" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name= "name" id="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-form-label text-md-end">Data</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="date" id="date" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="deathcover" class="col-md-4 col-form-label text-md-end">Capital</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control mask-money" name="deathcover" id="deathcover" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
