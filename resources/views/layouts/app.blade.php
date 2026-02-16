<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Restaurant El Wiam - Fine Dining Experience')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .sticky-header {
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.95);
        }
        
        .menu-item-card {
            transition: all 0.3s ease;
        }
        
        .menu-item-card:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #d97706 0%, #dc2626 100%);
            transition: all 0.3s ease;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #b45309 0%, #b91c1c 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(217,119,6,0.3);
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sticky Header -->
    <header class="sticky top-0 z-50 sticky-header shadow-sm">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Restaurant El Wiam" 
                         class="w-10 h-10 rounded-full object-cover border-2 border-orange-200">
                    <div>
                        <h1 class="text-xl font-bold font-serif text-gray-800">Restaurant El Wiam</h1>
                        <p class="text-xs text-gray-600">Expérience gastronomique raffinée</p>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="{{ request()->is('/') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Accueil</a>
                    <a href="/menu" class="{{ request()->is('menu') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Menu</a>
                    <a href="/reservation" class="{{ request()->is('reservation') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Reservation</a>
                    <a href="/contact" class="{{ request()->is('contact') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Contact</a>
                    <a href="/admin/login" class="bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all duration-300 text-sm font-medium">
                        <i class="fas fa-user-shield mr-2"></i>Admin Login
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="lg:hidden" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-2xl text-gray-700"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden lg:hidden mt-4 pb-4 border-t pt-4">
                <div class="flex flex-col space-y-3">
                    <a href="/" class="{{ request()->is('/') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Accueil</a>
                    <a href="/menu" class="{{ request()->is('menu') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Menu</a>
                    <a href="/reservation" class="{{ request()->is('reservation') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Reservation</a>
                    <a href="/contact" class="{{ request()->is('contact') ? 'text-orange-600 font-semibold' : 'text-gray-700 hover:text-orange-600' }} transition-colors duration-300">Contact</a>
                    <a href="/admin/login" class="bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-2 rounded-full text-center">
                        <i class="fas fa-user-shield mr-2"></i>Admin Login
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-20 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300" id="successMessage">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-20 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300" id="errorMessage">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-12">
            <!-- Mobile Footer -->
            <div class="lg:hidden text-center mb-8">
                <!-- Logo Mobile -->
                <a href="/" class="flex flex-col items-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Restaurant El Wiam Logo" 
                         class="w-16 h-16 rounded-full object-cover border-2 border-orange-600 shadow-lg">
                    <span class="mt-2 text-xl font-bold text-white">Restaurant El Wiam</span>
                </a>
                
                <!-- Mobile Links -->
                <div class="grid grid-cols-2 gap-8 mb-8">
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Liens Rapides</h4>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-gray-400 hover:text-orange-600 transition-colors">Accueil</a></li>
                            <li><a href="/menu" class="text-gray-400 hover:text-orange-600 transition-colors">Menu</a></li>
                            <li><a href="/reservation" class="text-gray-400 hover:text-orange-600 transition-colors">Réservation</a></li>
                            <li><a href="/contact" class="text-gray-400 hover:text-orange-600 transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Informations de Contact</h4>
                        <div class="space-y-2 text-left">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-map-marker-alt text-orange-600"></i>
                                <span class="text-gray-400">123 Rue du Restaurant, Maroc, Geulmim</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-phone text-orange-600"></i>
                                <span class="text-gray-400">+212 6 37 68 06 29</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-envelope text-orange-600"></i>
                                <span class="text-gray-400">restaurantelwiam@gmail.com</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-clock text-orange-600"></i>
                                <span class="text-gray-400">Lun-Dim: 11:00 AM - 10:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Desktop Footer -->
            <div class="hidden lg:flex lg:items-center lg:justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex flex-col items-center">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Restaurant El Wiam Logo" 
                             class="w-16 h-16 rounded-full object-cover border-2 border-orange-600 shadow-lg">
                        <span class="mt-2 text-xl font-bold text-white">Restaurant El Wiam</span>
                    </a>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens Rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-orange-600 transition-colors">Accueil</a></li>
                        <li><a href="/menu" class="text-gray-400 hover:text-orange-600 transition-colors">Menu</a></li>
                        <li><a href="/reservation" class="text-gray-400 hover:text-orange-600 transition-colors">Réservation</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-orange-600 transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Informations de Contact</h4>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-map-marker-alt text-orange-600"></i>
                            <span>123 Rue du Restaurant, Maroc, Geulmim</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-phone text-orange-600"></i>
                            <span>+212 6 37 68 06 29</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-orange-600"></i>
                            <span>restaurantelwiam@gmail.com</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-clock text-orange-600"></i>
                            <span>Lun-Dim: 11:00 AM - 10:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Restaurant El Wiam. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
        
        // Auto hide flash messages
        setTimeout(() => {
            const successMsg = document.getElementById('successMessage');
            const errorMsg = document.getElementById('errorMessage');
            
            if (successMsg) {
                successMsg.style.opacity = '0';
                setTimeout(() => successMsg.remove(), 300);
            }
            
            if (errorMsg) {
                errorMsg.style.opacity = '0';
                setTimeout(() => errorMsg.remove(), 300);
            }
        }, 5000);
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
