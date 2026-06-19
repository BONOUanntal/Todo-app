<h1>Ma Todo List</h1>

<form method="POST" action="/tasks">
    @csrf

    <input
        type="text"
        name="title"
        placeholder="Nouvelle tâche"
    >

    <button>
        Ajouter
    </button>
</form>

@foreach($tasks as $task)

    <p>
        {{ $task->title }}

        @if($task->completed)
            ✅
        @endif
    </p>

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')

        <input
            type="text"
            name="title"
            value="{{ $task->title }}"
        >

        <button>
            Modifier
        </button>

    </form>

    <form method="POST" action="/tasks/{{ $task->id }}/complete">
        @csrf
        @method('PATCH')

        <button>
            Terminée
        </button>

    </form>
    
    <form method="POST" action="/tasks/{{$task->id}}">
        @csrf
        @method('DELETE')

        <button>
            Supprimé
        </button>

    </form>

@endforeach