@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $artisan->prenom }} {{ $artisan->nom }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Bouton retour -->
            <div class="mb-8">
                <a href="{{ route('artisans.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 shadow-sm border border-gray-200 dark:border-gray-700 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    {{ __('Retour à la liste') }}
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Colonne principale - Informations de l'artisan -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Carte profil -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
                            <h1 class="text-3xl font-bold text-white mb-2">
                                {{ $artisan->prenom }} {{ $artisan->nom }}
                            </h1>
                            <p class="text-blue-100 text-lg">
                                {{ implode(' • ', $artisan->specialties ?? ['Artisan']) }}
                            </p>
                        </div>
                        
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C7.82 21 3 16.18 3 10V5z"></path>
                                        </svg>
                                        <span>{{ $artisan->phone }}</span>
                                    </div>
                                    
                                    <div class="flex items-start text-gray-700 dark:text-gray-300">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>{{ $artisan->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Réalisations (Images) -->
                    @if($artisan->realisations && count($artisan->realisations) > 0)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    Galerie de réalisations
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">
                                    Découvrez quelques-unes de nos créations
                                </p>
                            </div>
                            <div class="p-8">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($artisan->realisations as $image)
                                        <div class="group relative overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700 aspect-square">
                                            <img src="{{ asset('storage/' . $image) }}" 
                                                 alt="Réalisation" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Vidéos -->
                    @if($artisan->videos && count($artisan->videos) > 0)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    Vidéos de présentation
                                </h3>
                            </div>
                            <div class="p-8">
                                <div class="space-y-4">
                                    @foreach($artisan->videos as $video)
                                        <a href="{{ $video }}" 
                                           target="_blank" 
                                           class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200 group">
                                            <svg class="w-6 h-6 mr-3 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                            <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 truncate">
                                                {{ $video }}
                                            </span>
                                            <svg class="w-4 h-4 ml-auto text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar - Actions de contact -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6">
                        <!-- Carte de contact -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Contacter l'artisan
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    Choisissez votre moyen de contact préféré
                                </p>
                            </div>
                            <div class="p-6 space-y-4">
                                <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}?subject=Demande d'information pour l'artisan: {{ $artisan->prenom }} {{ $artisan->nom }}"
                                   class="w-full flex items-center justify-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Envoyer un e-mail
                                </a>

                                <a href="https://wa.me/{{ preg_replace('/\s/', '', $artisan->phone) }}?text=Bonjour, je suis intéressé(e) par les services de l'artisan: {{ $artisan->prenom }} {{ $artisan->nom }}"
                                   target="_blank" 
                                   class="w-full flex items-center justify-center px-4 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200 shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    WhatsApp
                                </a>

                                <a href="tel:{{ preg_replace('/\s/', '', $artisan->phone) }}"
                                   class="w-full flex items-center justify-center px-4 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-colors duration-200 shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C7.82 21 3 16.18 3 10V5z"></path>
                                    </svg>
                                    Appeler maintenant
                                </a>
                            </div>
                        </div>

                        <!-- Actions administrateur -->
                        @if(auth()->user() && (auth()->user()->can('update', $artisan) || auth()->user()->can('delete', $artisan)))
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        Actions administrateur
                                    </h3>
                                </div>
                                <div class="p-6 space-y-3">
                                    @can('update', $artisan)
                                        <a href="{{ route('artisans.edit', $artisan) }}"
                                           class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 text-sm">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            {{ __('Éditer') }}
                                        </a>
                                    @endcan

                                    @can('delete', $artisan)
                                        <form method="POST" action="{{ route('artisans.destroy', $artisan) }}"
                                              onsubmit="return confirm('{{ __('Supprimer cet artisan ?') }}');"
                                              class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="bg-white text-nts-blue-dark py-16 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Logo et description -->
                <div class="md:col-span-2">
                    <x-application-logo class="h-24 w-auto mb-6" />
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        NTS Immobilier, votre partenaire de confiance pour trouver, vendre ou louer votre bien au Sénégal. 
                        Une expertise reconnue depuis des années.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-gray-100 hover:bg-nts-cyan hover:text-white rounded-full flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.56v14.91A4.56 4.56 0 0 1 19.44 24H4.56A4.56 4.56 0 0 1 0 19.47V4.56A4.56 4.56 0 0 1 4.56 0h14.91A4.56 4.56 0 0 1 24 4.56z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 hover:bg-nts-cyan hover:text-white rounded-full flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.204-4.924 4.924 0 .39.045.765.127 1.124C7.691 8.095 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.708.87 3.216 2.188 4.099-.807-.026-1.566-.247-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.317 0-.626-.03-.928-.086.627 1.956 2.444 3.377 4.6 3.417-1.68 1.318-3.809 2.105-6.102 2.105-.397 0-.788-.023-1.175-.069 2.179 1.397 4.768 2.213 7.557 2.213 9.054 0 14.002-7.496 14.002-13.986 0-.21 0-.423-.016-.634.962-.689 1.797-1.56 2.457-2.548l-.047-.02z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 hover:bg-nts-cyan hover:text-white rounded-full flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.241 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.241 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.241-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608.974-.974 2.241-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Contact -->
                <div>
                    <h3 class="font-bold text-xl mb-6 text-nts-blue-dark">Contact</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-nts-cyan mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:contact@nts-immo.com" class="text-gray-700 hover:text-nts-cyan transition-colors">
                                contact@nts-immo.com
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-nts-cyan mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <a href="tel:+221774801247" class="text-gray-700 hover:text-nts-cyan transition-colors">
                                +221 77 480 12 47
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-nts-cyan mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-700">Dakar, Sénégal</span>
                        </div>
                    </div>
                </div>
                <!-- Liens rapides -->
                <div>
                    <h3 class="font-bold text-xl mb-6 text-nts-blue-dark">Liens utiles</h3>
                    <div class="space-y-3">
                        <a href="{{ route('biens.index') }}" class="block text-gray-700 hover:text-nts-cyan transition-colors">Nos biens</a>
                        <a href="#" class="block text-gray-700 hover:text-nts-cyan transition-colors">À propos</a>
                        <a href="#" class="block text-gray-700 hover:text-nts-cyan transition-colors">Services</a>
                        <a href="#" class="block text-gray-700 hover:text-nts-cyan transition-colors">Contact</a>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            <div class="text-center pt-8 border-t border-gray-200">
                <p class="text-gray-600">© 2024 NTS Immobilier. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
@endsection