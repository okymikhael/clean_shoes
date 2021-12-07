<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add Sepatu
    </h4>
    <form wire:submit.prevent="submit">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                    class="@error('nama') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="nama" name="nama" />
            </label>
            @error('nama')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Ukuran</span>
                <input
                    class="@error('ukuran') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="ukuran" name="ukuran" />
            </label>
            @error('ukuran')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <div wire:ignore>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">User</span>
                        </br>
                        <select class="block text-sm w-full" id="select2-dropdown" wire:model="user_id">
                        <option value="" selected disabled>User</option>

                        @foreach($user as $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                        @endforeach

                        </select>
                    </label>
            </div>
            @error('user_id')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

                    </br></br>
                    <label>
                        <div>
                            <button type="submit"
                                class=" inset-y-90 right-100 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                SAVE
                            </button>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#select2-dropdown').select2();
            var data = $('#select2-dropdown').select2("val");
            @this.set('user_id', data);
            $('#select2-dropdown').on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                @this.set('user_id', data);
            });
        });
    </script>
    @endpush

