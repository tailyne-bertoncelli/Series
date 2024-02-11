<x-layout title="Controle de séries">
    <div class="d-flex flex-row justify-content-between my-3 w-100">
        <h3>Séries</h3>
        <a href="{{route('series.create')}}">
            <button class="btn btn-dark mb-2">Adicionar</button>
        </a>
    </div>

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                <span>{{ $serie->nome }}</span>
                <div class="d-flex flex-row">
                    <a class="me-2" href="{{route('series.edit', $serie->id)}}">
                        <button class="btn btn-warning">Editar</button>
                    </a>
                    <form action="{{route('series.destroy', $serie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Deletar</button>
                    </form>
                </div>

            </li>

        @endforeach
    </ul>
</x-layout>
