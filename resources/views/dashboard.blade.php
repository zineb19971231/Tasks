<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md hidden sm:block">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-800">Menu</h2>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 bg-indigo-50 border-r-4 border-indigo-500">
                    <span class="mx-3 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('tasks.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 transition-colors duration-200">
                    <span class="mx-3">Manage Tasks</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 transition-colors duration-200">
                    <span class="mx-3">Categories</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-7xl mx-auto">
                {{-- Header avec Statistiques et Bouton --}}
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Aperçu du Projet</h1>
                    <a href="{{ route('tasks.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md">
                        + New Task
                    </a>
                </div>

                {{-- Statistics Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 uppercase font-semibold">Total Tasks</p>
                        <h3 class="text-3xl font-bold text-indigo-600">{{ $stats['total'] }}</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-red-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">To Do</p>
                        <h3 class="text-3xl font-bold text-red-500">{{ $stats['todo'] }}</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-blue-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">In Progress</p>
                        <h3 class="text-3xl font-bold text-blue-500">{{ $stats['doing'] }}</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-green-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">Completed</p>
                        <h3 class="text-3xl font-bold text-green-500">{{ $stats['done'] }}</h3>
                    </div>
                </div>

                {{-- Chart Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-800 mb-4">Task Distribution</h3>
                        <div class="relative" style="height: 300px;">
                            <canvas id="taskChart"></canvas>
                        </div>
                    </div>
                    
                    {{-- Espace pour une autre info ou un message de bienvenue --}}
                    <div class="bg-indigo-600 p-8 rounded-xl shadow-lg text-white flex flex-col justify-center">
                        <h2 class="text-2xl font-bold mb-2">Bonjour, Zineb !</h2>
                        <p class="opacity-90">Vous avez actuellement {{ $stats['todo'] }} tâches qui attendent votre attention.</p>
                        <div class="mt-6">
                            <a href="{{ route('tasks.index') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-medium inline-block">Voir tout</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Script pour le graphique --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('taskChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut', {{-- Un graphique en anneau est très propre pour un dashboard --}}
            data: {
                labels: ['To Do', 'In Progress', 'Completed'],
                datasets: [{
                    data: [{{ $stats['todo'] }}, {{ $stats['doing'] }}, {{ $stats['done'] }}],
                    backgroundColor: ['#EF4444', '#3B82F6', '#10B981'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                cutout: '70%' {{-- Donne l'aspect anneau fin --}}
            }
        });
    </script>

</x-app-layout>