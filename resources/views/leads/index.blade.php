{{-- <x-app-layout>
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Лиды</h1>

    <form class="flex gap-2 mb-4">
        <input name="search" class="border p-2 rounded w-full" placeholder="Поиск">
        <select name="status" class="border p-2 rounded">
    <option value="">Все статусы</option>

    <option value="new"
        @selected(request('status') === 'new')>
        Новый
    </option>

    <option value="in_progress"
        @selected(request('status') === 'in_progress')>
        В работе
    </option>

    <option value="done"
        @selected(request('status') === 'done')>
        Завершён
    </option>
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
</x-app-layout> --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-6">

        {{-- Заголовок --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Лиды</h1>

            <a href="{{ route('leads.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Добавить лид
            </a>
        </div>

        {{-- ПОИСК + ФИЛЬТР --}}
        <form method="GET"
              action="{{ route('leads.index') }}"
              class="flex flex-wrap gap-3 mb-6">

            {{-- Поиск --}}
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Поиск по имени или телефону"
                class="border rounded px-3 py-2 w-64"
            >

            {{-- Фильтр по статусу --}}
        <<select name="status" class="border rounded px-3 py-2">
            <option value="">Все</option>
            <option value="new" @selected(request('status') === 'new')>Новый</option>
            <option value="in_progress" @selected(request('status') === 'in_progress')>В работе</option>
            <option value="done" @selected(request('status') === 'done')>Завершён</option>
        </select>

                {{-- КНОПКА --}}
    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
        Применить
    </button>
        </form>

        {{-- Таблица --}}
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left p-3 border">Имя</th>
                        <th class="text-left p-3 border">Телефон</th>
                        <th class="text-left p-3 border">Статус</th>
                        <th class="text-left p-3 border">Создан</th>
                        <th class="text-left p-3 border">Действия</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($leads as $lead)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">
                                {{ $lead->name }}
                            </td>

                            <td class="p-3 border">
                                {{ $lead->phone }}
                            </td>

                            <td class="p-3 border">
                                <span class="px-2 py-1 rounded text-sm
                                    @if($lead->status === 'new') bg-blue-100 text-blue-800
                                    @elseif($lead->status === 'in_progress') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800
                                    @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>

                            <td class="p-3 border">
                                {{ $lead->created_at->format('d.m.Y') }}
                            </td>

                            <td class="p-3 border space-x-2">
                                <a href="{{ route('leads.show', $lead) }}"
                                   class="text-blue-600 hover:underline">
                                    Открыть
                                </a>

                                <a href="{{ route('leads.edit', $lead) }}"
                                   class="text-yellow-600 hover:underline">
                                    Редактировать
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="p-6 text-center text-gray-500">
                                Лиды не найдены
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
