@extends('layouts.app')

@section('header')
  <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
    {{ __('Modifier le bien') }}
  </h1>
@endsection

@section('content')
  @if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('biens.update', $bien) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
    @csrf
    @method('PUT')

    <div>
      <label for="titre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Titre') }}</label>
      <input id="titre" name="titre" type="text" value="{{ old('titre', $bien->titre) }}"
             class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
    </div>

    <div>
      <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Description') }}</label>
      <textarea id="description" name="description" rows="4"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">{{ old('description', $bien->description) }}</textarea>
    </div>

    <div>
      <label for="prix" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Prix (FCFA)') }}</label>
      <input id="prix" name="prix" type="number" value="{{ old('prix', $bien->prix) }}"
             class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
    </div>

    <div>
      <label for="localisation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Localisation') }}</label>
      <input id="localisation" name="localisation" type="text" value="{{ old('localisation', $bien->localisation) }}"
             class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
    </div>

    <div>
      <label for="type_bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Type de bien') }}</label>
      <select id="type_bien" name="type_bien"
              class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
        <option value="appartement" @selected(old('type_bien', $bien->type_bien)=='appartement')>Appartement</option>
        <option value="villa"       @selected(old('type_bien', $bien->type_bien)=='villa')      >Villa</option>
        <option value="terrain"     @selected(old('type_bien', $bien->type_bien)=='terrain')    >Terrain</option>
      </select>
    </div>

    <div>
  <div>
  <label for="statut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
    {{ __('Statut') }}
  </label>
  <select id="statut" name="statut"
          class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
    <option value="A vendre" @selected(old('statut', $bien->statut ?? '')=='A vendre')>
      {{ __('A vendre') }}
    </option>
    <option value="A louer" @selected(old('statut', $bien->statut ?? '')=='A louer')>
      {{ __('A louer') }}
    </option>
    <option value="vendu" @selected(old('statut', $bien->statut ?? '')=='vendu')>
      {{ __('Vendu') }}
    </option>
    <option value="loué" @selected(old('statut', $bien->statut ?? '')=='loué')>
      {{ __('Loué') }}
    </option>
  </select>
</div>

    @if($bien->image_path)
      <div>
        <img src="{{ asset('storage/'.$bien->image_path) }}"
             alt="{{ $bien->titre }}"
             class="w-full h-48 object-cover rounded mb-4" />
      </div>
    @endif

    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Changer l’image') }}</label>
      <input name="image" type="file" accept="image/*"
             class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400" />
    </div>

    <div class="flex space-x-4">
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">
        {{ __('Mettre à jour') }}
      </button>
      <a href="{{ route('biens.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
        {{ __('Annuler') }}
      </a>
    </div>
  </form>
@endsection
