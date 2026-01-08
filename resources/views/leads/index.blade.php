<x-app-layout>
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Лиды</h1>

    <form class="flex gap-2 mb-4">
        <input name="search" class="border p-2 rounded w-full" placeholder="Поиск">
        <select name="status" class="border p-2 rounded">
            <option value="">Все</option>
            <option value="new">Новые</option>
            <option value="in_progress">В работе</option>
            <option value="done">Завершены</option>
        </select>
        <button class="bg-blue-600 text-white px-4 rounded">Поиск</button>
    </form>

    <table class="w-full border">
        @foreach($leads as $lead)
            <tr class="border-b">
                <td class="p-2">{{ $lead->name }}</td>
                <td class="p-2">{{ $lead->phone }}</td>
                <td class="p-2">{{ $lead->status }}</td>
            </tr>
        @endforeach
    </table>
</div>
</x-app-layout>
