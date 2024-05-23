<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{

    public function index_donation()
    {
        $donations = Donation::all();
        return view('Donation', compact('donations'));
    }

    public function create_donation()
    {
        return view('AddDonation');
    }

    public function store_donation(Request $request)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Donation::create([
            'Title' => $request -> Title,
            'Fundraiser' => $request -> Fundraiser,
            'Limit' => $request -> Limit,
            'Image' => $image_name,
            'Description' => $request -> Description,
        ]);

        return redirect('/donation');
    }

    public function edit_donation($id)
    {
        $donation = Donation::findOrFail($id);
        return view('EditDonation', compact('donation'));
    }

    public function update_donation(Request $request, $id)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Donation::findOrFail($id)->update([
            'Title' => $request -> Title,
            'Fundraiser' => $request -> Fundraiser,
            'Limit' => $request -> Limit,
            'Image' => $image_name,
            'Description' => $request -> Description,
        ]);

        return redirect('/donation');

    }

    public function delete_donation($id)
    {
        $donation = Donation::findOrFail($id);
        $picture = "/storage/images/" . $donation->Image;
        $path = str_replace('\\', '/', public_path());
        // unlink($path . $picture);
        Donation::destroy($id);
        return redirect('/donation');
    }

    public function detail_donation($id)
    {
        $donation = Donation::findOrFail($id);
        return view('ViewDonation', compact('donation'));
    }

    public function update_total_donation(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $oldTotal = $donation->Total;
        $newTotal = $oldTotal + $request->input('Total');
        Donation::findOrFail($id)->update([
            'Total' => $newTotal,
        ]);

        return redirect('/donation');
    }
}
