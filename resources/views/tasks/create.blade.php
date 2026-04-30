<x-app-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative" 
         style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2560'); background-size: cover; background-position: center; background-attachment: fixed;">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-[3px]"></div>

        <div class="max-w-xl w-full space-y-8 relative z-10">
            
            {{-- Card du formulaire --}}
            <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-white/20">
                
                <!-- Lien de retour au Dashboard -->
                <div class="mb-6">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Create New Task
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 italic">
                        Organisez votre journée en quelques clics.
                    </p>
                </div>

                <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                    @csrf

                    {{-- Titre --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Titre</label>
                        <input type="text" name="titre"
                               class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white/50"
                               placeholder="Ex: Finaliser le projet Laravel"
                               required>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea name="description"
                                  class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white/50"
                                  rows="4"
                                  placeholder="Détaillez les étapes à suivre..."
                                  required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Catégorie --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                            <select name="category_id" 
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition bg-white/50" 
                                    required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Statut --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Statut</label>
                            <select name="statut" 
                                    class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition bg-white/50" 
                                    required>
                                <option value="todo">📋 Todo</option>
                                <option value="doing">⏳ Doing</option>
                                <option value="done">✅ Done</option>
                            </select>
                        </div>
                    </div>

                    {{-- Bouton Submit --}}
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transform transition hover:-translate-y-1 active:scale-95">
                            Save Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>