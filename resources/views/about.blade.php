@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-nts-blue-dark via-nts-blue to-nts-cyan overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="relative max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
            À propos de 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                NTS Immobilier
            </span>
        </h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
            Votre partenaire de confiance pour tous vos projets immobiliers au Sénégal
        </p>
    </div>
    <!-- Decorative elements -->
    <div class="absolute top-10 right-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-24 h-24 bg-yellow-300 opacity-10 rounded-full"></div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    
    <!-- Mission Section -->
    <div class="mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center px-4 py-2 bg-nts-cyan bg-opacity-10 rounded-full mb-6">
                    <span class="text-nts-cyan font-semibold text-sm">Notre Mission</span>
                </div>
                <h2 class="text-4xl font-bold text-nts-blue-dark mb-6 leading-tight">
                    Faciliter l'accès à la propriété au Sénégal
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    NTS Immobilier s'engage à fournir des services immobiliers de première qualité au Sénégal. Notre mission est de faciliter l'accès à la propriété et de garantir des transactions immobilières transparentes et sécurisées.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Nous croyons que chaque personne mérite d'avoir accès à un logement de qualité et nous nous efforçons de rendre ce rêve accessible à tous.
                </p>
            </div>
            <div class="order-1 lg:order-2">
                <div class="relative">
                    <div class="bg-white bg-opacity-90 rounded-2xl p-8 shadow-2xl">
                        <div class="bg-white rounded-xl p-6 text-nts-blue-dark text-center">
                            <div class="text-4xl font-bold mb-2">500+</div>
                            <div class="text-sm">Clients satisfaits</div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <div class="bg-white rounded-lg p-4 text-nts-blue-dark text-center">
                                <div class="text-2xl font-bold">100+</div>
                                <div class="text-xs">Propriétés vendues</div>
                            </div>
                            <div class="bg-white rounded-lg p-4 text-nts-blue-dark text-center">
                                <div class="text-2xl font-bold">5 ans</div>
                                <div class="text-xs">D'expérience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="mb-20">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-nts-blue bg-opacity-10 rounded-full mb-6">
                <span class="text-nts-blue-dark font-semibold text-sm">Nos Valeurs</span>
            </div>
            <h2 class="text-4xl font-bold text-nts-blue-dark mb-4">
                Ce qui nous guide au quotidien
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Nos valeurs fondamentales définissent notre approche et notre engagement envers nos clients
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-nts-cyan to-blue-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Transparence</h3>
                <p class="text-gray-600">Nous garantissons une transparence totale dans toutes nos transactions et communications.</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Excellence</h3>
                <p class="text-gray-600">Nous visons l'excellence dans chaque aspect de notre service client.</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Professionnalisme</h3>
                <p class="text-gray-600">Notre expertise du marché local nous permet d'offrir des conseils avisés.</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Innovation</h3>
                <p class="text-gray-600">Nous innovons constamment pour offrir des solutions immobilières modernes.</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-pink-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Engagement</h3>
                <p class="text-gray-600">Nous nous engageons pleinement envers la satisfaction de nos clients.</p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-nts-blue-dark mb-3">Proximité</h3>
                <p class="text-gray-600">Nous cultivons une relation de proximité et de confiance avec nos clients.</p>
            </div>
        </div>
    </div>

    <!-- Expertise Section -->
    <div class="mb-20">
        <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-3xl p-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center px-4 py-2 bg-nts-blue-dark bg-opacity-10 rounded-full mb-6">
                        <span class="text-nts-blue-dark font-semibold text-sm">Notre Expertise</span>
                    </div>
                    <h2 class="text-4xl font-bold text-nts-blue-dark mb-6">
                        Des services complets pour tous vos besoins
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Avec une profonde connaissance du marché immobilier sénégalais, nous vous accompagnons dans tous vos projets.
                    </p>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 bg-nts-cyan rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-nts-blue-dark mb-2">Vente et location de biens</h3>
                            <p class="text-gray-600 text-sm">Un large portefeuille de propriétés pour tous les budgets</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-nts-blue-dark mb-2">Conseil en investissement</h3>
                            <p class="text-gray-600 text-sm">Expertise pour optimiser vos investissements immobiliers</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-nts-blue-dark mb-2">Gestion de propriétés</h3>
                            <p class="text-gray-600 text-sm">Gestion complète de vos biens immobiliers</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-nts-blue-dark mb-2">Accompagnement personnalisé</h3>
                            <p class="text-gray-600 text-sm">Un suivi sur mesure pour chaque projet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center bg-gradient-to-r from-nts-blue-dark to-nts-cyan rounded-3xl p-12 text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Prêt à concrétiser votre projet immobilier ?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Notre équipe dévouée travaille sans relâche pour vous aider à réaliser vos projets dans les meilleures conditions.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact.show') }}" class="inline-flex items-center px-8 py-4 bg-white text-nts-blue-dark font-bold rounded-2xl hover:bg-gray-100 transition-colors shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Nous contacter
            </a>
            <a href="{{ route('biens.index') }}" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-2xl hover:bg-white hover:text-nts-blue-dark transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Voir nos biens
            </a>
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