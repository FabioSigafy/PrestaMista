@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card">
                    <div class="card-header  text-left">Adesão prestamista</div>
                    <div class="card-body  shadow">
                        <form method="POST" action="{{ route('forms.store') }}" role="ajax">
                            @csrf
                            <div class="col-md-6  mb-3 ">
                                <label for="document" class="form-label">CPF</label>
                                <input type="text" class="form-control mask-cpf" name="document" id="document">
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" name= "name" id="name">
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <label for="date" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-md-6  mb-3 ">
                                <label for="deathcover" class="form-label">Capital</label>
                                <input type="text" class="form-control mask-money" name="deathcover" id="deathcover">
                            </div>



                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

