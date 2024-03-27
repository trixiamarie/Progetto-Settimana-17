<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Giorno:</strong> {{ $course->day }}</li>
                            <li class="list-group-item"><strong>Orario di inizio:</strong> {{ \Carbon\Carbon::parse($course->starthours)->format('H:i') }}</li>
                            <li class="list-group-item"><strong>Orario di fine:</strong> {{ \Carbon\Carbon::parse($course->endhours)->format('H:i') }}</li>
                            <li class="list-group-item"><strong>Prezzo:</strong> €{{ $course->price }}</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <a href="{{ route('booking.create', ['course' => $course]) }}"><button type="button" class="btn btn-outline-info">Prenota</button></a>
                </div>

            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>