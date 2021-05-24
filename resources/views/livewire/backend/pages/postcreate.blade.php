<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mb-5">
    <!-- Card Sextion Starts Here -->
   <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

    <!-- card -->

    <div class="rounded overflow-hidden shadow bg-white m-6 w-full">
        <div class="px-6 border-b border-light-grey py-5 flex">
            <h2 class="font-bold text-xl">Add New Post</h2>
            <a class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.post.index')}}">
                {{ __('Post List') }}
            </a>
        </div>
        <div class="table-responsive">
            <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full">
                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                    Post Create Form
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
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="title">
                                    Post Title
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input wire:model.debounce.500ms="title" class="bg-white appearance-none border border-grey-600 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:border focus:bg-white focus:border-purple-light" id="title" type="text" placeholder="Enter Post Title">
                                @error('title') <span class="text-red-500 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="category_id">
                                    Category
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <select class="mb-3 block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="category_id" wire:model="category_id">
                                    <option value="0" selected >Choice One---</option>
                                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->orwhere('parent_id',0)->get() as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                                                <option value="{{ $child->id }}">--->{{ $child->name }}</option>
                                            @endforeach
                                        @endforeach
                                </select>
                                @error('category_id') <span class="text-red-500 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="body">
                                    Post Body
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <textarea wire:model.lazy="body" class="bg-white appearance-none border border-grey-600 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:border focus:bg-white focus:border-purple-light" rows="6"></textarea>
                                @error('body') <span class="text-red-500 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4 mt-0" for="tags">
                                    Post Tags
                                </label>
                            </div>

                            <div class="grid grid-cols-4">
                                @foreach ($tags as $tag)
                                <div class="mr-3">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" value="{{ $tag->id }}" class="form-checkbox" wire:model="selectedTags">
                                        <span class="ml-2">{{ $tag->name }} </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                                  {{-- @include('livewire.backend.partials.multiple-select') --}}
                                @error('tags') <span class="text-red-500 error">{{ $message }}</span> @enderror

                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="image">
                                    Post Image
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input type="file" wire:model="image" class=" bg-white appearance-none border border-grey-600 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:border focus:bg-white focus:border-purple-light" id="image">
                                @error('image') <span class="text-red-500 error">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="image">
                                    Selected Image
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="250px">
                                @endif
                            </div>

                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button type="submit" class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Add Post') }}
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
<!-- Initialize the plugin: -->

