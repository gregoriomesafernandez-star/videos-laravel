<x-app-layout>

    <div class="tam_form rounded max-w-xl mx-auto mb-8 mt-8 px-4">
        <div  class="formulario_create_div bg-white rounded-3xl shadow-lg ">   <!-- más padding interno -->
            <h2 class="font-semibold text-xl text-gray-800">Editar video</h2><hr/>
            @if ($errors->any())
                <div style="background-color: #f6dede; padding: 16px 20px; margin-bottom: 24px; border-radius: 8px;">
                    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li style="margin-bottom: 4px; color: #b91c1c;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('update.video', $video->id) }}" method="POST" enctype="multipart/form-data" class="space-y-7">
                @csrf

                <div class="mt-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mt-2 mb-2">Título</label>
                    <input type="text" id="title" name="title" value="{{ $video->title }}"
                           class="probando w-full px-5 py-3.5 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-5 py-3.5 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">{{ $video->description }}</textarea>
                </div>

                <div class="mt-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Miniatura</label>
                    @if($video->image)
                        <img class="h-52 object-cover mx-auto w-full mb-4 rounded" src="{{ url('image/' . $video->image) }}" alt="{{ $video->title }}">
                    @else
                        <div class="no-image-placeholder">Sin imagen</div>
                    @endif
                    <input type="file" id="image" name="image" 
                           class="w-full px-5 py-3.5 border
                                  border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <div class="mt-4">
                    <label for="video" class="block text-sm font-medium text-gray-700 mb-2">Archivo de video</label>
                    <!-- VIDEO -->
                    <div class="mb-4 w-full aspect-video">
                        <video controls class="w-full h-full mx-auto object-cover rounded-xl shadow-lg">
                            <source src="{{ route('show.video', ['filename' => $video->video_path]) }}">
                            Tu navegador no es compatible con HTML5
                        </video>
                    </div>
                    <input type="file" id="video" name="video" 
                           class="w-full px-5 py-3.5 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <button type="submit" style="padding: 5px 20px;" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-sm shadow transition cursor-pointer mx-4">                  
                        Editar
                </button>

            </form>
        </div>
    </div>
</x-app-layout>