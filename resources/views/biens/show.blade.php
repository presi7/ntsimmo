@extends('layouts.app')

@section('header')
  <div class="bg-gradient-to-r from-nts-blue-dark to-nts-cyan py-12">
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center space-x-2 text-white/80 text-sm mb-4">
        <a href="{{ route('biens.index') }}" class="hover:text-white transition-colors">Nos biens</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-white">{{ $bien->titre }}</span>
      </nav>
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
        {{ $bien->titre }}
      </h1>
      <div class="flex flex-wrap items-center gap-4 text-white/90">
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          {{ $bien->localisation }}
        </div>
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
          </svg>
          {{ ucfirst($bien->type_bien) }}
        </div>
        @php
          $statut = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $bien->statut ?? ''));
        @endphp
        @if(strpos($statut, 'vendre') !== false)
          <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-semibold">
            À VENDRE
          </span>
        @elseif(strpos($statut, 'louer') !== false)
          <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-semibold">
            À LOUER
          </span>
        @else
          <span class="px-4 py-2 bg-gray-500 text-white rounded-full text-sm font-semibold">
            {{ ucfirst($bien->statut) }}
          </span>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
      
      <!-- Colonne principale - Image et description -->
      <div class="lg:col-span-2 space-y-8">
        
        <!-- Image principale -->
        @if($bien->image_path)
          <div class="relative group overflow-hidden rounded-2xl shadow-2xl">
            <img src="{{ asset('storage/'.$bien->image_path) }}"
                 alt="{{ $bien->titre }}"
                 class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <!-- Badge de statut sur l'image -->
            @if(strpos($statut, 'vendre') !== false)
              <div class="absolute top-6 right-6 px-4 py-2 bg-red-500 text-white rounded-full text-sm font-bold shadow-lg">
                À VENDRE
              </div>
            @elseif(strpos($statut, 'louer') !== false)
              <div class="absolute top-6 right-6 px-4 py-2 bg-green-500 text-white rounded-full text-sm font-bold shadow-lg">
                À LOUER
              </div>
            @endif
          </div>
        @endif

        <!-- Description -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
          <h2 class="text-2xl font-bold text-nts-blue-dark mb-6 flex items-center">
            <svg class="w-6 h-6 mr-3 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Description du bien
          </h2>
          <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            {{ $bien->description }}
          </div>
        </div>

        <!-- Caractéristiques détaillées -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
          <h2 class="text-2xl font-bold text-nts-blue-dark mb-6 flex items-center">
            <svg class="w-6 h-6 mr-3 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            Caractéristiques
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
              <div class="w-12 h-12 bg-nts-cyan/10 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-600">Type de bien</p>
                <p class="font-semibold text-nts-blue-dark">{{ ucfirst($bien->type_bien) }}</p>
              </div>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
              <div class="w-12 h-12 bg-nts-cyan/10 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-600">Localisation</p>
                <p class="font-semibold text-nts-blue-dark">{{ $bien->localisation }}</p>
              </div>
            </div>
            
            <div class="flex items-center p-4 bg-gray-50 rounded-xl">
              <div class="w-12 h-12 bg-nts-cyan/10 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-600">Statut</p>
                <p class="font-semibold {{ $bien->statut=='disponible'?'text-green-600':'text-red-600' }}">
                  {{ ucfirst($bien->statut) }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar - Prix et actions -->
      <div class="lg:col-span-1">
        <div class="sticky top-8 space-y-6">
          
          <!-- Prix et contact -->
          <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
              <p class="text-gray-600 text-sm mb-2">Prix</p>
              <p class="text-4xl font-bold text-nts-cyan mb-1">
                {{ number_format($bien->prix, 0, ',', ' ') }}
              </p>
              <p class="text-gray-600 text-sm">FCFA</p>
            </div>
            
            <div class="space-y-4">
              <a href="tel:+221774801247" 
                 class="w-full bg-nts-cyan hover:bg-nts-cyan-600 text-white py-4 px-6 rounded-xl font-semibold text-center block transform hover:scale-105 transition-all duration-300 shadow-lg">
                <div class="flex items-center justify-center">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                  </svg>
                  Appeler maintenant
                </div>
              </a>
              
              <a href="mailto:contact@nts-immo.com?subject=Intéressé par {{ $bien->titre }}" 
                 class="w-full bg-white border-2 border-nts-cyan text-nts-cyan hover:bg-nts-cyan hover:text-white py-4 px-6 rounded-xl font-semibold text-center block transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-center">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                  Envoyer un email
                </div>
              </a>
            </div>
          </div>

          <!-- Informations du contact -->
          <div class="bg-white rounded-2xl shadow-lg p-8">
            <h3 class="text-xl font-bold text-nts-blue-dark mb-6 flex items-center">
              <svg class="w-5 h-5 mr-2 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              Votre conseiller
            </h3>
            <div class="space-y-4">
              <div class="flex items-center">
                <div class="w-12 h-12 bg-nts-cyan rounded-full flex items-center justify-center mr-4">
                  <span class="text-white font-bold">NTS</span>
                </div>
                <div>
                  <p class="font-semibold text-nts-blue-dark">NTS Immobilier</p>
                  <p class="text-sm text-gray-600">Expert immobilier</p>
                </div>
              </div>
              <div class="pt-4 space-y-2 text-sm text-gray-600">
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                  </svg>
                  +221 77 480 12 47
                </div>
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                  contact@nts-immo.com
                </div>
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  Dakar, Sénégal
                </div>
              </div>
            </div>
          </div>

          <!-- Actions administratives -->
          @if(Auth::check() && (Auth::user()->can('update', $bien) || Auth::user()->can('delete', $bien)))
            <div class="bg-white rounded-2xl shadow-lg p-8">
              <h3 class="text-xl font-bold text-nts-blue-dark mb-6">Actions</h3>
              <div class="space-y-3">
                @can('update', $bien)
                  <a href="{{ route('biens.edit', $bien) }}"
                     class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-xl font-semibold text-center block transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-center">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      {{ __('Éditer') }}
                    </div>
                  </a>
                @endcan
                
                @can('delete', $bien)
                  <form action="{{ route('biens.destroy', $bien) }}" method="POST"
                        onsubmit="return confirm('{{ __('Supprimer ce bien ?') }}');" class="w-full">
                    @csrf @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-xl font-semibold transform hover:scale-105 transition-all duration-300">
                      <div class="flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        {{ __('Supprimer') }}
                      </div>
                    </button>
                  </form>
                @endcan
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Bouton retour -->
    <div class="mt-12 text-center">
      <a href="{{ route('biens.index') }}"
         class="inline-flex items-center text-nts-blue-dark hover:text-nts-cyan font-semibold text-lg group transition-colors duration-300">
        <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        {{ __('Retour à la liste des biens') }}
      </a>
    </div>
  </div>

  <!-- Section biens similaires -->
  <section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-nts-blue-dark mb-4">Biens similaires</h2>
        <p class="text-gray-600">Découvrez d'autres biens qui pourraient vous intéresser</p>
      </div>
      
      <!-- Ici vous pourriez ajouter une grille de biens similaires -->
      <div class="text-center">
        <a href="{{ route('biens.index') }}" 
           class="inline-flex items-center bg-nts-cyan hover:bg-nts-cyan-600 text-white px-8 py-4 rounded-xl font-semibold transform hover:scale-105 transition-all duration-300">
          Voir tous nos biens
          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>
@endsection