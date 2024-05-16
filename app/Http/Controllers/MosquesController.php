<?php

namespace App\Http\Controllers;
use App\Models\Mosques;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class MosquesController extends Controller
{
    public function edit(Request $request): Response
    {
        return Inertia::render('Mosques/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'mosques' => Mosques::where('user_id', $request->user()->id)->get(),           
        ]);
    }

    public function create(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'fajr_time' => 'required|string|max:10',
            'dhuhr_time' => 'required|string|max:10',
            'asr_time' => 'required|string|max:10',
            'maghrib_time' => 'required|string|max:10',
            'isha_time' => 'required|string|max:10',
            'jummah_time' => 'required|string|max:10',
            
        ]);

        $user = Mosques::create([
            'name' => $request->name,
            'fajr_time' => $request->fajr_time,
            'dhuhr_time' => $request->dhuhr_time,
            'asr_time' => $request->asr_time,
            'maghrib_time' => $request->maghrib_time,
            'isha_time' => $request->isha_time,
            'jummah_time' => $request->jummah_time,
            'user_id' => $request->user()->id,
        ]);
        
        return Redirect::route('mosques.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fajr_time' => 'required|string|max:10',
            'dhuhr_time' => 'required|string|max:10',
            'asr_time' => 'required|string|max:10',
            'maghrib_time' => 'required|string|max:10',
            'isha_time' => 'required|string|max:10',
            'jummah_time' => 'required|string|max:10',
        ]);

        $mosque = Mosques::find($request->id);

        if ($mosque->user_id !== $request->user()->id) {
            abort(403);
        }

        $mosque->name = $request->name;
        $mosque->fajr_time = $request->fajr_time;
        $mosque->dhuhr_time = $request->dhuhr_time;
        $mosque->asr_time = $request->asr_time;
        $mosque->maghrib_time = $request->maghrib_time;
        $mosque->isha_time = $request->isha_time;
        $mosque->jummah_time = $request->jummah_time;
        $mosque->save();

        return Redirect::route('mosques.edit');
        
    }

    public function show($id): Response
    {
        $mosque = Mosques::find($id);

        if ($mosque === null) {
            abort(404);
        }

        return Inertia::render('Mosques/Show', [
            'mosque' => $mosque,
        ]);
    }
}
