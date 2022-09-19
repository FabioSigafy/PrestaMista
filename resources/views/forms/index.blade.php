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
                    {{-- @if (Auth::user()->{"user-master"} == 0)
                        return redirect('forms')
                    @endif --}}

                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Status </th>
                                <th>CPF </th>
                                <th>Nome</th>
                                <th>Data de nasc.</th>
                                <th>Capital</th>
                                <th>Criado em</th>
                            </tr>
                        </thead>
                        @foreach ($form as $segurado)
                            @php
                                $classOpacity = $segurado->inactive ? 'opacity-25' : '';
                                $classColor = $segurado->inactive ? 'col-12 btn btn-outline-primary' : 'col-12 btn btn-outline-warning';
                            @endphp

                            <tr class="registro">
                                <td class="{{ $classOpacity }}">{{ $segurado->inactive == 0 ? 'Ativado' : 'Desativado' }}
                                </td>
                                <td class="{{ $classOpacity }}">{{ $segurado->document }}</td>
                                <td class="{{ $classOpacity }}">{{ $segurado->name }}</td>
                                <td class="{{ $classOpacity }}">{{ $segurado->date }} </td>
                                <td class="{{ $classOpacity }}">{{ $segurado->deathcover }} </td>
                                <td class="{{ $classOpacity }}">
                                    {{ date('H:i:s d/m/Y', strtotime($segurado->created_at)) }}</td>


                                <td><a class="{{ $classColor }}"
                                        href="{{ route('forms.edit', [$segurado->id]) }}">Editar</a></td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                    <div class="py-4 justify-content-center d-flex">
                        {{ $form->appends(request()->query())->links() }}
                    </div>

                    {{-- <script>
                        var btn = document.getElementById('btn-div');
                        var container = document.querySelector('.registro');
                        btn.addEventListener('click', function() {

                            if (container.style.display === 'block') {
                                container.style.display = 'none';
                            } else {
                                container.style.display = 'block';
                            }
                        });
                    </script> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
