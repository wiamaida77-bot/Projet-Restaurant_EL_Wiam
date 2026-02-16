@extends('layouts.app')

@section('title', 'Réservation - Restaurant El Wiam')

@section('content')
<!-- Hero Section -->
<section class="relative h-80 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80" 
             alt="Reservation Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>
    
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4">Faire une Réservation</h1>
        <p class="text-xl opacity-90">Réservez votre table pour une expérience culinaire inoubliable</p>
    </div>
</section>

<!-- Reservation Form Section -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Restaurant Image & Info -->
            <div class="order-2 lg:order-1">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl mb-8">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                         alt="Restaurant Interior" 
                         class="w-full h-96 object-cover">
                </div>
                
                <!-- Restaurant Info Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Heures d'Ouverture</h4>
                                <p class="text-sm text-gray-600">Lun-Dim: 11:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-phone text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Téléphone</h4>
                                <p class="text-sm text-gray-600">+212 6 37 68 06 29</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Localisation</h4>
                                <p class="text-sm text-gray-600">123 Rue du Restaurant, Maroc, Ville Geulmim</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Capacité</h4>
                                <p class="text-sm text-gray-600">Jusqu'à 100 invités</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reservation Form -->
            <div class="order-1 lg:order-2">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-serif font-bold mb-6 text-gray-800">Détails de la Réservation</h2>
                    
                    <form action="/reservation" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                                <i class="fas fa-user mr-2 text-orange-600"></i>
                                Informations Personnelles
                            </h3>
                            
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom Complet *
                                </label>
                                <input type="text" 
                                       id="full_name" 
                                       name="full_name" 
                                       value="{{ old('full_name') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                       placeholder="saisir votre nom "
                                       required>
                                @error('full_name')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Adresse Email *
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                           placeholder="saisir votre email"
                                           required>
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Numéro de Téléphone *
                                    </label>
                                    <input type="tel" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                           placeholder="saisir le numéro de téléphone"
                                           required>
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Reservation Details -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-orange-600"></i>
                                Détails de la Réservation
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="reservation_date" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date *
                                    </label>
                                    <input type="date" 
                                           id="reservation_date" 
                                           name="reservation_date" 
                                           value="{{ old('reservation_date') }}"
                                           min="{{ date('Y-m-d') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                           required>
                                    @error('reservation_date')
                                        <p class="text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="reservation_time" class="block text-sm font-medium text-gray-700 mb-2">
                                        Heure *
                                    </label>
                                    <input type="time" 
                                           id="reservation_time" 
                                           name="reservation_time" 
                                           value="{{ old('reservation_time') }}"
                                           min="11:00"
                                           max="22:00"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                           required>
                                    @error('reservation_time')
                                        <p class="text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <label for="guests" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre de Personnes *
                                </label>
                                <select id="guests" 
                                        name="guests" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                        required>
                                    <option value="">Sélectionner le nombre de personnes</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>
                                            {{ $i }} {{ $i == 1 ? 'Personne' : 'Personnes' }}
                                        </option>
                                    @endfor
                                </select>
                                @error('guests')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Special Requests -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Demandes Spéciales (Optionnel)
                            </label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors resize-none"
                                      placeholder="Restrictions alimentaires, occasions spéciales, demandes...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-lock mr-1"></i>
                                Vos informations sont sécurisées et ne seront jamais partagées
                            </p>
                            <button type="submit" 
                                    class="btn-primary text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-check-circle mr-2"></i>
                                Faire la Réservation
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Additional Information -->
                <div class="mt-8 bg-orange-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-info-circle mr-2 text-orange-600"></i>
                        Politique de Réservation
                    </h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Les réservations sont gardées 15 minutes après l'heure prévue</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Les annulations doivent être faites au moins 2 heures à l'avance</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Pour les groupes de 8 ou plus, veuillez nous appeler directement</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                            <span>Code vestimentaire: Décontracté-chic</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
