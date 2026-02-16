@extends('layouts.app')

@section('title', 'Contact - Restaurant El Wiam')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Contactez-nous</h1>
            <p class="text-lg text-gray-600">nous sommes là pour vous répondre</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">informations de contact</h2>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Address</h3>
                            <p class="text-gray-600">123 Restaurant <br>ville,geulmim </p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-green-100 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">téléphone</h3>
                            <p class="text-gray-600">+212 6 37 68 06 29</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-600">restaurantelwiam@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-serif font-bold mb-6 text-gray-800">Envoyez-nous un Message</h2>
                    
                    <form action="/contact" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                                <i class="fas fa-user mr-2 text-orange-600"></i>
                                Vos Informations
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nom Complet *
                                    </label>
                                    <input type="text" 
                                           id="full_name" 
                                           name="full_name" 
                                           value="{{ old('full_name') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                           placeholder="saisir votre nom"
                                           required>
                                    @error('full_name')
                                        <p class="text-red-500 text-sm mt-1">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
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
                            </div>
                        </div>
                        
                        <!-- Message Details -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-700 flex items-center">
                                <i class="fas fa-message mr-2 text-orange-600"></i>
                                Votre Message
                            </h3>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Sujet *
                                </label>
                                <input type="text" 
                                       id="subject" 
                                       name="subject" 
                                       value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                       placeholder="Comment pouvons-nous aider ?"
                                       required>
                                @error('subject')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Message *
                                </label>
                                <textarea id="message" 
                                          name="message" 
                                          rows="6" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors resize-none"
                                          placeholder="Détaillez-nous votre demande...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-lock mr-1"></i>
                                Vos informations sont sécurisées et ne seront jamais partagées
                            </p>
                            <button type="submit" 
                                    class="btn-primary text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Envoyer le Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
