<x-app-layout>

    <div class="tam_form rounded max-w-lg mx-auto mb-4 mt-8 px-4">
        <div  class="formulario_create_div bg-white rounded-3xl shadow-box ">   <!-- más padding interno -->
            <h2 class="font-semibold text-xl text-gray-800">Crear un nuevo video</h2><hr/>
            @if ($errors->any())
                <div style="background-color: #f6dede; padding: 16px 20px; margin-bottom: 24px; border-radius: 8px;">
                    <ul style="list-style-type: disc; padding-left: 20px; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li style="margin-bottom: 4px; color: #b91c1c;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('save.video')}}" method="POST" enctype="multipart/form-data" class="space-y-7">
                @csrf

                <div class="mt-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mt-2 mb-2">Título</label>
                    <x-input-line type="text" id="title" name="title" value="{{ old('title') }}"
                           class="probando w-full px-5 py-3.5 rounded border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500"/>
                </div>

                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                    <x-textarea-line id="description" name="description" rows="4"
                              class="w-full px-5 py-3.5 rounded border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">{{ old('description') }}</x-textarea-line>
                </div>

                <div class="mt-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Miniatura</label>
                    <input type="file" id="image" name="image" 
                           class="w-full px-5 py-3.5 rounded border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <div class="mt-4">
                    <label for="video" class="block text-sm font-medium text-gray-700 mb-2">Archivo de video</label>
                    <input type="file" id="video" name="video" 
                           class="w-full px-5 py-3.5 rounded border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500">
                </div>

                <x-primary-button type="submit">                  
                        Guardar
                </x-primary-button>

            </form>
        </div>
    </div>
</x-app-layout>