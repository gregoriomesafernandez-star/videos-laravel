<x-app-layout>
    

    <div class="w-11/12 flex flex-col justify-center mx-auto py-4">
            
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Session Status -->
            <x-auth-session-status  :status="session('status')" class="
                            bg-green-100 border border-green-400 text-green-700 
                              px-5 py-4 rounded-2xl mb-8 mx-auto text-center
            "/>

            <div class="p-4 sm:p-8 bg-white shadow-box sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-box sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow-box sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
