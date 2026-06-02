<x-app-layout>
    <!-- Contenido principal -->
    <div class="max-w-8xl mx-auto px-4 py-8">
    
    <!-- Mensaje de éxito -->
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-2xl mb-8">
            {{ session('message') }}
        </div>
    @endif

    @if(!$videos->isEmpty())
            <h1 class="text-3xl ml-[200px] font-bold">
                <span class="font-bold text-blue-700">Canal de </span> 
                <span class="text-gray-800">{{ $user->name }}</span>
            </h1>
       


        <div class="videos-grid max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @foreach($videos as $video)
                <div class="video-card group hover:bg-blue-300 transition duration-500 ease-in-out shadow-md bg-blue-100 rounded-xl overflow-hidden flex flex-col h-full">

                    <div class="video-thumbnail aspect-video bg-gray-200 overflow-hidden">

                        @if($video->image)
                            <img src="{{ url('image/' . $video->image) }}" alt="{{ $video->title }}" class="w-full h-full object-cover transition duration-500 ease-in-out group-hover:scale-110">
                        @else
                            <div class="no-image-placeholder w-full h-full flex items-center justify-center">Sin imagen</div>
                        @endif

                    </div>

                    <div class="video-info border border-blue-300 rounded-lg p-4 flex flex-col gap-2 text-left">

                        <h4 class="video-title hover:text-white font-semibold text-base">
                            <a style="text-decoration: display;" href="{{route('video.detail', $video->id)}}">{{ $video->title }}</a>
                        </h4>

                        <p class="text-gray-500 text-sm">{{ $video->created_at->diffForHumans() }}</p>
                        
                        <p class="video-name text-sm text-gray-700">
                           <a class="hover:text-blue-800 hover:font-bold hover:text-decoration" href="{{ route('channel.user', $video->user->id )}}">{{ $video->user->name }}</a> 
                        </p>
                                    
                    </div>
                        <div class="flex gap-2 mt-2 flex-wrap">
                            <a href="{{ route('video.detail', $video->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded-sm shadow hover:shadow-xl transition duration-200 hover:scale-105">Ver</a>
                            
                            @auth
                                @if(auth()->id() === $video->user_id || auth()->user()->name === "admin")
                                    <a href="{{ route('edit.video', $video->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 
                                                    rounded-sm shadow hover:shadow-lg transition duration-200 
                                                    transform hover:scale-105">Editar
                                    </a>
                                    
                                    <!-- BOTÓN Eliminar-->
                                    <div class="" x-data="{ open: false }">

                                        <!-- BOTÓN -->
                                        <button 
                                            @click="open = true"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-sm shadow transition duration-200 cursor-pointer hover:scale-105">
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
                                                    ¿Seguro que quieres borrar este video?
                                                    
                                                </p>
                                                
                                                <p class="text-gray-400 break-words">{{ $video->title }}</p>
                                                
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

                                                        <a href="{{ route('delete.video', $video->id)}}" type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                                            Eliminar
                                                        </a>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                </div>
            @endforeach
            
        </div>

    @else

        <p class="text-center text-gray-500 mt-6">
            No hay videos de este usuario.
        </p>

    @endif
    <!-- Paginación -->
    
        <div class="paginator mt-10 flex justify-center">
            {{ $videos->links('pagination::tailwind') }}
        </div>

</div>
</x-app-layout>