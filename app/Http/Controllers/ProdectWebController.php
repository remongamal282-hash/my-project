<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdectStoreRequest;
use App\Models\Prodect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdectWebController extends Controller
{
    public function index(): View
    {
        $prodects = Prodect::latest()->get();

        return view('prodects.index', compact('prodects'));
    }

    public function create(): View
    {
        return view('prodects.create');
    }

    public function store(ProdectStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('prodects', 'public');

        Prodect::create($data);

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect saved successfully.');
    }

    public function edit(Prodect $prodect): View
    {
        return view('prodects.edit', compact('prodect'));
    }

    public function update(ProdectStoreRequest $request, Prodect $prodect): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($prodect->image) {
                Storage::disk('public')->delete($prodect->image);
            }

            $data['image'] = $request->file('image')->store('prodects', 'public');
        } else {
            unset($data['image']);
        }

        $prodect->update($data);

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect updated successfully.');
    }

    public function destroy(Prodect $prodect): RedirectResponse
    {
        if ($prodect->image) {
            Storage::disk('public')->delete($prodect->image);
        }

        $prodect->delete();

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect deleted successfully.');
    }
}
