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

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-7xl mx-auto">
                {{-- Header simple --}}
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Liste des Tâches</h1>
                    <p class="text-sm text-gray-500">Gérez vos priorités et mettez à jour vos avancements.</p>
                </div>

                {{-- Table Card --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-xs uppercase font-semibold text-gray-500 tracking-wider">Titre & Description</th>
                                <th class="px-6 py-4 text-xs uppercase font-semibold text-gray-500 tracking-wider text-center">Statut</th>
                                <th class="px-6 py-4 text-xs uppercase font-semibold text-gray-500 tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($tasks as $task)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-800">{{ $task->titre }}</div>
                                        <div class="text-xs text-gray-500 truncate max-w-md">{{ $task->description }}</div>
                                    </td>
                                  <td class="px-6 py-4 text-center">
                                       <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH') {{-- On précise que c'est une requête PATCH --}}
                                            
                                            <select name="statut" onchange="this.form.submit()" 
                                                class="text-xs rounded-full font-semibold  px-3 py-1 border-none focus:ring-2
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
                                        <div class="flex justify-end gap-3">
                                            {{-- Voir --}}
                                            <a href="{{ route('tasks.show', $task->id) }}" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Détails">
                                                <span>👁️</span>
                                            </a>
                                            {{-- Modifier --}}
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Modifier">
                                                <span>✏️</span>
                                            </a>
                                            {{-- Supprimer --}}
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
                                                    <span>🗑️</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <span class="text-4xl mb-2">📋</span>
                                            <p>Aucune tâche à gérer pour le moment.</p>
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