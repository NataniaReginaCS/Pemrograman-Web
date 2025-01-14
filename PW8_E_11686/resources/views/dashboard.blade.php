<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-3 flex items-center justify-center">
        <a href="{{ url('movies') }}">
            <button type="submit" class="justify-center rounded-md bg-blue-600 px-5 py-3 text-sm/6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                See All Movie
            </button>
        </a>
    </div>

    <div class="py-3">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf    
            <div class="max-w-md mx-auto sm:px-1 lg:px-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <h2 class="mt-4 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Add Movie Details</h2>
                    </div>

                    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="#" method="POST">
                        <div>
                            <label for="image_path" class="block text-sm/6 font-medium text-gray-900">Movie Images</label>
                            <div class="mt-2">
                                <input id="image_path" name="image_path" type="file" placeholder="Tidak ada berkas dipilih" required>
                            </div>
                        </div>


                        <div>
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Movie Name</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" placeholder="Enter Movie Name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <label for="release_year" class="block text-sm/6 font-medium text-gray-900">Release Year</label>
                            <div class="mt-2">
                                <input id="release_year" name="release_year" type="number" placeholder="Enter release year" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm/6 font-medium text-gray-900">Movie Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" required placeholder="Enter movie description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-center">
                            <button type="submit" class="justify-center rounded-md bg-blue-600 px-5 py-2 text-sm/6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Submit
                            </button>
                        </div>

                        <div class="mt-2 flex items-center justify-center">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>

<script>
    // Validasi untuk input 'name'
    document.getElementById("name").addEventListener("input", function () {
        this.setCustomValidity(''); // Reset pesan jika ada input
    });

    document.getElementById("name").addEventListener("invalid", function () {
        if (this.validity.valueMissing) {
            this.setCustomValidity("Isi isian ini.");
        }
    });

    // Validasi untuk input 'images'
    document.getElementById("images").addEventListener("input", function () {
        this.setCustomValidity('');
    });

    document.getElementById("images").addEventListener("invalid", function () {
        if (this.validity.valueMissing) {
            this.setCustomValidity("Pilih berkas.");
        }
    });

    // Validasi untuk input 'year'
    document.getElementById("year").addEventListener("input", function () {
        this.setCustomValidity('');
    });

    document.getElementById("year").addEventListener("invalid", function () {
        if (this.validity.valueMissing) {
            this.setCustomValidity("Masukkan angka.");
        }
    });

    // Validasi untuk input 'desc'
    document.getElementById("desc").addEventListener("input", function () {
        this.setCustomValidity('');
    });

    document.getElementById("desc").addEventListener("invalid", function () {
        if (this.validity.valueMissing) {
            this.setCustomValidity("Isi isian ini.");
        }
    });
</script>

