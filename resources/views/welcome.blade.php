<x-app-layout>

    <!-- Mensaje de éxito -->
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-2xl mb-8">
            {{ session('message') }}
        </div>
    @endif


    <!-- Banner -->
    <div id="banner" class="
                        h-28 w-11/12 mx-auto border-2 overflow-hidden shadow-sm
                        m-5 mt-2 bg-no-repeat bg-banner animate-bg-banner
        ">
        <h1 class="
                text-banner block text-white text-4xl font-normal tracking-wider
                m-7 mx-auto text-center animate-text-banner xs:text-2xl xs:mt-8
            ">DESARROLLO WEB GREGORIO MESA FDEZ
        </h1>
    </div>

    @if(isset($videos))
        
        @if(isset($search))
            <p class="text-xl ml-[180px]">
                <span class="font-bold text-blue-700">Búsqueda:</span>
                <span class="text-gray-800">{{ $search }}</span>

                <form class=" mt-5 ml-[180px]" method="GET" action="{{ route('search.video') }}">

                    <!-- Mantiene lo que ya buscamos -->
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <select name="order" class="border rounded px-8 py-2" onchange="this.form.submit()">
                        <option value="latest" {{ request('order')=='latest' ? 'selected' : '' }}>
                            Más recientes
                        </option>

                        <option value="oldest" {{ request('order')=='oldest' ? 'selected' : '' }}>
                            Más antiguos
                        </option>

                        <option value="title" {{ request('order')=='title' ? 'selected' : '' }}>
                            Título A-Z
                        </option>
                    </select>
                </form>
            </p>

        @endif

        <!-- Videos-grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($videos as $video)

                <!-- Tarjeta video -->
                <div onclick="window.location='{{ route('video.detail', $video->id) }}'" class="
                                        group video-card bg-gradient-to-b from-blue-500 to-blue-200 
                                        cursor-pointer hover:scale-105 transition duration-300 hover:shadow-xl 
                                        p-0 ease-in-out shadow-md bg-blue-200 rounded-xl overflow-hidden flex flex-col
                ">

                    <!-- Imagen -->
                    <div class="video-thumbnail overflow-hidden w-full">

                        @if($video->image)
                        <img src="{{ url('image/' . $video->image) }}" alt="{{ $video->title }}"
                            class="object-cover transition duration-500 ease-in-out group-hover:scale-110">
                        @else
                        <div class="no-image-placeholder flex items-center justify-center">Sin imagen</div>
                        @endif

                    </div>

                    <!-- video.info -->
                    <div class="p-4 flex flex-col">

                        <!-- title -->
                        <a href="{{route('video.detail', $video->id)}}">
                            <span class="font-semibold text-lg">{{ $video->title }}</span>
                        </a>

                        <!-- nombre de usuario -->
                        <p class="text-md text-blue-700 mt-3 mb-3">
                            <a class="tracking-widest font-bold text-md hover:text-blue-500 hover:font-bold transition duration-200"
                                href="{{ route('channel.user', $video->user->id )}}">

                                {{ $video->user->name }}

                            </a>
                        </p>

                        <!-- fecha -->
                        <p class="text-gray-500 text-sm">
                            {{ $video->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <!-- Botones Editar y Eliminar -->
                    <div class="flex gap-2 mt-2 flex-wrap">

                        @auth
                        @if(auth()->id() === $video->user_id || auth()->user()->name === "admin")

                        <!-- BOTÓN Editar-->
                        <a href="{{ route('edit.video', $video->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 
                                                        rounded-sm shadow hover:shadow-lg transition duration-200 
                                                        transform hover:scale-105">
                            Editar
                        </a>


                        <div class="" x-data="{ open: false }">

                            <!-- BOTÓN Eliminar-->
                            <button @click="open = true" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-sm 
                                                            shadow transition duration-200 cursor-pointer hover:scale-105">
                                Eliminar
                            </button>

                            <!-- OVERLAY -->
                            <div x-show="open" x-cloak
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

                                <!-- MODAL -->
                                <div @click.away="open = false" class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">

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
                                        <button @click="open = false" class="px-4 py-2 text-gray-600 hover:text-black">
                                            Cancelar
                                        </button>

                                        <form method="POST" action="">
                                            @csrf

                                            <a href="{{ route('delete.video', $video->id)}}" type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
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

        <!-- Paginación -->
        @if(isset($search))
            <div class="paginator mt-10 flex justify-center">
                {{ $videos->appends(request()->query())->links() }}
            </div>
        @else
            <div class="paginator mt-10 flex justify-center">
                {{ $videos->links('pagination::tailwind') }}
            </div>
        @endif


    @else

        <p class="text-center text-gray-500 mt-6">
            No hay resultados para tu búsqueda.
        </p>

    @endif

</x-app-layout>