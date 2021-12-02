<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add Siswa
    </h4>
    <form wire:submit.prevent="submit">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">NISN</span>
                <input
                    class="@error('nisn') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="nisn" name="nisn" />
            </label>
            @error('nisn')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                    class="@error('name') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="name" name="name" />
            </label>
            @error('name')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                <input
                    class="@error('class') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="class" name="class" />
            </label>
            @error('class')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                <textarea
                    class="@error('address') border-red-700 @enderror block w-full h-24 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="address" name="address"></textarea>
            </label>
            @error('address')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Jenis Kelamin
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="gender" name="gender" value="m" />
                        <span class="ml-2">Male</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model="gender" name="gender" value="f" />
                        <span class="ml-2">Female</span>
                    </label>
                    <br>
                    @error('gender')
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