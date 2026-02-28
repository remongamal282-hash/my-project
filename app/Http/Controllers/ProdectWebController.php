<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdectStoreRequest;
use App\Models\Prodect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

class ProdectWebController extends Controller
{
    public function index(): View
    {
        $dbError = null;
        $prodects = collect();

        try {
            $prodects = Prodect::latest()->get();
        } catch (Throwable $e) {
            report($e);
            $dbError = 'Database is unavailable right now. Please configure production database settings.';
        }

        return view('prodects.index', compact('prodects', 'dbError'));
    }

    public function create(): View|RedirectResponse
    {
        if (! $this->isDatabaseAvailable()) {
            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Database is unavailable right now. Please configure production database settings.');
        }

        return view('prodects.create');
    }

    public function store(ProdectStoreRequest $request): RedirectResponse
    {
        if (! $this->isDatabaseAvailable()) {
            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Database is unavailable right now. Please configure production database settings.');
        }

        $storedImagePath = null;

        try {
            $data = $request->validated();
            $storedImagePath = $request->file('image')->store('prodects', 'public');
            $data['image'] = $storedImagePath;

            Prodect::create($data);
        } catch (Throwable $e) {
            if ($storedImagePath) {
                Storage::disk('public')->delete($storedImagePath);
            }

            report($e);

            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Could not save product because the database is unavailable.');
        }

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect saved successfully.');
    }

    public function edit(string $prodect): View|RedirectResponse
    {
        try {
            $prodect = Prodect::findOrFail($prodect);
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Could not load product because the database is unavailable.');
        }

        return view('prodects.edit', compact('prodect'));
    }

    public function update(ProdectStoreRequest $request, string $prodect): RedirectResponse
    {
        if (! $this->isDatabaseAvailable()) {
            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Database is unavailable right now. Please configure production database settings.');
        }

        try {
            $prodect = Prodect::findOrFail($prodect);
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
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Could not update product because the database is unavailable.');
        }

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect updated successfully.');
    }

    public function destroy(string $prodect): RedirectResponse
    {
        try {
            $prodect = Prodect::findOrFail($prodect);

            if ($prodect->image) {
                Storage::disk('public')->delete($prodect->image);
            }

            $prodect->delete();
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('web.prodects.index')
                ->with('error', 'Could not delete product because the database is unavailable.');
        }

        return redirect()
            ->route('web.prodects.index')
            ->with('success', 'Prodect deleted successfully.');
    }

    private function isDatabaseAvailable(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
