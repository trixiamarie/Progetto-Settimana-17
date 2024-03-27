<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Utenti') }}
        </h2>
        <a href="{{route('user.create')}}"><button class="btn btn-outline-primary">Crea Utente</button></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif


                <table class="table m-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ruolo</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($utenti as $index => $utente)
                        <tr>
                            <td>{{ $utente->id  }}</td>
                            <td>{{ $utente->name }}</td>
                            <td>{{ $utente->email }}</td>
                            <td>{{ $utente->role->ruoli }}</td>
                            <td>
                                <a href="{{route('user.show', ['user' => $utente->id])}}"><button class="btn btn-outline-info">Dettaglio</button></a>
                                <form method="POST" action="{{ route('user.destroy', ['user' => $utente->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="stato" value="negato">
                                    <button type="submit" onclick="return confirm('Sei sicuro di eliminare l\'utente?')" class="btn btn-outline-danger mt-0">Cancella</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>