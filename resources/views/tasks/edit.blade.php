<x-app-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative" 
         style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2560'); background-size: cover; background-position: center; background-attachment: fixed;">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-[3px]"></div>

        <div class="max-w-xl w-full space-y-8 relative z-10">
            
            {{-- Card du formulaire d'édition --}}
            <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-white/20">
                
                <!-- Retour rapide -->
                <div class="mb-6 flex justify-between items-center">
                    <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to List
                    </a>
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Editing Mode</span>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Update Task
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Modifier les détails de votre tâche : <span class="font-bold text-indigo-600">"{{ $task->titre }}"</span>
                    </p>
                </div>

                <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Titre --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Titre</label>
                        <input type="text" name="titre" value="{{ old('titre', $task->titre) }}"
                               class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white/50"
                               required>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea name="description"
                                  class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white/50"
                                  rows="5"
                                  required>{{ old('description', $task->description) }}</textarea>
                    </div>

                    {{-- Catégorie --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                        <select name="category_id" 
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition bg-white/50" 
                                required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Bouton de mise à jour --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform transition hover:-translate-y-1 active:scale-95">
                            Update Task Details
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>