<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add Aktifitas Peminjaman
    </h4>
    <form wire:submit.prevent="submit">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">

            <div wire:ignore>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Judul Buku</span>
                        </br>
                        <select class="block text-sm w-full" id="select2-dropdown" wire:model="id_buku">
                        <option value="">Judul Buku</option>

                        @foreach($book as $books)
                        <option value="{{ $books->id }}">{{ $books->judul }}</option>
                        @endforeach

                        </select>
                    </label>
            </div>
            @error('judul')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <div wire:ignore>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        </br>
                        <select class="block text-sm w-full" id="select1-dropdown" wire:model="id_siswa">
                        <option value="">Nama Siswa</option>

                        @foreach($siswa as $siswas)
                        <option value="{{ $siswas->id }}">{{ $siswas->name }}</option>
                        @endforeach

                        </select>
                    </label>
            </div>
            @error('name')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror


            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tenggat Waktu</span>
                <input
                type="date"
                    class="@error('tenggat_waktu') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="tenggat_waktu" name="tenggat_waktu" />
            </label>
            @error('tenggat_waktu')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror


            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    STATUS
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="status" name="status" value="pinjam" />
                        <span class="ml-2">Pinjam</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="status" name="status" value="kembali" />
                        <span class="ml-2">Kembali</span>
                    </label>
                    <br>
                    @error('jenis_buku')
                    <span class="text-xs text-red-700" id="passwordHelp">
                        {{ $message }}
                    </span>
                    @enderror
                    </br></br></br>
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
            $('#select2-dropdown').on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                @this.set('id_buku', data);
            });
        });

        $(document).ready(function () {
            $('#select1-dropdown').select2();
            $('#select1-dropdown').on('change', function (e) {
                var data = $('#select1-dropdown').select2("val");
                @this.set('id_siswa', data);
            });
        });
    </script>
    @endpush



