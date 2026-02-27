<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdectStoreRequest;
use App\Http\Requests\ProdectUpdateRequest;
use App\Models\Prodect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdectController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $search = (string) ($request->query('search') ?? $request->query('name', ''));

        $query = Prodect::query();

        if ($search !== '') {
            $query->where('name', 'like', "%{$search}%");
        }

        $prodects = $query->latest()->get();

        if ($search !== '' && $prodects->isEmpty()) {
            abort(404, 'Prodect not found.');
        }

        return response()->json($prodects);
    }

    public function store(ProdectStoreRequest $request): JsonResponse
    {
        $prodect = Prodect::create($request->validated());

        return response()->json($prodect, 201);
    }

    public function show(Prodect $prodect): JsonResponse
    {
        return response()->json($prodect);
    }

    public function update(ProdectUpdateRequest $request, Prodect $prodect): JsonResponse
    {
        $prodect->update($request->validated());

        return response()->json($prodect);
    }

    public function destroy(Prodect $prodect): JsonResponse
    {
        $prodect->delete();

        return response()->json(status: 204);
    }
}
