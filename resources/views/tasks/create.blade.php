<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <h2 class="text-2xl font-bold mb-6">Create New Task</h2>

        <form method="POST" action="{{ route('tasks.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block font-medium">Titre</label>
                <input type="text" name="titre"
                       class="w-full border rounded p-2"
                       required>
            </div>
            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description"
                          class="w-full border rounded p-2"
                          rows="4"
                          required></textarea>
            </div>

            <div>
                <label class="block font-medium">Category</label>
                <select name="category_id" class="w-full border rounded p-2" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Statut</label>
                <select name="statut" class="w-full border rounded p-2" required>
                    <option value="todo">Todo</option>
                    <option value="doing">Doing</option>
                    <option value="done">Done</option>
                </select>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded">
                Save Task
            </button>

        </form>
    </div>
</x-app-layout>