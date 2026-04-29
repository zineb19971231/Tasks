<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <aside class="w-64 bg-white shadow-md hidden sm:block">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-800">Menu</h2>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 bg-indigo-50 border-r-4 border-indigo-500">
                    <span class="mx-3 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('tasks.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200">
                    <span class="mx-3">Manage Tasks</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 transition-colors duration-200">
                    <span class="mx-3">Categories</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    {{-- Total Tasks --}}
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 uppercase font-semibold">Total Tasks</p>
                        <h3 class="text-3xl font-bold text-indigo-600">{{  $stats['total'] }}</h3>
                    </div>

                    {{-- Pending (Todo) --}}
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-red-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">To Do</p>
                        <h3 class="text-3xl font-bold text-red-500">{{  $stats['todo'] }}</h3>
                    </div>

                    {{-- In Progress (Doing) --}}
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-blue-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">In Progress</p>
                        <h3 class="text-3xl font-bold text-blue-500">{{  $stats['doing'] }}</h3>
                    </div>

                    {{-- Completed (Done) --}}
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-green-500">
                        <p class="text-sm text-gray-500 uppercase font-semibold">Completed</p>
                        <h3 class="text-3xl font-bold text-green-500">{{  $stats['done'] }}</h3>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-800">Recent Tasks</h3>
                        <a href="{{ route('tasks.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            + New Task
                        </a>
                    </div>
                    <div class="p-6">
                       @if($tasks->isEmpty())
    <p class="text-gray-500 text-center py-4">No tasks found. Start by creating one!</p>
@else
    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="flex justify-between items-center p-4 border rounded-lg">
                <div>
                    <h4 class="font-semibold text-gray-800">{{ $task->titre }}</h4>
                    <p class="text-sm text-gray-500">{{ $task->description }}</p>
                </div>

                <div class="flex gap-2 items-center">
                    <span class="text-sm px-3 py-1 rounded-full 
                        @if($task->statut == 'todo') bg-red-100 text-red-600
                        @elseif($task->statut == 'doing') bg-blue-100 text-blue-600
                        @else bg-green-100 text-green-600
                        @endif">
                        {{ ucfirst($task->statut) }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>