<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        return view('listing.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]); 
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listing.show', [
            'listing' => $listing
        ]);
    }

    // Show form to create new listing
    public function create() {
        return view('listing.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('success', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        return view('listing.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('success', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete();

        return redirect('/')->with('success', 'Listing deleted successfully!');
    }

    // Manage Listings
    public function manage() {
        return view('listing.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}