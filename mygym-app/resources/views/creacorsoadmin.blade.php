<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea Corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('course.store') }}" method="POST" class="m-4">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del corso</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="day" class="form-label">Giorno</label>
                        <select class="form-select" id="day" name="day" required>
                            <option selected disabled>Seleziona il giorno</option>
                            <option value="Lunedì">Lunedì</option>
                            <option value="Martedì">Martedì</option>
                            <option value="Mercoledì">Mercoledì</option>
                            <option value="Giovedì">Giovedì</option>
                            <option value="Venerdì">Venerdì</option>
                            <option value="Sabato">Sabato</option>
                            <option value="Domenica">Domenica</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="starthours" class="form-label">Orario di inizio</label>
                            <input type="time" class="form-control" id="starthours" name="starthours" required>
                        </div>
                        <div class="col">
                            <label for="end_hours" class="form-label">Orario di fine</label>
                            <input type="time" class="form-control" id="endhours" name="endhours" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Crea Corso</button>
                </form>

            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>