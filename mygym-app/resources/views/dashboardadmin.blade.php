<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="d-flex m-5 justify-content-evenly">

                    <div class="m-2">
                        <a href="{{route('user.index')}}">
                            <div class="card" style="width:15rem; height:10rem;">
                                <div class="card-body">
                                    <h5 class="card-title fs-3">UTENTI</h5>
                                    <p>GESTIONE</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="m-2">
                        <a href="{{route('course.index')}}">
                            <div class="card" style="width:15rem; height:10rem;">
                                <div class="card-body">
                                    <h5 class="card-title fs-3">CORSI</h5>
                                    <p>GESTIONE</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="m-2">
                        <a href="{{route('booking.index')}}">
                            <div class="card" style="width:15rem; height:10rem;">
                                <div class="card-body">
                                    <h5 class="card-title fs-3">PRENOTAZIONI</h5>
                                    <p>GESTIONE</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>



            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>