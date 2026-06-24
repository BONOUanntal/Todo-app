<!DOCTYPE html>
<html>

<head>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10">

    <h1 class="text-4xl font-bold mb-8">
        Ma Todo List
    </h1>


<form
    method="POST"
    action="/tasks"
    class="flex gap-2 mb-6"
>
    @csrf

    <input
        type="text"
        name="title"
        placeholder="Nouvelle tâche"
        class="border rounded px-4 py-2 flex-1"
    >

    <button
        class="bg-blue-500 text-white px-4 py-2 rounded"
    >
        Ajouter
    </button>
</form>

<h2 class="text-2xl font-bold mb-4">
    À faire
</h2>

@foreach($tasks->where('completed', false) as $task)

    <div class="bg-white shadow rounded-lg p-4 mb-4">

        <p>
            @if($task->completed)

                <s>{{ $task->title }}</s>

            @else

                {{ $task->title }}

            @endif

        </p>

        <input
            type="date"
            name="due_date"
        >

        <select name="priority">

            <option value="low">
                Faible
            </option>

            <option value="normal">
                Normale
            </option>

            <option value="high">
                Haute
            </option>

        </select>
    
    <div class="flex gap-2 mt-3">

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PUT')
    
            <!-- <input
                type="text"
                name="title"
                value="{{ $task->title }}"
            > -->
    
            <button
                class="bg-yellow-500 text-white px-3 py-1 rounded"
            >
                Modifier
            </button>
    
        </form>
    
        <form method="POST" action="/tasks/{{ $task->id }}/complete">
            @csrf
            @method('PATCH')
    
            <button
                class="bg-green-500 text-white px-3 py-1 rounded"
            >
                Terminée
            </button>
    
        </form>
        
        <form method="POST" action="/tasks/{{$task->id}}">
            @csrf
            @method('DELETE')
    
            <button
                class="bg-red-500 text-white px-3 py-1 rounded"
            >
                Supprimer
            </button>
    
        </form>
    </div>


@endforeach

<h2 class="text-2xl font-bold mt-10 mb-4">
    Terminées
</h2>

@foreach($tasks->where('completed', true) as $task)

    <div class="bg-green-100 shadow rounded-lg p-4 mb-4">

        <p>
            <s>{{ $task->title }}</s>
        </p>

        <form method="POST" action="/tasks/{{$task->id}}">
            @csrf
            @method('DELETE')

            <button
                class="bg-red-500 text-white px-3 py-1 rounded"
            >
                Supprimer
            </button>

        </form>

    </div>

@endforeach