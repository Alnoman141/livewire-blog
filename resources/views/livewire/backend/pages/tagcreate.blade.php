<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <!-- Card Sextion Starts Here -->
   <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

    <!-- card -->

    <div class="rounded overflow-hidden shadow bg-white m-6 w-full">
        <div class="px-6 border-b border-light-grey py-5 flex">
            <h2 class="font-bold text-xl">Add New Tag</h2>
            <a class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.tag.index')}}">
                {{ __('Tag List') }}
            </a>
        </div>
        <div class="table-responsive">
            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full">
                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                    Tag Create Form
                </div>
                <div class="p-3">
                    @if (session()->has('message'))
                    <div class="bg-green-500 text-white rounded shadow-lg p-4">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form class="w-full" wire:submit.prevent="store">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="name">
                                    Tag Name
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input wire:model.debounce.500ms="name" class="bg-white appearance-none border border-grey-600 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:border focus:bg-white focus:border-purple-light" id="name" type="text" placeholder="Enter Tag Name">
                                @error('name') <span class="text-red-500 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button type="submit" class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Add New Tag') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /card -->

</div>
<!-- /Cards Section Ends Here -->
</div>

