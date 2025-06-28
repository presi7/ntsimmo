@extends('layouts.app')

@section('content')
    <!-- Header Hero Section - Plus spacieux -->
    <div class="relative bg-cover bg-center min-h-[500px] flex items-center justify-center" style="background-image: url('/images/hero-bg.jpg');">
        <div class="absolute inset-0 bg-gradient-to-b from-nts-blue-dark/80 via-nts-blue-dark/50 to-nts-blue-dark/20"></div>
        <div class="relative z-10 text-center text-white px-6 max-w-5xl mx-auto">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 drop-shadow-2xl leading-tight">
                Votre futur commence ici
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl mb-12 font-light drop-shadow-lg opacity-95 leading-relaxed">
                Immobilier d'exception au Sénégal.<br>
                <span class="text-nts-cyan font-medium">Notre expertise, votre sérénité.</span>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('biens.index') }}" class="bg-nts-cyan hover:bg-nts-cyan-600 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-2xl transform hover:scale-105 transition-all duration-300">
                    Découvrir nos biens
                </a>
                <a href="#search" class="bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white border-2 border-white/30 px-8 py-4 rounded-full font-semibold text-lg shadow-xl transform hover:scale-105 transition-all duration-300">
                    Recherche rapide
                </a>
            </div>
        </div>
    </div>

    <!-- Recherche rapide - Design plus moderne -->
    <div id="search" class="max-w-6xl mx-auto -mt-20 relative z-20 px-6 mb-24">
        <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-nts-blue-dark mb-6 text-center">Trouvez votre bien idéal</h2>
            <form method="GET" action="{{ route('biens.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label for="type_propriete" class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Type de propriété</label>
                    <select id="type_propriete" name="type_bien" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-nts-cyan focus:ring-0 transition-colors duration-200 bg-gray-50 hover:bg-white">
                        <option value="">Choisir un type</option>
                        <option value="villa">Villa</option>
                        <option value="terrain">Terrain</option>
                        <option value="appartement">Appartement</option>
                        <option value="chambre">Chambre</option>
                        <option value="bureau">Bureau</option>
                        <option value="champ">Champ</option>
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label for="ville" class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Ville</label>
                    <select id="ville" name="localisation" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-nts-cyan focus:ring-0 transition-colors duration-200 bg-gray-50 hover:bg-white">
                        <option value="">Toutes les villes</option>
                        @foreach($zones as $zone)
                            <option value="{{ $zone }}">{{ $zone }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-gradient-to-r from-nts-cyan to-nts-cyan-600 text-white px-6 py-3 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span>Rechercher</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Biens dynamiques par type - Design plus spacieux -->
    @foreach($biens->groupBy('type_bien') as $type => $biensType)
        <section class="py-16 bg-gray-50/50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-nts-blue-dark mb-4">Nos {{ ucfirst($type) }}s</h2>
                    <div class="w-24 h-1 bg-nts-cyan mx-auto rounded-full"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($biensType as $bien)
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
            </div>
        </section>
    @endforeach

    <!-- Section Ouvriers - Design amélioré -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-nts-blue-dark mb-4">Nos Artisans Qualifiés</h2>
                <p class="text-xl text-gray-600 mb-6">Des professionnels expérimentés pour tous vos projets</p>
                <div class="w-24 h-1 bg-nts-cyan mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($artisans as $artisan)
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 p-6 text-center transform hover:-translate-y-2 border border-gray-100">
                        <div class="w-20 h-20 bg-gradient-to-br from-nts-cyan to-nts-cyan-600 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 2c-2.21 0-4 1.79-4 4v1h8v-1c0-2.21-1.79-4-4-4z"/>
                            </svg>
                        </div>
                        
                        <h3 class="font-bold text-xl text-nts-blue-dark mb-2">{{ $artisan->prenom }} {{ $artisan->nom }}</h3>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex flex-wrap justify-center gap-2">
                                @foreach($artisan->specialties ?? [] as $specialty)
                                    <span class="px-3 py-1 bg-nts-cyan/10 text-nts-cyan text-xs font-medium rounded-full">
                                        {{ $specialty }}
                                    </span>
                                @endforeach
                            </div>
                            
                            <div class="text-sm text-gray-600 space-y-1">
                                <!-- <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    {{ $artisan->phone }}
                                </div> -->
                                <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $artisan->address }}
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('artisans.show', $artisan) }}"
                           class="inline-flex items-center text-nts-cyan hover:text-nts-cyan-600 font-semibold group-hover:underline transition-colors duration-300">
                            {{ __('En savoir plus') }}
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-nts-blue-dark to-nts-cyan">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-4xl font-bold text-white mb-6">Prêt à concrétiser votre projet ?</h2>
            <p class="text-xl text-white/90 mb-8">Contactez nos experts pour un accompagnement personnalisé</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+221774801247" class="bg-white text-nts-blue-dark hover:bg-gray-100 px-8 py-4 rounded-full font-bold text-lg shadow-xl transform hover:scale-105 transition-all duration-300">
                    📞 Appelez-nous
                </a>
                <a href="mailto:contact@nts-immo.com" class="bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white border-2 border-white/30 px-8 py-4 rounded-full font-bold text-lg shadow-xl transform hover:scale-105 transition-all duration-300">
                    ✉️ Nous écrire
                </a>
            </div>
        </div>
    </section>
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