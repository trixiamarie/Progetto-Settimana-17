<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ $course->name }}</p>
                </div>

                <div class="mx-5">
                    <p class="card-text"><strong>Descrizione: </strong> {{ $course->description }}</p>
                    <p class="card-text"><strong>Giorno: </strong>Ogni {{ $course->day }}</p>
                    <p class="card-text"><strong>Ora di inizio:</strong> {{ substr($course->starthours, 0, 5) }}</p>
                    <p class="card-text"><strong>Ora di fine:</strong> {{ substr($course->endhours, 0, 5) }}</p>
                    <p class="card-text"><strong>Prezzo:</strong> {{ $course->price }}</p>
                    <div class="d-flex">
                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary">Modifica</a>
                    <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo corso?');" class="btn btn-outline-danger">Cancella</button>
                    </form>
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    <p>Utenti Iscritti</p>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data iscrizione</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utentiiscritti as $index => $utente)
                            <tr>
                                <td>{{ $utente->user->id  }}</td>
                                <td>{{ $utente->user->name }}</td>
                                <td>{{ $utente->user->email }}</td>
                                <td>{{ $utente->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>