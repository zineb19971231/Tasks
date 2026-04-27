<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVisuals | Premium Experience</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900 flex flex-col min-h-screen">

    <nav class="glass-nav sticky top-0 z-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-200">
                        <span class="text-white font-bold">T</span>
                    </div>
                    <span class="text-xl font-semibold tracking-tight text-slate-800">Task<span class="text-indigo-600">Visuals</span></span>
                </div>

                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="/" class="text-slate-600 hover:text-indigo-600 transition-colors">Accueil</a>
                    @auth
                        <a href="/dashboard" class="px-5 py-2.5 bg-slate-900 text-white rounded-full hover:bg-slate-800 transition-all shadow-md">Dashboard</a>
                    @else
                        <a href="/login" class="text-slate-600 hover:text-indigo-600 transition-colors">Connexion</a>
                        <a href="/register" class="px-6 py-2.5 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">Commencer</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-slate-500 text-sm">© 2026 TaskVisuals Agadir. Crafted with Excellence.</p>
            <div class="flex space-x-6 text-slate-400">
                <a href="#" class="hover:text-indigo-600 transition-colors">Privacy</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Terms</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Support</a>
            </div>
        </div>
    </footer>

</body>
</html>