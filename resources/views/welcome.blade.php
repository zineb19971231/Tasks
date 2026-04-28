@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 text-center">
    <h1 class="text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
        Gérez vos tâches avec <span class="text-indigo-600 underline decoration-indigo-200 decoration-8 underline-offset-4">élégance</span>.
    </h1>
    <p class="text-slate-500 text-lg max-w-2xl mx-auto mb-12">
        Une approche visuelle simple pour organiser votre quotidien professionnel et personnel.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-20">
        @php
            $tasks = [
                ['img' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?q=80&w=800', 'tag' => 'Productivité', 'title' => 'Organisation Quotidienne'],
                ['img' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=600', 'tag' => 'Workspace', 'title' => 'Aménagement Bureau'],
                ['img' => 'https://images.unsplash.com/photo-1512314889357-e157c22f938d?w=600', 'tag' => 'Focus', 'title' => 'Gestion de Projet'],
            ];
        @endphp

        @foreach($tasks as $task)
        <div class="group relative bg-white rounded-3xl p-4 shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-500">
            <div class="overflow-hidden rounded-2xl h-64 mb-6">
                <img src="{{ $task['img'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
            </div>
            <div class="text-left px-2">
                <span class="text-indigo-600 text-xs font-bold tracking-widest uppercase">{{ $task['tag'] }}</span>
                <h3 class="text-xl font-semibold text-slate-800 mt-2">{{ $task['title'] }}</h3>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection