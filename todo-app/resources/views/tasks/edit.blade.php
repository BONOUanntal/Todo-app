<!DOCTYPE html>
<html>

<head>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10">

    <h1 class="text-3xl font-bold mb-6">
        Modifier la tâche
    </h1>

    <form
        method="POST"
        action="/tasks/{{ $task->id }}"
    >
        @csrf
        @method('PUT')

        <input
            type="text"
            name="title"
            value="{{ $task->title }}"
            class="border rounded px-4 py-2 w-full"
        >

        <button
            class="bg-yellow-500 text-white px-4 py-2 rounded mt-4"
        >
            Enregistrer
        </button>

    </form>

</div>

</body>
</html>