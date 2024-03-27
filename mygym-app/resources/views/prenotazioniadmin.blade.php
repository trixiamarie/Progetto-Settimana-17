<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazioni') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <p class="fs-3 text-center">DA REVISIONARE</p>
                <div class="p-6 bg-white border-b border-gray-200" style="overflow: scroll; height:40rem;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data Prenotazione</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Corso</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utentiiscritti->where('stato','pending') as $index => $utente)
                            <tr>
                                <td>{{ $utente->id  }}</td>
                                <td>{{ $utente->created_at  }}</td>
                                <td>{{ $utente->user->name }}</td>
                                <td>{{ $utente->user->email }}</td>
                                <td>{{ $utente->corso->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('booking.update', ['booking' => $utente->id]) }}" class="m-0" style="height:38px;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="stato" value="accettato">
                                        <button type="submit" onclick="return confirm('Sei sicuro di ACCETTARE la prenotazione?')" class="btn btn-outline-success">Accetta</button>
                                    </form>
                                    <form method="POST" action="{{ route('booking.update', ['booking' => $utente->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="stato" value="negato">
                                        <button type="submit" onclick="return confirm('Sei sicuro di NON ACCETTARE la prenotazione?')" class="btn btn-outline-danger mt-0">Cancella</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="fs-3 text-center">ACCETTATI</p>
                <div class="p-6 bg-white border-b border-gray-200" style="overflow: scroll; height:40rem;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data Accettazione</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Corso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utentiiscritti->where('stato','accettato') as $index => $utente)
                            <tr>
                                <td>{{ $utente->id  }}</td>
                                <td>{{ $utente->updated_at }}</td>
                                <td>{{ $utente->user->name }}</td>
                                <td>{{ $utente->user->email }}</td>
                                <td>{{ $utente->corso->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>

                <p class="fs-3 text-center">NEGATI</p>
                <div class="p-6 bg-white border-b border-gray-200" style="overflow: scroll; height:40rem;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data Rifiuto</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Corso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utentiiscritti->where('stato','negato') as $index => $utente)
                            <tr>
                                <td>{{ $utente->id  }}</td>
                                <td>{{ $utente->updated_at  }}</td>
                                <td>{{ $utente->user->name }}</td>
                                <td>{{ $utente->user->email }}</td>
                                <td>{{ $utente->corso->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>

</x-app-layout>