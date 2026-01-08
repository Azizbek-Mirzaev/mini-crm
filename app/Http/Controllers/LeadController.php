<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Http\Requests\LeadRequest;
// use Illuminate\Http\RedirectResponse;

class LeadController extends Controller
{
//    public function index(Request $request)
// {
//     $leads = Lead::where('assigned_to', auth()->id())
//         ->when($request->search, fn ($q) =>
//             $q->where('name', 'like', "%{$request->search}%")
//               ->orWhere('phone', 'like', "%{$request->search}%")
//         )
//         ->when($request->status, fn ($q) =>
//             $q->where('status', $request->status)
//         )
//         ->latest()
//         ->paginate(10);

//     return view('leads.index', compact('leads'));
// }
public function index(Request $request)
{
    $query = Lead::where('assigned_to', auth()->id());

    // 🔍 ПОИСК
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");
        });
    }

    // 🔽 ФИЛЬТР ПО СТАТУСУ
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // ⏱ СОРТИРОВКА
    $leads = $query->orderBy('created_at', 'desc')->get();

    return view('leads.index', compact('leads'));
}


public function store(LeadRequest $request)
{
    Lead::create([
        ...$request->validated(),
        'assigned_to' => auth()->id(),
    ]);

    return redirect()->route('leads.index');
}

public function show(Lead $lead)
{
    $this->authorize('view', $lead);
    return view('leads.show', compact('lead'));
}

}
