@extends('layouts.app')

@section('title', 'Menu - Restaurant El Wiam')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="Menu Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>
    
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-5xl font-serif font-bold mb-4">Notre Menu</h1>
        <p class="text-xl opacity-90 max-w-2xl mx-auto">
            Découvrez nos plats soigneusement préparés, servis avec passion et excellence
        </p>
    </div>
</section>

<!-- Category Filter Section -->
<section class="section-padding bg-white sticky top-16 z-40 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-3" id="categoryFilters">
            @foreach($orderedMenuItems as $category => $items)
                <button onclick="filterCategory('{{ $category }}')" 
                        class="category-btn px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-orange-100 hover:text-orange-600"
                        data-category="{{ $category }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Menu Items Section -->
<section class="section-padding bg-gray-50">
    <div class="container mx-auto px-4">
        @foreach($orderedMenuItems as $category => $items)
            <div class="category-section mb-16" data-category-name="{{ $category }}">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-serif font-bold text-gray-800 inline-block relative">
                        {{ $category }}
                        <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-orange-600 to-red-600"></span>
                    </h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($items as $item)
                        <div class="menu-item-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="{{ $category }}">
                            <div class="relative h-56 overflow-hidden">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" 
                                         alt="{{ $item->name }}" 
                                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-orange-100 to-red-100 flex items-center justify-center">
                                        <i class="fas fa-utensils text-6xl text-orange-600"></i>
                                    </div>
                                @endif
                                @if($item->is_available)
                                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Disponible
                                    </div>
                                @else
                                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Épuisé
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $item->name }}</h3>
                                    <span class="text-2xl font-bold text-orange-600">{{ formatPriceDh($item->price) }}</span>
                                </div>
                                
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                                
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-fire text-orange-500"></i>
                                    <span class="text-sm text-gray-500">Choix Populaire</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        
        @if($orderedMenuItems->isEmpty())
            <div class="text-center py-16">
                <i class="fas fa-utensils text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-semibold text-gray-600 mb-2">Aucun Article au Menu</h3>
                <p class="text-gray-500">Revenez bientôt pour nos délicieuses offres !</p>
            </div>
        @endif
    </div>
</section>

<!-- Special Offers Section -->
<section class="section-padding bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-orange-600 to-red-600 rounded-2xl p-8 text-white text-center">
            <h2 class="text-3xl font-serif font-bold mb-4">Offres Spéciales</h2>
            <p class="text-xl mb-6 opacity-90">
                Rejoignez-nous pour les happy hours et promotions saisonnières !
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white bg-opacity-20 rounded-xl p-6">
                    <i class="fas fa-cocktail text-4xl mb-3"></i>
                    <h3 class="text-xl font-semibold mb-2">Happy Hour</h3>
                    <p class="opacity-90">16:00 - 18:00 Tous les Jours</p>
                    <p class="text-sm opacity-75 mt-2">50% de réduction sur les boissons sélectionnées</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-6">
                    <i class="fas fa-users text-4xl mb-3"></i>
                    <h3 class="text-xl font-semibold mb-2">Offre Familiale</h3>
                    <p class="opacity-90">Chaque Week-end</p>
                    <p class="text-sm opacity-75 mt-2">Dessert gratuit pour les familles de 4+</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-6">
                    <i class="fas fa-birthday-cake text-4xl mb-3"></i>
                    <h3 class="text-xl font-semibold mb-2">Spécial Anniversaire</h3>
                    <p class="opacity-90">Célébrez avec nous</p>
                    <p class="text-sm opacity-75 mt-2">Gâteau et champagne offerts</p>
                </div>
            </div>
            <a href="/reservation" class="bg-white text-orange-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors inline-block">
                <i class="fas fa-calendar-check mr-2"></i>Réserver Votre Table
            </a>
        </div>
    </div>
</section>

<script>
// Get first available category
const firstCategoryBtn = document.querySelector('.category-btn');
const firstCategory = firstCategoryBtn ? firstCategoryBtn.dataset.category : null;

function filterCategory(category) {
    const sections = document.querySelectorAll('.category-section');
    const buttons = document.querySelectorAll('.category-btn');
    
    // Update button styles
    buttons.forEach(btn => {
        if (btn.dataset.category === category) {
            btn.classList.remove('bg-gray-200', 'text-gray-700');
            btn.classList.add('bg-orange-600', 'text-white');
        } else {
            btn.classList.remove('bg-orange-600', 'text-white');
            btn.classList.add('bg-gray-200', 'text-gray-700');
        }
    });
    
    // Show/hide sections
    sections.forEach(section => {
        if (section.dataset.categoryName === category) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}


// Initialize with first available category
document.addEventListener('DOMContentLoaded', function() {
    if (firstCategory) {
        filterCategory(firstCategory);
    }
});
</script>
@endsection
