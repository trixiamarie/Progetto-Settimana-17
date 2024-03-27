<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('course.update', $course->id) }}" method="POST" class="m-3">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del corso</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $course->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="day" class="form-label">Giorno</label>
                        <select class="form-select" id="day" name="day" required>
                            <option value="Lunedì" {{ $course->day == 'Lunedì' ? 'selected' : '' }}>Lunedì</option>
                            <option value="Martedì" {{ $course->day == 'Martedì' ? 'selected' : '' }}>Martedì</option>
                            <option value="Mercoledì" {{ $course->day == 'Mercoledì' ? 'selected' : '' }}>Mercoledì</option>
                            <option value="Giovedì" {{ $course->day == 'Giovedì' ? 'selected' : '' }}>Giovedì</option>
                            <option value="Venerdì" {{ $course->day == 'Venerdì' ? 'selected' : '' }}>Venerdì</option>
                            <option value="Sabato" {{ $course->day == 'Sabato' ? 'selected' : '' }}>Sabato</option>
                            <option value="Domenica" {{ $course->day == 'Domenica' ? 'selected' : '' }}>Domenica</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="starthours" class="form-label">Orario di inizio</label>
                            <input type="time" class="form-control" id="starthours" name="starthours" value="{{ $course->starthours }}" required>
                        </div>
                        <div class="col">
                            <label for="endhours" class="form-label">Orario di fine</label>
                            <input type="time" class="form-control" id="endhours" name="endhours" value="{{ $course->endhours }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}" step="0.01" required>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Salva Modifiche</button>
                </form>


            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>