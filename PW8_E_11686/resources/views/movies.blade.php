<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-4 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Movie List</h2>
    </div>
    
    <div class="mx-auto max-w-2xl px-4 py-4 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 p-4 rounded-lg shadow-sm">
            @forelse ($movies as $item)
                <div class="bg-white overflow-hidden shadow-sm rounded-lg flex flex-col h-full"> 
                    <div class="flex-grow"> 
                        <img class="w-full h-64 object-fit" src="{{ asset($item->image_path) }}" alt="image_path">
                    </div>
                    <div class="p-6 flex-grow"> 
                        <p class="text-lg font-medium text-gray-900">{{ $item->name }}</p>
                        <p class="text-sm font-medium text-gray-500">Released Year: {{ $item->release_year }}</p>
                        <p class="mt-2 text-sm text-gray-500">{{ $item->description }}</p>
                    </div>
                    <form action="{{ route('movies.destroy', $item->id) }}" method="POST" class="mt-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" w-full py-2 bg-red-600 text-white rounded-md hover:bg-red-500 ">
                            Delete
                        </button>
                    </form>
                </div>
            @empty
            @endforelse
        </div>
    </div>

</x-app-layout>