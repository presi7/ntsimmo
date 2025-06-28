{{-- resources/views/artisans/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un profil Artisan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-3 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded">
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('artisans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="specialties" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Spécialités') }} <small>(virgules)</small>
                            </label>
                            <input type="text" name="specialties" id="specialties" value="{{ old('specialties') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                        </div>

                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Prénom') }}
                            </label>
                            <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                        </div>

                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nom') }}
                            </label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                        </div>

                        <!-- <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Téléphone') }}
                            </label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                        </div> -->

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Adresse') }}
                            </label>
                            <textarea name="address" id="address" rows="3"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">{{ old('address') }}</textarea>
                        </div>

                        <div>
                            <label for="realisations" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Réalisations') }} <small>(images multiples)</small>
                            </label>
                            <input type="file" name="realisations[]" id="realisations" multiple
                                   class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                        </div>

                        <div>
                            <label for="videos" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Vidéos') }} <small>(URLs)</small>
                            </label>
                            <input type="text" name="videos" id="videos" value="{{ old('videos') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">
                                {{ __('Enregistrer') }}
                            </button>
                            <a href="{{ route('artisans.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                                {{ __('Annuler') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
