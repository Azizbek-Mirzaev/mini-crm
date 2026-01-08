<x-app-layout>
<div class="max-w-3xl mx-auto p-6 space-y-4">

    <h1 class="text-2xl font-bold">{{ $lead->name }}</h1>

    <p><strong>Телефон:</strong> {{ $lead->phone }}</p>
    <p><strong>Статус:</strong> {{ $lead->status }}</p>

    @if($lead->note)
        <p><strong>Комментарий:</strong> {{ $lead->note }}</p>
    @endif

    <div class="flex gap-2 mt-4">
        <a href="{{ route('leads.edit', $lead) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded">
            Редактировать
        </a>

        <form method="POST" action="{{ route('leads.destroy', $lead) }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded">
                Удалить
            </button>
        </form>
    </div>

</div>
</x-app-layout>
