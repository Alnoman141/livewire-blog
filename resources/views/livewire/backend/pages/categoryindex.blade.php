<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
       <!-- Card Sextion Starts Here -->
   <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

    <!-- card -->

    <div class="rounded overflow-hidden shadow bg-white m-6 w-full">
        <div class="px-6 border-b border-light-grey py-5 flex">
            <h2 class="font-bold text-xl">All Categories</h2>
            <a class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.category.create')}}">
                {{ __('Create New') }}
            </a>
        </div>
        @if (session()->has('message'))
        <div class="bg-green-500 text-white rounded shadow-lg p-4">
            {{ session('message') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table text-grey-darkest">
                <thead class="bg-grey-dark text-white text-normal">
                <tr>
                    <th width="20%">Serial</th>
                    <th width="20%">Name</th>
                    <th width="20%">Parent Name</th>
                    <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->parent_id == NULL)
                            Parent Category
                            @else
                                {{ $category->parent->name }}
                            @endif
                        </td>
                        <td>
                            <a class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.category.edit',$category->id)}}">
                                {{ __('Edit') }}
                            </a>
                            <x-jet-danger-button class="ml-2 modal-trigger" data-target="modal"  data-modal='deletedModal-{{$category->id}}'>
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div id='deletedModal-{{$category->id}}' class="modal-wrapper">
                        <div class="overlay close-modal"></div>
                        <div class="modal modal-centered">
                            <div class="modal-content shadow-lg p-5">
                                <div class="border-b p-2 pb-3 pt-0 mb-4">
                                    <div class="flex justify-between items-center">
                                            <span class="text-red-500">DELETE!</span>
                                            <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                                <i class="fas fa-times text-gray-700"></i>
                                            </span>
                                    </div>
                                </div>
                                <!-- Modal content -->
                                <h3 class="mx-auto">
                                    Are You Sure To Delete This Category?
                                </h3>
                                <div class="mt-5 ml-auto">
                                    <button wire:click.prevent="remove('{{$category->id}}')" class='inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150'> Submit </button>
                                    <span class='close-modal cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'>
                                        Close
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- /card -->

</div>
<!-- /Cards Section Ends Here -->

</div>
