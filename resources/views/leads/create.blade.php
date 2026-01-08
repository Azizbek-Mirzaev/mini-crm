<x-app-layout>
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Создать лид</h1>

    <form method="POST" action="{{ route('leads.store') }}" class="space-y-4">
        @csrf

        <input
            name="full_name"
            placeholder="ФИО"
            class="w-full border p-2 rounded"
            value="{{ old('full_name') }}"
        >

        <input
            name="phone"
            placeholder="Телефон"
            class="w-full border p-2 rounded"
            value="{{ old('phone') }}"
        >

        <select name="status" class="w-full border p-2 rounded">
            <option value="new">Новый</option>
            <option value="in_progress">В работе</option>
            <option value="done">Завершён</option>
        </select>

        <textarea
            name="note"
            placeholder="Комментарий"
            class="w-full border p-2 rounded"
        ></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Сохранить
        </button>
    </form>
</div>
</x-app-layout>
