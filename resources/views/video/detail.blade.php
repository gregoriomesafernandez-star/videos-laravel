<x-app-layout>

    <div class="">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-[2fr_1fr] gap-6 items-start">
            <div id="details" class="order-1 lg:col-span-2 xl:col-span-1">

                <!-- VIDEO -->
                <div class="w-full aspect-video">
                    <video controls autoplay class="w-full h-full object-cover rounded-xl shadow-lg">
                        <source src="{{ route('show.video', ['filename' => $video->video_path]) }}">
                        Tu navegador no es compatible con HTML5
                    </video>
                </div>
                

                <h1 class="w-full text-3xl border-b font-semibold text-gray-800 mt-6 mb-6 pb-4">
                {{ $video->title }}
                </h1>

                <!-- Descripción -->
                <div class="w-full border bg-white border-gray-200 rounded-sm shadow-md">
                    
                    <div class="text-lg bg-blue-200 border-b border-gray-200 px-5 py-3">

                        Subido por  <span class="font-bold text-black-300 me-2"> 

                                            <a class="hover:text-blue-800" 
                                            href="{{ route('channel.user', $video->user->id )}}"> {{ $video->user->name }}
                                            </a> 

                                            <i class="fa-solid ms-1 fa-circle-check text-green-500"></i>
                                    </span>
                            <span class="text-gray-400">
                                {{ $video->created_at->diffForHumans() }}
                            </span>
                        

                    </div>

                    <div class="px-5 py-4 text-gray-700">
                        {{ $video->description }}
                    </div>
                    
                </div>
                
                
            </div>

            <div class="order-2 xl:col-start-1 xl:row-start-2">
                <!-- Comentarios -->
                @include('video.comments')
            </div>

            <div id="list_videos" class="order-3 xl:order-2 xl:col-start-2 xl:row-start-1 xl:row-span-2">
                <div class="mb-6">
                    <span class="font-bold text-gray-600 text-2xl tracking-wide">Videos relacionados</span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-1 gap-2">
                    @foreach($videos as $v)
                        <div class="flex flex-col lg:flex-row gap-3 mb-4 cursor-pointer hover:bg-gray-400 p-2 rounded-lg transition duration-250">

                            <!-- Imagen -->
                            <a href="{{ route('video.detail', $v->id) }}" class="w-full lg:w-[170px] shrink-0">
                                <div class="w-full aspect-video bg-gray-300 rounded-lg overflow-hidden">
                                    @if($v->image)
                                        <img 
                                            src="{{ url('image/' . $v->image) }}" 
                                            class="w-full h-full object-cover"
                                            alt="{{ $v->title }}"
                                        >
                                    @endif
                                </div>
                            </a>

                            <!-- Info -->
                            <div class="flex-1 pt-1">
                                <a href="{{ route('video.detail', $v->id) }}">
                                    <span class="line-clamp-2 text-sm font-semibold text-gray-900 leading-snug hover:text-blue-600">
                                        {{ Str::limit($v->title, 55) }}
                                    </span>
                                </a>


                                <a class="hover:text-blue-600 text-xs text-gray-700 mt-2 tracking-wide" href="{{ route('channel.user', $v->user->id )}}">
                                    {{ $v->user->name ?? 'Usuario' }}
                                </a>
                                <p class="text-xs text-gray-500">
                                    {{ $v->created_at->diffForHumans() }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <script>
        const video = document.querySelector('video');

        function saveTime() {
            document.getElementById('video_time').value = video.currentTime;
        }

        window.onload = () => {
            const time = "{{ session('video_time') }}";
            if (time) {
                video.currentTime = time;
                video.play();
            }
        }
    </script>
</x-app-layout>