{{-- resources/views/biens/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                    <div class="space-y-4">
                        <h1 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                            {{ __('Nos Biens Immobiliers') }}
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl leading-relaxed">
                            Découvrez notre sélection exclusive de biens disponibles à la vente et à la location dans tout le Sénégal
                        </p>
                    </div>
                    @can('create', App\Models\Bien::class)
                        <div class="flex-shrink-0">
                            <a href="{{ route('biens.create') }}"
                               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 border border-transparent rounded-2xl font-semibold text-white uppercase tracking-wide hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-lg">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                {{ __('Ajouter un bien') }}
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </x-slot>

    @section('content')
        <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16">
                
                {{-- Statistiques rapides --}}
                @if($biens->count())
                    <div class="mb-6">
                        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-3xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-4">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                                <div class="flex items-center space-x-6">
                                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-2xl shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                            Total des biens
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                                            {{ $biens->total() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-4 py-2 rounded-full">
                                        Page {{ $biens->currentPage() }} sur {{ $biens->lastPage() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Grid des biens --}}
                @if($biens->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @foreach($biens as $bien)
                            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2">
                                @if($bien->image_path)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('storage/'.$bien->image_path) }}" 
                                             alt="{{ $bien->titre }}" 
                                             class="h-48 w-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @php
                                            $statut = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $bien->statut ?? ''));
                                        @endphp
                                        @if(strpos($statut, 'vendre') !== false)
                                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-lg">
                                                À VENDRE
                                            </span>
                                        @elseif(strpos($statut, 'louer') !== false)
                                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold bg-green-500 text-white shadow-lg">
                                                À LOUER
                                            </span>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                @endif
                                <div class="p-6 space-y-4">
                                    <h3 class="font-bold text-xl text-nts-blue-dark leading-tight">{{ $bien->titre }}</h3>
                                    <div class="flex items-center text-gray-600 text-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $bien->localisation }}
                                    </div>
                                    <div class="text-2xl font-bold text-nts-cyan">
                                        {{ number_format($bien->prix, 0, ',', ' ') }} <span class="text-sm font-normal">FCFA</span>
                                    </div>
                                    <a href="{{ route('biens.show', $bien) }}" 
                                       class="inline-flex items-center text-nts-cyan hover:text-nts-cyan-600 font-semibold group-hover:underline transition-colors duration-300">
                                        Voir les détails
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-16">
                        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-3xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-8">
                            {{ $biens->links() }}
                        </div>
                    </div>
                @else
                    {{-- État vide --}}
                    <div class="text-center py-24">
                        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-3xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-16 max-w-2xl mx-auto">
                            <div class="mx-auto w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-3xl flex items-center justify-center mb-8">
                                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                {{ __('Aucun bien disponible') }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-8 text-lg leading-relaxed max-w-md mx-auto">
                                {{ __('Il n\'y a actuellement aucun bien immobilier dans notre catalogue. Revenez bientôt !') }}
                            </p>
                            @can('create', App\Models\Bien::class)
                                <a href="{{ route('biens.create') }}"
                                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    {{ __('Ajouter le premier bien') }}
                                </a>
                            @endcan
                        </div>
                    </div>
                @endif
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
</x-app-layout>