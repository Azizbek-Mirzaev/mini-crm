<x-app-layout>
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Редактировать лид</h1>

    <form method="POST" action="{{ route('leads.update', $lead) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input
            name="full_name"
            class="w-full border p-2 rounded"
            value="{{ old('name', $lead->name) }}"
        >

        <input
            name="phone"
            class="w-full border p-2 rounded"
            value="{{ old('phone', $lead->phone) }}"
        >

        <select name="status" class="w-full border p-2 rounded">
            @foreach(['new','in_progress','done'] as $status)
                <option value="{{ $status }}"
                    @selected($lead->status === $status)>
                    {{ $status }}
                </option>
            @endforeach
        </select>

        <textarea
            name="note"
            class="w-full border p-2 rounded"
        >{{ old('note', $lead->note) }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Обновить
        </button>
    </form>
</div>
</x-app-layout>
