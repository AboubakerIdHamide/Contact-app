<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
rel="stylesheet"
/>
<x-app-layout>
    <x-slot name="header">
        <a href="/" class="btn btn-primary">Home</a>
        <a href="/contacts" class="btn btn-secondary">Manage Contacts</a>
        <a href="/contacts" class="btn btn-secondary">Manage Contacts</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
