<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Corsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ecco una lista dei nostri corsi:") }}
                </div>

                <div class="row">
                    @foreach($corsi as $corso)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $corso->name }}</h5>
                                <p class="card-text">{{ $corso->description }}</p>
                                <p class="card-text"><strong>Giorno: </strong>Ogni {{ $corso->day }}</p>
                                <p class="card-text"><strong>Ora di inizio:</strong> {{ substr($corso->starthours, 0, 5) }}</p>
                                <p class="card-text"><strong>Ora di fine:</strong> {{ substr($corso->endhours, 0, 5) }}</p>
                                <p class="card-text"><strong>Prezzo:</strong> {{ $corso->price }}</p>
                                <a href="{{ route('booking.create', $corso->id) }}" class="btn btn-primary">Prenota</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>