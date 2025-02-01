{{-- <x-app-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('PERFIL') }}
        </h2>
    </x-slot> --}}


    @extends('layouts.app')

    @section('content')

    <div class="main-content">
        <section class="section">
            <div class="p-4">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('PERFIL') }}
                </h2>
            </div>

            <div class="py-12">
                <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
{{-- </x-app-layout> --}}
