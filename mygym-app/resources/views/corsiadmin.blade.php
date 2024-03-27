<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Corsi') }}
        </h2>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Crea Corso</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="row p-4">
                    @foreach($corsi as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <p class="card-text"><strong>Giorno: </strong>Ogni {{ $course->day }}</p>
                                <p class="card-text"><strong>Ora di inizio:</strong> {{ substr($course->starthours, 0, 5) }}</p>
                                <p class="card-text"><strong>Ora di fine:</strong> {{ substr($course->endhours, 0, 5) }}</p>
                                <p class="card-text"><strong>Prezzo:</strong> {{ $course->price }}</p>
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary">Mostra</a>
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary">Modifica</a>
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo corso?');" class="btn btn-outline-danger">Cancella</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>