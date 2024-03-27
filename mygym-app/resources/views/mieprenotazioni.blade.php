<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Le mie prenotazioni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ecco tutte le tue prenotazioni") }}
                </div>

                <div class="row p-4">
                    @foreach($prenotazioni as $prenotazione)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $prenotazione->corso->name }}</h5>
                                <p class="card-text">{{ $prenotazione->corso->description }}</p>
                                <p class="card-text"><strong>Giorno:</strong> {{ $prenotazione->corso->day }}</p>
                                <p class="card-text"><strong>Ora di inizio:</strong> {{ substr($prenotazione->corso->starthours, 0, 5) }}</p>
                                <p class="card-text"><strong>Ora di fine:</strong> {{ substr($prenotazione->corso->endhours, 0, 5) }}</p>
                                <p class="card-text"><strong>Prezzo:</strong> {{ $prenotazione->corso->price }}</p>
                               @if($prenotazione->stato === 'pending')
                                <form action="{{ route('booking.destroy', $prenotazione->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Cancella Prenotazione</button>
                                </form>
                                @elseif($prenotazione->stato === 'accettato')
                                <button type="submit" class="btn btn-outline-danger disabled">Prenotazione confermata</button>
                                </br><small>Chiamate il numero verde 800.LOL.800 per qualsiasi informazione</small>
                                @elseif($prenotazione->stato === 'negato')
                                <button type="submit" class="btn btn-outline-danger disabled">Prenotazione non confermata</button>
                                </br><small>Chiamate il numero verde 800.LOL.800 per chiarimenti</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</x-app-layout>