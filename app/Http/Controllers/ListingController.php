<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }


    public function show(Listing $listing)
    {
        return view('listings.show', [
            'id' => $listing,
            'listing' => $listing,
        ]);
    }


    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        //Recevoir les données et ajouter des contrainte
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'price' => 'required',
            'email' => ['required', 'email'],
            'delivery_time' => '',
            'website' => '',
            'description' => 'required'
        ]);

        //Recevoir et stockage de logo s'il existe 
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        };


        $formFields['user_id'] = auth()->id();


        Listing::create($formFields);

        //Redirect with a Flash message
        return redirect('/')->with('message', 'Listing created successfully!');
    }





    public function edit(Listing $listing)
    {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);;
    }


    //update listing data
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'price' => 'required',
            'email' => ['required', 'email'],
            'delivery_time' => '',
            'website' => '',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        };


        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }


    // Manage Listings
    public function manage(User $user)
    {
        $user->listings();
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
