<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtisanController extends Controller
{
    /**
     * GET /artisans
     * Liste paginée d'artisans, filtre par spécialité.
     */
    public function index(Request $request)
    {
        $query = Artisan::with('user');

        if ($request->filled('specialty')) {
            $query->whereJsonContains('specialties', $request->specialty);
        }

        $artisans = $query->paginate(
            $request->get('per_page', 10),
            ['*'],
            'page',
            $request->get('page', 1)
        );

        return view('artisans.index', compact('artisans'));
    }

    /**
     * POST /artisans
     * Créer ou compléter le profil artisan.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'specialties' => 'required|string',
            // 'phone' => 'required|string',
            'address' => 'required|string',
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'realisations.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos' => 'nullable|string',
        ]);

        // Convert specialties string to array
        $data['specialties'] = array_map('trim', explode(',', $data['specialties']));

        // Handle realisations images
        if ($request->hasFile('realisations')) {
            $realisations = [];
            foreach ($request->file('realisations') as $image) {
                $path = $image->store('realisations', 'public');
                $realisations[] = $path;
            }
            $data['realisations'] = $realisations;
        }

        // Handle videos
        if ($request->filled('videos')) {
            $data['videos'] = array_map('trim', explode(',', $data['videos']));
        }

        $data['user_id'] = auth()->id();

        $artisan = Artisan::create($data);

        return redirect()->route('artisans.index')
            ->with('success', 'Artisan créé avec succès.');
    }

    /**
     * Affiche le formulaire de création d'un artisan.
     */
    public function create()
    {
        return view('artisans.create');
    }

    /**
     * Affiche le formulaire d'édition d'un artisan.
     */
    public function edit(Artisan $artisan)
    {
        return view('artisans.edit', compact('artisan'));
    }

    /**
     * Met à jour un artisan existant.
     */
    public function update(Request $request, Artisan $artisan)
    {
        $data = $request->validate([
            'specialties' => 'required|string',
            // 'phone' => 'required|string',
            'address' => 'required|string',
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'realisations.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos' => 'nullable|string',
        ]);

        // Convert specialties string to array
        $data['specialties'] = array_map('trim', explode(',', $data['specialties']));

        // Handle realisations images
        if ($request->hasFile('realisations')) {
            $realisations = [];
            foreach ($request->file('realisations') as $image) {
                $path = $image->store('realisations', 'public');
                $realisations[] = $path;
            }
            $data['realisations'] = $realisations;
        }

        // Handle videos
        if ($request->filled('videos')) {
            $data['videos'] = array_map('trim', explode(',', $data['videos']));
        }

        $artisan->update($data);

        return redirect()->route('artisans.index')
            ->with('success', 'Artisan mis à jour avec succès.');
    }

    /**
     * Affiche les détails d'un artisan spécifique.
     */
    public function show(Artisan $artisan)
    {
        return view('artisans.show', compact('artisan'));
    }

    /**
     * Supprime un artisan.
     */
    public function destroy(Artisan $artisan)
    {
        // Supprimer les images si elles existent
        if ($artisan->realisations) {
            foreach ($artisan->realisations as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $artisan->delete();

        return redirect()->route('artisans.index')->with('success', 'Artisan supprimé avec succès.');
    }
}
