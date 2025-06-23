{{-- resources/views/biens/create.blade.php --}}
@extends('layouts.app')

@section('header')
  <div class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
        {{ __('Créer un bien') }}
      </h1>
    </div>
  </div>
@endsection

@section('content')
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <div class="p-6">

          @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
              <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('biens.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Titre --}}
            <div>
              <label for="titre" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Titre') }}
              </label>
              <input id="titre" name="titre" type="text" value="{{ old('titre') }}"
                     class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
            </div>

            {{-- Description --}}
            <div>
              <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Description') }}
              </label>
              <textarea id="description" name="description" rows="4"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">{{ old('description') }}</textarea>
            </div>

            {{-- Prix --}}
            <div>
              <label for="prix" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Prix (FCFA)') }}
              </label>
              <input id="prix" name="prix" type="number" value="{{ old('prix') }}"
                     class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
            </div>

            {{-- Localisation --}}
            <div>
              <label for="localisation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Localisation') }}
              </label>
              <input id="localisation" name="localisation" type="text" value="{{ old('localisation') }}"
                     class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring" />
            </div>

            {{-- Type de bien --}}
            <div>
              <label for="type_bien" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Type de bien') }}
              </label>
              <select id="type_bien" name="type_bien"
                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring">
                <option value="">{{ __('Sélectionnez…') }}</option>
                <option value="appartement" @selected(old('type_bien')=='appartement')>
                  {{ __('Appartement') }}
                </option>
                <option value="villa" @selected(old('type_bien')=='villa')>
                  {{ __('Villa') }}
                </option>
                <option value="terrain" @selected(old('type_bien')=='terrain')>
                  {{ __('Terrain') }}
                </option>
              </select>
            </div>

            {{-- Statut --}}
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

            {{-- Image --}}
            <div>
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                {{ __('Image du bien') }}
              </label>
              <input name="image" type="file" accept="image/*"
                     class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400" />
            </div>

            {{-- Boutons --}}
            <div class="flex items-center space-x-4">
              <button type="submit"
                      class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500">
                {{ __('Enregistrer') }}
              </button>
              <a href="{{ route('biens.index') }}"
                 class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                {{ __('Annuler') }}
              </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
