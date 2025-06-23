@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-16">
    <div class="max-w-4xl mx-auto px-6">
        <!-- En-tête avec titre et description -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 text-nts-blue-dark">
                Contactez-nous
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Notre équipe est là pour répondre à toutes vos questions concernant l'immobilier au Sénégal. 
                N'hésitez pas à nous contacter !
            </p>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="mb-12 max-w-2xl mx-auto">
                <div class="p-6 bg-green-50 border border-green-200 rounded-2xl shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-green-800 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Formulaire de contact -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
                    <h2 class="text-2xl font-bold mb-8 text-nts-blue-dark">Envoyez-nous un message</h2>
                    
                    <form method="POST" action="{{ route('contact.send') }}" class="space-y-8">
                        @csrf
                        
                        <!-- Nom et Email sur la même ligne -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-700">
                                    Nom complet
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-nts-cyan focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                                    value="{{ old('name') }}" 
                                    placeholder="Votre nom complet"
                                    required
                                >
                                @error('name')
                                    <div class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">
                                    Adresse email
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-nts-cyan focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                                    value="{{ old('email') }}" 
                                    placeholder="votre@email.com"
                                    required
                                >
                                @error('email')
                                    <div class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Sujet -->
                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-semibold text-gray-700">
                                Sujet
                            </label>
                            <input 
                                type="text" 
                                name="subject" 
                                id="subject" 
                                class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-nts-cyan focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                                value="{{ old('subject') }}" 
                                placeholder="De quoi souhaitez-vous parler ?"
                                required
                            >
                            @error('subject')
                                <div class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-semibold text-gray-700">
                                Votre message
                            </label>
                            <textarea 
                                name="message" 
                                id="message" 
                                rows="6" 
                                class="w-full px-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-nts-cyan focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white resize-none" 
                                placeholder="Décrivez votre projet, vos besoins ou posez votre question..."
                                required
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Bouton d'envoi -->
                        <div class="pt-4">
                            <button 
                                type="submit" 
                                class="w-full bg-nts-cyan hover:bg-nts-blue-dark text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-nts-cyan focus:ring-opacity-50"
                            >
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Envoyer le message
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informations de contact -->
            <div class="space-y-8">
                <!-- Carte principale -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                    <h3 class="text-xl font-bold mb-6 text-nts-blue-dark">Nos coordonnées</h3>
                    
                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-nts-cyan bg-opacity-10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                <a href="mailto:contact@nts-immo.com" class="text-nts-cyan hover:text-nts-blue-dark transition-colors">
                                    contact@nts-immo.com
                                </a>
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-nts-cyan bg-opacity-10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Téléphone</h4>
                                <a href="tel:+221774801247" class="text-nts-cyan hover:text-nts-blue-dark transition-colors">
                                    +221 77 480 12 47
                                </a>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-nts-cyan bg-opacity-10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-nts-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Adresse</h4>
                                <p class="text-gray-600">Dakar, Sénégal</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Horaires d'ouverture -->
                <div class="bg-gradient-to-br from-nts-cyan to-nts-blue-dark rounded-3xl shadow-xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-6">Horaires d'ouverture</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span>Lundi - Vendredi</span>
                            <span class="font-medium">8h00 - 18h00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Samedi</span>
                            <span class="font-medium">9h00 - 16h00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Dimanche</span>
                            <span class="font-medium">Fermé</span>
                        </div>
                    </div>
                </div>

                <!-- Réseaux sociaux -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                    <h3 class="text-xl font-bold mb-6 text-nts-blue-dark">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-blue-100 hover:bg-blue-200 rounded-full flex items-center justify-center transition-colors group">
                            <svg class="w-6 h-6 text-blue-600 group-hover:text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.56v14.91A4.56 4.56 0 0 1 19.44 24H4.56A4.56 4.56 0 0 1 0 19.47V4.56A4.56 4.56 0 0 1 4.56 0h14.91A4.56 4.56 0 0 1 24 4.56zM8.09 19.47V9.5H5.08v9.97zm-1.5-11.3a1.74 1.74 0 1 1 0-3.48 1.74 1.74 0 0 1 0 3.48zM20.45 19.47h-3.01v-4.85c0-1.16-.02-2.65-1.62-2.65-1.62 0-1.87 1.27-1.87 2.57v4.93h-3.01V9.5h2.89v1.36h.04a3.17 3.17 0 0 1 2.85-1.57c3.05 0 3.61 2.01 3.61 4.62v5.56z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-100 hover:bg-blue-200 rounded-full flex items-center justify-center transition-colors group">
                            <svg class="w-6 h-6 text-blue-400 group-hover:text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.924 2.204-4.924 4.924 0 .39.045.765.127 1.124C7.691 8.095 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.708.87 3.216 2.188 4.099-.807-.026-1.566-.247-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.317 0-.626-.03-.928-.086.627 1.956 2.444 3.377 4.6 3.417-1.68 1.318-3.809 2.105-6.102 2.105-.397 0-.788-.023-1.175-.069 2.179 1.397 4.768 2.213 7.557 2.213 9.054 0 14.002-7.496 14.002-13.986 0-.21 0-.423-.016-.634.962-.689 1.797-1.56 2.457-2.548l-.047-.02z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-pink-100 hover:bg-pink-200 rounded-full flex items-center justify-center transition-colors group">
                            <svg class="w-6 h-6 text-pink-600 group-hover:text-pink-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.241 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.241 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.241-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608.974-.974 2.241-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.072 5.771.131 4.659.414 3.678 1.395 2.697 2.376 2.414 3.488 2.355 4.769.013 8.332 0 8.741 0 12c0 3.259.013 3.668.072 4.948.059 1.281.342 2.393 1.323 3.374.981.981 2.093 1.264 3.374 1.323C8.332 23.987 8.741 24 12 24c3.259 0 3.668-.013 4.948-.072 1.281-.059 2.393-.342 3.374-1.323.981-.981 1.264-2.093 1.323-3.374.059-1.28.072-1.689.072-4.948 0-3.259-.013-3.668-.072-4.948-.059-1.281-.342-2.393-1.323-3.374-.981-.981-2.093-1.264-3.374-1.323C15.668.013 15.259 0 12 0z"/>
                            </svg>
                        </a>
                    </div>
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