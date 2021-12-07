<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add Resi
    </h4>
    <form wire:submit.prevent="submit">
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Track Resi</span>
                <input
                    class="@error('sepatu') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{$resi." - ".$sepatu}}" type="text" disabled/>
            </label>
            @error('sepatu')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <span class="text-gray-700 dark:text-gray-400">
                Status
            </span>
            <div class="mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input
                        type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        wire:model="status"
                        name="status"
                        value="Pesanan Dibuat"/>
                    <span class="ml-2">Pesanan Dibuat</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input
                        type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        wire:model="status"
                        name="status"
                        value="Pesanan Dikerjakan"/>
                    <span class="ml-2">Pesanan Dikerjakan</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input
                        type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        wire:model="status"
                        name="status"
                        value="Pesanan Selesai"/>
                    <span class="ml-2">Pesanan Selesai</span>
                </label>
                <br>
                    @error('status')
                    <span class="text-xs text-red-700" id="passwordHelp">
                        {{ $message }}
                    </span>
                    @enderror

                </br>
            </br>
        </br>
        <label>
            <div>
                <button
                    type="submit"
                    class=" inset-y-90 right-100 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    SAVE
                </button>
            </div>
        </label>
    </div>
</div>
</div>
</form>