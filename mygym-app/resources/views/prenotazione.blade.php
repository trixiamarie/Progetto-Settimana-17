<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazione') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Sei pronto a scatenarti? Prenota!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="course_id">Seleziona Corso:</label>
                            <select id="course_id" name="course_id">
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $selectedCourseId ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-outline-success" type="submit">Prenota</button>
                    </form>



                </div>


            </div>
        </div>

    </div>
    </div>
    </div>

</x-app-layout>