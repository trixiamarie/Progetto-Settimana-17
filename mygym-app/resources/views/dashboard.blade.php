<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ciao! È un piacere rivederti!") }}
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif

                <div class="p-6 text-gray-900">
                    {{ __("Oggi ti proponiamo:") }}
                </div>

                <ul class="list-group p-3">
                    @foreach ($corsi as $corso)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">{{$corso->name}}</h5>
                                <p class="card-text">{{$corso->description}}</p>
                                <p class="card-text"><small class="text-muted">Inizio Corso: {{$corso->start}}</small></p>
                                <p class="card-text"><small class="text-muted">Prezzo: EUR{{$corso->price}}</small></p>
                            </div>
                            <div>
                                <a href="{{ route('course.show', ['course' => $corso]) }}"><button type="button" class="btn btn-outline-info">Info</button></a>
                            </div>
                    </li>
                    @endforeach

                </ul>

            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>