<div class="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden mt-8">
    <div class="mb-3 px-4 py-4">
        <form wire:submit.prevent="updateLocation" class="flex flex-col items-stretch">
            <label class="text-gray-400 text-sm font-bold mb-2" for="location">
                <input class="bg-gray-800 text-white rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-gray-700" id="location" type="search" wire:model.live="location" placeholder="Enter a location">
            </label>
            <!-- Display error message -->
            @if(!empty($error))
                <div class="text-red-500 mb-2">{{$error}}</div>
            @endif
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 w-32">
                Search
            </button>
        </form>
    </div>
</div>
