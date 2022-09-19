@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card">
                    <div class="card-header text-black fw-bold text-center ">Adesões prestamista
                    </div>
                    <form action="{{ route('forms.index') }}" method="get">
                        <div class="card-body ">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-outline-primary" href="{{ route('forms.create') }}" role="button">Criar
                                    novo</a>

                                @if (Auth::user()->{"user-master"} == 1)
                                    <a class="btn btn-outline-primary" href="{{ route('excel') }}"
                                        role="button">Relatório</a>
                                    <a class="btn btn-outline-primary" href="{{ route('register') }}" role="button">Novo
                                        Usuário</a>
                                @endif

                            </div>
                    </form>
{{--
                    @if (Auth::user()->{"user-master"} == 0)
                        return redirect('forms')
                    @endif --}}

                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>CPF </th>
                                <th>Nome</th>
                                <th>Data de nasc.</th>
                                <th>Capital</th>
                                <th>Criado em</th>
                            </tr>
                        </thead>
                        @foreach ($form as $segurado)
                            <tr class="registro">
                                <td>{{ $segurado->document }}</td>
                                <td>{{ $segurado->name }}</td>
                                <td>{{ $segurado->date }} </td>
                                <td>{{ $segurado->deathcover }} </td>
                                <td>{{ date('H:i:s d/m/Y', strtotime($segurado->created_at)) }}</td>

                                <td><a class=" col-12 btn btn-outline-warning "
                                        href="{{ route('forms.edit', [$segurado->id]) }}">Editar</a></td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                    <div class="py-4 justify-content-center d-flex">
                        {{ $form->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
