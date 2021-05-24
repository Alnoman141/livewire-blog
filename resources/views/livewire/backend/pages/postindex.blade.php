<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-1">
    <!-- Card Sextion Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-1">

 <!-- card -->

 <div class="rounded overflow-hidden shadow bg-white m-6 w-full">
     <div class="px-6 border-b border-light-grey py-5 flex">
         <h2 class="font-bold text-xl">All Posts</h2>
         <a class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.post.create')}}">
             {{ __('Create New') }}
         </a>
     </div>
     @if (session()->has('message'))
     <div class="bg-green-500 text-white rounded shadow-lg p-4">
         {{ session('message') }}
     </div>
     @endif
     <div class="table-responsive w-full">
         <table class="table text-grey-darkest">
             <thead class="bg-grey-dark text-white text-normal w-full">
             <tr class="w-full">
                 <th width="5%">Serial</th>
                 <th width="10%">Author</th>
                 <th width="10%">Category</th>
                 <th width="10%">Title</th>
                 <th width="10%">Body</th>
                 <th width="10%">Tags</th>
                 <th width="20%">Image</th>
                 <th width="25%">Action</th>
             </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                 <tr>
                     <th scope="row">{{ $loop->index+1 }}</th>
                     <td >{{ $post->user->name }}</td>
                     <td>{{ $post->category->name }}</td>
                     <td>{{ Str::limit($post->title,30) }}</td>
                     <td>{{ Str::limit($post->body,50) }}</td>
                     <td>
                         @foreach (Str::of($post->tags)->explode(',') as $postTag)
                            @foreach ($tags as $tag)
                                @if ($tag->id == $postTag)
                                    <span class="block text-sm border rounded bg-gray-200 my-1 px-1">{{$tag->name}}</span>
                                @endif
                            @endforeach
                         @endforeach
                     </td>
                     <td>
                         <img src={{ asset('storage/post-image/'.$post->image)}} width="140px">
                     </td>
                     <td>
                        @if ($post->status == 0)
                            <a class="cursor-pointer ml-0 inline-flex items-center px-2 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green disabled:opacity-25 transition ease-in-out duration-150" wire:click.prevent="publish('{{$post->id}}')">
                                {{ __('Publish') }}
                            </a>
                        @else
                        <a class="cursor-pointer ml-0 inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:border-red-700 focus:shadow-outline-red active:bg-red-600 disabled:opacity-25 transition ease-in-out duration-150" wire:click.prevent="mute('{{$post->id}}')">
                            {{ __('mute') }}
                        </a>
                        @endif
                         <a class="ml-0 inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('admin.post.edit',$post->id)}}">
                             {{ __('Edit') }}
                         </a>
                         <x-jet-danger-button class="ml-0 modal-trigger px-0" data-target="modal"  data-modal='postDeletedModal-{{$post->id}}'>
                             {{ __('Delete') }}
                         </x-jet-danger-button>
                     </td>
                 </tr>

                 <!-- Delete Modal -->
                 <div id='postDeletedModal-{{$post->id}}' class="modal-wrapper">
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
                                 Are You Sure To Delete This Post?
                             </h3>
                             <div class="mt-5 ml-auto">
                                 <button wire:click.prevent="remove('{{$post->id}}')" class='inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150'> Delete </button>
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

