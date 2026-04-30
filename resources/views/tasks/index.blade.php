<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md hidden sm:block">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-800">Menu</h2>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 transition-colors">
                    <span class="mx-3 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('tasks.index') }}" class="flex items-center px-6 py-3 text-gray-700 bg-indigo-50 border-r-4 border-indigo-500">
                    <span class="mx-3 font-medium">Manage Tasks</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 transition-colors">
                    <span class="mx-3">Categories</span>
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto p-8 relative"
              style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2560'); background-size: cover; background-position: center; background-attachment: fixed;">
            
            {{-- Overlay pour le contraste --}}
            <div class="absolute inset-0 bg-gray-50/60 backdrop-blur-[2px]"></div>

            <div class="max-w-7xl mx-auto relative z-10">
                
                {{-- Header avec titre et bouton de création --}}
                <div class="mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h1 class="text-3xl font-extrabold text-gray-900 text-center sm:text-left border-b-4 border-indigo-600 pb-2 rounded-t-lg">
                        Liste des Tâches
                    </h1>
                    <a href="{{ route('tasks.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                        + Nouvelle Tâche
                    </a>
                </div>

                {{-- Table Card avec effet Glassmorphism --}}
                <div class="bg-white/90 backdrop-blur-md rounded-xl shadow-2xl border border-white/20 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100/50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-xs uppercase font-bold text-gray-600 tracking-wider">Titre & Description</th>
                                <th class="px-6 py-4 text-xs uppercase font-bold text-gray-600 tracking-wider text-center">Catégorie</th>
                                <th class="px-6 py-4 text-xs uppercase font-bold text-gray-600 tracking-wider text-center">Statut</th>
                                <th class="px-6 py-4 text-xs uppercase font-bold text-gray-600 tracking-wider text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($tasks as $task)
                                <tr class="hover:bg-indigo-50/50 transition duration-150">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-800">{{ $task->titre }}</div>
                                        <div class="text-xs text-gray-500 truncate max-w-md">{{ $task->description }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-700">
                                        <span class="px-3 py-1 bg-white/50 rounded-full border border-gray-200 shadow-sm">
                                            {{ $task->category->nom ?? 'Sans catégorie' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <select name="statut" onchange="this.form.submit()" 
                                                class="appearance-none cursor-pointer text-xs rounded-full font-semibold px-4 py-1 border-none shadow-sm focus:ring-2
                                                @if($task->statut == 'todo') bg-red-100 text-red-600
                                                @elseif($task->statut == 'doing') bg-blue-100 text-blue-600
                                                @else bg-green-100 text-green-600
                                                @endif">
                                                <option value="todo" {{ $task->statut == 'todo' ? 'selected' : '' }}>To Do</option>
                                                <option value="doing" {{ $task->statut == 'doing' ? 'selected' : '' }}>Doing</option>
                                                <option value="done" {{ $task->statut == 'done' ? 'selected' : '' }}>Done</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            {{-- Voir les détails --}}
                                            <a href="{{ route('tasks.show', $task->id) }}" class="p-2 text-gray-500 hover:text-indigo-600 hover:bg-white rounded-full transition shadow-sm bg-white/50" title="Détails">
                                                <span>👁️</span>
                                            </a>
                                            {{-- Modifier --}}
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="p-2 text-gray-500 hover:text-blue-600 hover:bg-white rounded-full transition shadow-sm bg-white/50" title="Modifier">
                                                <span>✏️</span>
                                            </a>
                                            {{-- Supprimer --}}
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-white rounded-full transition shadow-sm bg-white/50" title="Supprimer">
                                                    <span>🗑️</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <span class="text-5xl mb-4">📋</span>
                                            <p class="text-lg font-medium">Aucune tâche pour le moment.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>