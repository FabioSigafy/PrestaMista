@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card shadow">
                    <div class="card-header text-left ">Adesões prestamista</div>
                    <form action="{{ route('forms.index') }}" method="get">
                        <div class="card-body ">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-outline-primary" href="{{ route('forms.create') }}" role="button"><i
                                        class="fa-solid fa-plus"></i>
                                    Novo</a>

                                @if (Auth::user()->user_master)
                                    <a class="btn btn-outline-primary" href="{{ route('excel') }}" role="button"><i
                                            class="fa-solid fa-folder-open"></i> Relatório</a>
                                @endif

                            </div>


                    </form>

                    <div class="table-responsive">

                        <div class="shadow rounded mb-2 mt-3 border" style="background-color:#eeeeee">


                            <div class="d-grid gap-2 d-md-flex justify-content-md-start m-2 ">

                                <form action="{{ route('forms.index') }}" method="GET">

                                    <select name="status" class="p-2 rounded border">
                                        <option value="">Status</option>
                                        <option value="0">Ativado</option>
                                        <option value="1">Desativado</option>
                                    </select>

                                    <input class="p-2 rounded border " type="text " name="CPF" placeholder="CPF">
                                    <input class="p-2 rounded border " type="text " name="name" placeholder="Nome">
                                    <input type="date" class="p-2 rounded border " type="text " name="data"
                                        placeholder="Criado em">
                                    <button class="bg-primary rounded border p-2 text-light"><i
                                            class="fa-solid fa-magnifying-glass"></i> Pesquisar</button>
                                </form>


                                <button class="btn" onclick="Refresh"><i class="fa-solid fa-rotate-right"></i></button>

                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Status </th>
                                    <th>CPF </th>
                                    <th>Nome</th>
                                    <th>Data de nasc.</th>
                                    <th>Capital</th>
                                    <th>Criado em</th>

                                    @if (Auth::user()->user_master)
                                        <th>Criado por:</th>
                                    @endif

                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($form as $segurado)
                                    @php
                                        $classOpacity = $segurado->inactive ? 'opacity-25 ' : '';
                                        $classColor = $segurado->inactive ? ' btn btn-outline-dark btn-sm ' : ' btn btn-warning btn-sm';
                                    @endphp

                                    <tr class="text-center rounded">
                                        <td class="{{ $classOpacity }}{{ $segurado->inactive == 0 ? 'text-success' : '' }}">
                                            {{ $segurado->inactive == 0 ? 'Ativado' : 'Desativado' }}
                                        </td>
                                        <td class="{{ $classOpacity }}">{{ $segurado->document }}</td>
                                        <td class="{{ $classOpacity }}">{{ $segurado->name }}</td>
                                        <td class="{{ $classOpacity }}">{{ $segurado->date }} </td>
                                        <td class="{{ $classOpacity }}">{{ $segurado->deathcover }} </td>
                                        <td class="{{ $classOpacity }}">
                                            {{ date('d/m/Y', strtotime($segurado->created_at)) }}</td>

                                            @if (Auth::user()->user_master)
                                                <td class="{{ $classOpacity }} limited-content" data-bs-title="{{$segurado->user_creator}}" data-bs-toggle="tooltip" >{{$segurado->user_creator}}</td>
                                            @endif

                                        <td><a class="{{ $classColor }}"
                                                href="{{ route('forms.edit', [$segurado->id]) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></td>
                                    </tr>
                                @endforeach


                        </button>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-4 justify-content-center d-flex">
        {{ $form->appends(request()->query())->links() }}
    </div>


    <script>
        function Refresh() {
            window.location.reload();
        }
    </script>
@endsection
