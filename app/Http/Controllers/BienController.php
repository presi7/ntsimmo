<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BienController extends Controller
{
    public function home()
    {
        $biens    = Bien::all();
        $zones    = Bien::pluck('localisation')->unique();
        $artisans = Artisan::with('user')->get();

        return view('welcome', compact('biens', 'zones', 'artisans'));
    }

    public function index(Request $request)
    {
        $query = Bien::query();
        if ($request->filled('type_bien')) {
            $query->where('type_bien', $request->type_bien);
        }
        if ($request->filled('budget_min')) {
            $query->where('prix', '>=', $request->budget_min);
        }
        if ($request->filled('budget_max')) {
            $query->where('prix', '<=', $request->budget_max);
        }
        if ($request->filled('localisation')) {
            $query->where('localisation', 'like', '%'.$request->localisation.'%');
        }

        $biens = $query->orderBy('created_at', 'desc')
                       ->paginate(10)
                       ->withQueryString();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json($biens);
        }

        return view('biens.index', compact('biens'));
    }

    public function create()
    {
        return view('biens.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'prix'         => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
            'type_bien'    => 'required|in:appartement,villa,terrain',
            'statut' => 'required|in:A vendre,A louer,vendu,loué',
            'image'        => 'nullable|image|max:2048',
        ]);

        $data['user_id'] = auth()->id() ?? 1;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('biens', 'public');
        }

        Bien::create($data);

        return redirect()
            ->route('biens.index')
            ->with('success', 'Bien créé avec succès.');
    }

    public function edit(Bien $bien)
    {
        return view('biens.edit', compact('bien'));
    }

    public function update(Request $request, Bien $bien)
    {
        $data = $request->validate([
            'titre'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'prix'         => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
            'type_bien'    => 'required|in:appartement,villa,terrain',
            'statut' => 'required|in:A vendre,A louer,vendu,loué',
            'image'        => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($bien->image_path) {
                Storage::disk('public')->delete($bien->image_path);
            }
            $data['image_path'] = $request->file('image')->store('biens', 'public');
        }

        $bien->update($data);

        return redirect()
            ->route('biens.index')
            ->with('success', 'Bien mis à jour avec succès.');
    }

    public function show(Bien $bien)
    {
        return view('biens.show', compact('bien'));
    }

    public function destroy(Bien $bien)
    {
        if ($bien->image_path) {
            Storage::disk('public')->delete($bien->image_path);
        }
        $bien->delete();

        return redirect()
            ->route('biens.index')
            ->with('success', 'Bien supprimé avec succès.');
    }
}
