<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVolunteerRequest;
use App\Http\Requests\UpdateVolunteerRequest;

class VolunteerController extends Controller
{
    public function index_volunteer()
    {
        $volunteers = Volunteer::all();
        return view('Volunteer', compact('volunteers'));
    }

    public function create_volunteer()
    {
        return view('AddVolunteer');
    }

    public function store_volunteer(Request $request)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Volunteer::create([
            'Title' => $request -> Title,
            'Fundraiser' => $request -> Fundraiser,
            'People' => $request -> People,
            'Image' => $image_name,
            'Description' => $request -> Description,
        ]);

        return redirect('/volunteer');
    }

    public function edit_volunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('EditVolunteer', compact('volunteer'));
    }

    public function update_volunteer(Request $request, $id)
    {
        $image_name = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('public/images', $image_name);
        Volunteer::findOrFail($id)->update([
            'Title' => $request -> Title,
            'Fundraiser' => $request -> Fundraiser,
            'People' => $request -> People,
            'Image' => $image_name,
            'Description' => $request -> Description,
        ]);

        return redirect('/volunteer');

    }

    public function delete_volunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $picture = "/storage/images/" . $volunteer->Image;
        $path = str_replace('\\', '/', public_path());
        // unlink($path . $picture);
        Volunteer::destroy($id);
        return redirect('/volunteer');
    }

    public function detail_volunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('ViewVolunteer', compact('volunteer'));
    }

    public function update_total_volunteer(Request $request, $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $oldTotal = $volunteer->Total;
        $newTotal = $oldTotal + $request->input('Total');
        Volunteer::findOrFail($id)->update([
            'Total' => $newTotal,
        ]);

        return redirect('/volunteer');

    }
}
