{{-- resources/views/artisans/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Éditer le profil Artisan') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{-- Messages de succès --}}
                        @if(session('success'))
                            <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Erreurs de validation --}}
                        @if($errors->any())
                            <div class="mb-4 p-3 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded">
                                <ul class="list-disc pl-5">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('artisans.update', $artisan) }}"
                              method="POST"
                              enctype="multipart/form-data"
                              class="space-y-6">
                            @csrf
                            @method('PUT') {{-- Utilisez la méthode PUT pour la mise à jour --}}

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="specialties">
                                    {{ __('Spécialités (séparées par des virgules)') }}
                                </label>
                                <input id="specialties" name="specialties" type="text"
                                       value="{{ old('specialties', implode(', ', $artisan->specialties ?? [])) }}"
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Ex: Plomberie, Électricité, Maçonnerie</p>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="phone">
                                    {{ __('Téléphone') }}
                                </label>
                                <input id="phone" name="phone" type="text"
                                       value="{{ old('phone', $artisan->phone) }}"
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="address">
                                    {{ __('Adresse') }}
                                </label>
                                <input id="address" name="address" type="text"
                                       value="{{ old('address', $artisan->address) }}"
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            </div>

                            {{-- Images de réalisations existantes --}}
                            @if($artisan->image_realisations)
                                <div class="mt-4">
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Images actuelles') }}</label>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach($artisan->image_realisations as $imagePath)
                                            <div class="relative group">
                                                <img src="{{ asset('storage/' . $imagePath) }}"
                                                     alt="Réalisation"
                                                     class="h-24 w-24 object-cover rounded-md border border-gray-300">
                                                <button type="button"
                                                        data-path="{{ $imagePath }}"
                                                        class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 text-xs opacity-0 group-hover:opacity-100 transition-opacity delete-image"
                                                        title="Supprimer l'image">
                                                    X
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="image_realisations">
                                    {{ __('Ajouter de nouvelles images de réalisations (laissez vide pour garder les actuelles)') }}
                                </label>
                                <input id="image_realisations" name="image_realisations[]" type="file" accept="image/*" multiple
                                       class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="video_realisations">
                                    {{ __('URLs de vidéos de réalisations (séparées par des virgules)') }}
                                </label>
                                <textarea id="video_realisations" name="video_realisations" rows="3"
                                          class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-opacity-50">{{ old('video_realisations', implode(', ', $artisan->video_realisations ?? [])) }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Ex: https://youtube.com/lien1, https://vimeo.com/lien2</p>
                            </div>

                            <div class="flex items-center justify-start space-x-4">
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                                    {{ __('Mettre à jour l\'artisan') }}
                                </button>
                                <a href="{{ route('artisans.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-300 transition">
                                    {{ __('Annuler') }}
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            document.querySelectorAll('.delete-image').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
                        const imagePath = this.dataset.path;
                        const artisanId = {{ $artisan->id }};

                        fetch(`/artisans/${artisanId}/image-realisations`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ image_path: imagePath })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('.group').remove();
                                alert(data.message);
                            } else {
                                alert(data.message || 'Erreur lors de la suppression de l\'image.');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            alert('Une erreur est survenue lors de la suppression de l\'image.');
                        });
                    }
                });
            });
        </script>
    @endpush
</x-app-layout> 