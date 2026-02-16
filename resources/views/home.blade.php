@extends('layouts.app')

@section('title', 'Accueil - Restaurant El Wiam')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="Restaurant Interior" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 animate-fade-in">
            Bienvenue au<br>
            <span class="text-orange-500">Restaurant El Wiam</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto opacity-90">
    Restaurant El Wiam restaurant marocain permet aux clients de découvrir les plats traditionnels, 
  consulter le menu, voir les informations du restaurant et réserver une table en ligne facilement.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/menu" class="btn-primary text-white px-8 py-4 rounded-full text-lg font-semibold inline-block">
                <i class="fas fa-book-open mr-2"></i>Voir le Menu
            </a>
            <a href="/reservation" class="bg-white text-gray-800 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-all duration-300 inline-block">
                <i class="fas fa-calendar-check mr-2"></i>Réserver une Table
            </a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- About Section -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="relative">
                    <img src="{{ asset('IMAGES/HERO.jpg')}}" 
                         alt="About Restaurant" 
                         class="rounded-2xl shadow-2xl w-full">
                    <div class="absolute -bottom-6 -right-6 bg-orange-600 text-white p-6 rounded-xl shadow-xl">
                        <div class="text-3xl font-bold">3+</div>
                        <div class="text-sm">Années d'Excellence</div>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-4xl font-serif font-bold mb-6 text-gray-800">
                    Notre Histoire
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                 Le Restaurant El Wiam est né d'une passion pour la cuisine marocaine authentique et le partage.
                  Inspiré par les recettes familiales transmises de génération en génération, notre établissement vous invite à découvrir les saveurs riches du Maroc dans une ambiance conviviale et élégante. 
                  Chaque plat est préparé avec des ingrédients frais, des épices traditionnelles et beaucoup d'amour, afin d'offrir à nos clients une expérience culinaire unique.

                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                  Chez El Wiam, chaque repas est un voyage au cœur des traditions marocaines.
                </p>
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-2">500+</div>
                        <div class="text-sm text-gray-600">Clients Heureux par Jour</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-2">50+</div>
                        <div class="text-sm text-gray-600">Articles au Menu</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-2"> 4.9</div>
                        <div class="text-sm text-gray-600">Note Clients</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu Section -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-serif font-bold mb-4 text-gray-800">Plats Vedettes</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Découvrez les créations spéciales de notre chef, soigneusement élaborées pour ravir vos sens et créer des expériences mémorables.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredDishes as $dish)
                <div class="menu-item-card bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="relative h-48 overflow-hidden">
                        @if($dish->image)
                            <img src="{{ asset($dish->image) }}" 
                                 alt="{{ $dish->name }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-100 to-red-100 flex items-center justify-center">
                                <i class="fas fa-utensils text-4xl text-orange-600"></i>
                            </div>
                        @endif
                        
                        <!-- Badge Vedette -->
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                            <i class="fas fa-star mr-1"></i>Vedette
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-semibold text-gray-800 line-clamp-2">{{ $dish->name }}</h3>
                            <span class="text-xl font-bold text-orange-600">{{ formatPriceDh($dish->price) }}</span>
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">{{ $dish->description }}</p>
                        
                        <div class="flex justify-start items-center">
                            <span class="bg-orange-100 text-orange-800 text-xs px-3 py-1 rounded-full font-medium">
                                <i class="fas fa-crown mr-1"></i>Spécialité
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-utensils text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Aucun plat vedette disponible pour le moment.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="/menu" class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-block">
                Voir le Menu Complet
            </a>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-serif font-bold mb-4 text-gray-800">Ce Que Disent Nos Clients</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ne nous croyez pas sur parole - écoutez ce que nos clients satisfaits disent de leurs expériences culinaires.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Houda kmicha</h4>
                        <div class="text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "Expérience culinaire absolument phénoménale ! L'attention aux détails et la qualité des ingrédients sont inégalées. Un restaurant à visiter absolument !"
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">karim ben</h4>
                        <div class="text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "L'ambiance est parfaite et la cuisine est exceptionnelle. Chaque visite se sent spéciale. Le personnel va au-delà !"
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">ouiam</h4>
                        <div class="text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "Saveurs incroyables et présentation magnifique. C'est mon endroit de prédilection pour les occasions spéciales et les célébrations !"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Preview Section -->
<section class="section-padding bg-gradient-to-br from-orange-600 to-red-600 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-serif font-bold mb-6">Prêt à Découvrir l'Excellence ?</h2>
                <p class="text-xl mb-8 opacity-90">
                    Rejoignez-nous pour une expérience culinaire inoubliable. Que ce soit pour un repas décontracté ou une célébration spéciale, nous sommes là pour la rendre mémorable.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                        <span>123 Rue du Restaurant, Maroc, Ville Geulmim</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-phone text-2xl"></i>
                        <span>+212 6 37 68 06 29</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-2xl"></i>
                        <span>restaurantelwiam@gmail.com</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-clock text-2xl"></i>
                        <span>Lun-Dim: 11:00 AM - 10:00 PM</span>
                    </div>
                </div>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/reservation" class="bg-white text-orange-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors inline-block text-center">
                        <i class="fas fa-calendar-check mr-2"></i>Faire une Réservation
                    </a>
                    <a href="/contact" class="border-2 border-white text-white px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-orange-600 transition-colors inline-block text-center">
                        <i class="fas fa-message mr-2"></i>Nous Contacter
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1559329007-40df8a9345d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80" 
                     alt="Restaurant Dining" 
                     class="rounded-2xl shadow-2xl w-full">
            </div>
        </div>
    </div>
</section>
@endsection
