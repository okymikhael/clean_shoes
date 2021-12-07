<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add Transaction
    </h4>
    <form wire:submit.prevent="submit">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">
        
        <div wire:ignore>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        </br>
                        <select class="block text-sm w-full" id="select1-dropdown" wire:model="user_id">
                        <option value="" selected disabled>Nama</option>

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

            <div wire:ignore>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Sepatu</span>
                        </br>
                        <select class="block text-sm w-full" id="select2-dropdown" wire:model="sepatu_id">
                        <option value="" selected disabled>Sepatu</option>

                        @if($sepatu)
                        @foreach($sepatu as $sepatus)
                        <option value="{{ $sepatus->id }}">{{ $sepatus->nama }}</option>
                        @endforeach
                        @endif

                        </select>
                    </label>
            </div>
            @error('sepatu_id')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror


            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Biaya</span>
                <input
                    class="@error('biaya') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="number" wire:model="biaya" name="biaya" />
            </label>
            @error('biaya')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror


            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Status Pembayaran
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="status_pembayaran" name="status_pembayaran" value="lunas" />
                        <span class="ml-2">Lunas</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="status_pembayaran" name="status_pembayaran" value="pending" />
                        <span class="ml-2">Pending</span>
                    </label>
                    <br>
                    @error('status_pembayaran')
                    <span class="text-xs text-red-700" id="passwordHelp">
                        {{ $message }}
                    </span>
                    @enderror
                    </br>
                    @if($status_resi['status'] == 'Pesanan Selesai')
                    <label>
                        <div>
                            <button type="button" wire:click="transaksiSelesai" 
                                class=" inset-y-90 right-100 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                Transaksi Selesai
                            </button>
                        </div>
                    </label>
                    @endif
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
            $('#select2-dropdown').on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                @this.set('sepatu_id', data);
            });
        });

        $(document).ready(function () {
            $('#select1-dropdown').select2();
            var data = $('#select1-dropdown').select2("val");
            Livewire.emit('selecteduser', data)
            @this.set('user_id', data);

            $('#select1-dropdown').on('change', function (e) {
                var data = $('#select1-dropdown').select2("val");
                Livewire.emit('selecteduser', data)
                @this.set('user_id', data);
            });

            window.livewire.on('updateSepatu', (sepatu) => {
                sepatu_update(sepatu);
            });
        });

        function sepatu_update(sepatu){
            list_sepatu = [{id: '', text: 'Sepatu', disabled}];
            $.map(sepatu,function(elem){
                list_sepatu.push({id: elem.id, text: elem.nama});
            })

            $("#select2-dropdown").html('').select2({data: list_sepatu});
        }

    </script>
    @endpush



