@extends('app')

@section('content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
     Sepatu
        @can('sepatu-create')
        <a href="/add-sepatu">
        <button class=" right-10 px-4 text-sm inset-y-90 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
           Tambah
        </button>
        </a>
        @endcan
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-1 bg-white dark:bg-gray-800 rounded-lg p-4 bg-opacity-95">
        <livewire:livewire-sepatu />
    </div>
</div>

@endsection
