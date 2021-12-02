<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Forms
    </h2>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Site Management
    </h4>
    <form wire:submit.prevent="submit" encrypted="multipart/form-data">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 bg-opacity-90">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Logo</span>
                <input type="file" accept=".png,.jpeg,.jpg"
                    class="@error('logo') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="logo" name="logo" />
            </label>

            @error('logo')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            @if ($logo)
                @if(gettype($logo) == 'string')
                <img src="{{Storage::url($logo)}}" width="100" alt="" srcset=""> <br>
                @else
                <img src="{{ $logo->temporaryUrl() }}" width="100" alt="" srcset=""> <br>
                @endif
            @endif


            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Background</span>
                <input type="file" accept=".png,.jpeg,.jpg"
                    class="@error('background') border-red-700 @enderror block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    wire:model="background" name="background" />
            </label>
            @error('background')
            <span class="text-xs text-red-700" id="passwordHelp">
                {{ $message }}
            </span>
            @enderror

            @if ($background)
                @if(gettype($background) == 'string')
                <img src="{{Storage::url($background)}}" width="100" alt="" srcset=""> <br>
                @else
                <img src="{{ $background->temporaryUrl() }}" width="100" alt="" srcset=""> <br>
                @endif
            @endif

            </br>
            
            <label>
                <div>
                    <button type="submit"
                        class=" inset-y-90 right-100 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        SAVE
                    </button>
                </div>
            </label>
        </div>
    </form>