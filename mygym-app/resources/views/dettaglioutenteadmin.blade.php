<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$utente->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <p><strong>Nome:</strong> {{$utente->name}}</p>
                    <p><strong>Email:</strong> {{$utente->email}}</p>
                    <p><strong>Ruolo:</strong> {{$utente->role->ruoli}}</p>
                    <p><strong>Creazione Utene:</strong> {{$utente->created_at}}</p>
                    <p><strong>Modifica Utene:</strong> {{$utente->updated_at}}</p>
                </div>
                <div class="d-flex">
                    <a href="{{route('user.edit',['user' => $utente->id])}}"><button class="btn btn-outline-primary">Modifica</button></a>
                    <form method="POST" action="{{ route('user.destroy', ['user' => $utente->id]) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="stato" value="negato">
                        <button type="submit" onclick="return confirm('Sei sicuro di eliminare l\'utente?')" class="btn btn-outline-danger mt-0">Cancella</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>