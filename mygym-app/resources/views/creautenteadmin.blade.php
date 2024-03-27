<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea Utente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('user.store') }}" method="POST" class="m-3">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role_id" class="form-label">Ruolo</label>
                        <select class="form-select" id="role_id" name="role_id" required>
                            <option value="1">Admin</option>
                            <option value="2">Utente</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Crea Utente</button>
                </form>


            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>