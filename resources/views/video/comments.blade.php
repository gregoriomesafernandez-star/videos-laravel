

<h4 id="comentarios" class="text-lg font-semibold mb3-3 mt-5">Comentarios</h4>

<hr class="mb-6" />

<!-- Mensaje de éxito -->
@if (session('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-2xl mb-8">
        {{ session('message') }}
    </div>
@endif

@auth
    <form method="POST" action="{{ route('comment') }}" onsubmit="saveTime()" class="w-full mb-7">
        @csrf

        <input type="hidden" name="video_id" value="{{ $video->id }}" required />
        <input type="hidden" name="video_time" id="video_time">
        <div class="relative w-full mt-6 mb-2">

            <textarea 
                name="body"
                placeholder="Añade un comentario..."
                class="peer w-full bg-white h-10 border-0 outline-none focus:ring-0  text-gray-700 overflow-hidden"
            ></textarea>

            <span class="absolute left-0 bottom-0 w-full h-[1px] bg-blue-300"></span>

            <span class="absolute left-1/2 bottom-0 w-0 h-[2px] bg-blue-600 
                        transition-all duration-300 ease-out 
                        peer-focus:w-full peer-focus:left-0">
            </span>

        </div>
        
        <div class="flex justify-end">
        <input type="submit" value="Comentar" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-sm shadow transition cursor-pointer mx-4" />
        </div>
    </form>
@endauth



@if(isset($video->comments))
    <div id="comment_list">

        @foreach ($video->comments as $comment)
          
            <div class="bg-white w-full border border-gray-200 rounded-sm shadow-md overflow-hidden mb-7">
                <div class="bg-blue-200 border-b border-gray-200 px-5 py-3">
                    <h2 class="text-lg font-semibold">

                    <strong class="text-black-400 me-2"> {{$comment->user->name}}
                            
                    </strong>

                     <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    </h2>
                </div>

                <div class="px-5 py-4 text-gray-700">
                    {{ $comment->body }}

                    @if(auth()->id() === $comment->user_id || auth()->id() === $video->user_id)
                        <div class="flex justify-end">
                            <div x-data="{ open: false }">

                            <!-- BOTÓN -->
                            <button 
                                @click="open = true"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-sm shadow transition cursor-pointer">
                                Eliminar
                            </button>

                            <!-- OVERLAY -->
                            <div 
                                x-show="open"
                                x-cloak
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                            >

                                <!-- MODAL -->
                                <div 
                                    @click.away="open = false"
                                    class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
                                >
                                    
                                    <!-- HEADER -->
                                    <h2 class="text-lg font-semibold mb-4">
                                        ¿Estás seguro?
                                    </h2>

                                    <!-- BODY -->
                                    <p class="text-gray-600 mb-4">
                                        ¿Seguro que quieres borrar este comentario?
                                        
                                    </p>
                                    
                                    <p class="text-gray-400 break-words">{{ $comment->body }}</p>
                                    
                                    <p class="text-sm text-red-500 mt-3 mb-6">
                                        Si lo borras, no podrás recuperarlo.
                                    </p>

                                    <!-- FOOTER -->
                                    <div class="flex justify-end gap-3">
                                        <button 
                                            @click="open = false"
                                            class="px-4 py-2 text-gray-600 hover:text-black">
                                            Cancelar
                                        </button>

                                        <form method="POST" action="">
                                            @csrf

                                            <a href="{{ route('delete.comment', $comment->id)}}" type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                                Eliminar
                                            </a>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                     </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endif