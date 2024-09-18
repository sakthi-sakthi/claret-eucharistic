<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    public function showregister()
    {
        return view('admin.pages.registerform');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_join' => 'required|date',
            'door_no' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'street_nagar' => 'required|string|max:255',
            'pin' => 'required|string|max:10',
            'village' => 'required|string|max:255',
            'post_office' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'whatsapp_no' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'dynamic_name.*' => 'nullable|string',
            'dynamic_relation.*' => 'nullable|string',
            'dynamic_dob_day.*' => 'nullable|numeric|min:1|max:31',
            'dynamic_dob_month.*' => 'nullable|numeric|min:1|max:12',
            'dynamic_dob_year.*' => 'nullable|numeric|min:1900|max:2100',
            'death_name.*' => 'nullable|string',
            'death_relation.*' => 'nullable|string',
            'death_day.*' => 'nullable|numeric|min:1|max:31',
            'death_month.*' => 'nullable|numeric|min:1|max:12',
            'any_other_intention' => 'nullable|string',
            'signature' => 'required',
        ]);

        $familyDetails = [];
        if ($request->has('dynamic_name')) {
            foreach ($request->dynamic_name as $index => $name) {
                $familyDetails[] = [
                    'name' => $name,
                    'relation' => $request->dynamic_relation[$index],
                    'dob_day' => $request->dynamic_dob_day[$index],
                    'dob_month' => $request->dynamic_dob_month[$index],
                    'dob_year' => $request->dynamic_dob_year[$index],
                    'dom_day' => $request->dynamic_dom_day[$index] ?? null,
                    'dom_month' => $request->dynamic_dom_month[$index] ?? null,
                    'dom_year' => $request->dynamic_dom_year[$index] ?? null,
                    'mobile' => $request->dynamic_mobile[$index] ?? null,
                ];
            }
        }

        $deathAnniversaries = [];
        if ($request->has('death_name')) {
            foreach ($request->death_name as $index => $name) {
                $deathAnniversaries[] = [
                    'name' => $name,
                    'relation' => $request->death_relation[$index],
                    'day' => $request->death_day[$index],
                    'month' => $request->death_month[$index],
                ];
            }
        }

        Enrollment::create([
            'name' => $request->name,
            'date_of_join' => $request->date_of_join,
            'door_no' => $request->door_no,
            'district' => $request->district,
            'street_nagar' => $request->street_nagar,
            'pin' => $request->pin,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'state' => $request->state,
            'country' => $request->country,
            'diocese' => $request->diocese,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'email' => $request->email,
            'family_details' => $familyDetails,
            'death_anniversary' => $deathAnniversaries,
            'any_other_intention' => $request->any_other_intention,
            'signature' => $request->signature,
        ]);

        return redirect()->back()->with('success', 'Enrollment saved successfully.');
    }

    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->family_details = $enrollment->family_details ?? [];
        $enrollment->death_anniversary = $enrollment->death_anniversary ?? [];

        return view('admin.pages.edit', compact('enrollment'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_join' => 'required|date',
            'door_no' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'street_nagar' => 'required|string|max:255',
            'pin' => 'required|string|max:10',
            'village' => 'required|string|max:255',
            'post_office' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'diocese' => 'required|string|max:255',
            'mobile_no' => 'required|string|min:10|max:10',
            'whatsapp_no' => 'required|string|min:10|max:10',
            'email' => 'required|email',
            'any_other_intention' => 'nullable|string',
            'signature' => 'required|string',
        ]);

        $enrollment = Enrollment::findOrFail($id);

        $familyDetails = [];
        if ($request->has('dynamic_name')) {
            foreach ($request->input('dynamic_name') as $index => $name) {
                $familyDetails[] = [
                    'name' => $name,
                    'relation' => $request->input('dynamic_relation')[$index] ?? '',
                    'dob_day' => $request->input('dynamic_dob_day')[$index] ?? '',
                    'dob_month' => $request->input('dynamic_dob_month')[$index] ?? '',
                    'dob_year' => $request->input('dynamic_dob_year')[$index] ?? '',
                    'dom_day' => $request->input('dynamic_dom_day')[$index] ?? '',
                    'dom_month' => $request->input('dynamic_dom_month')[$index] ?? '',
                    'dom_year' => $request->input('dynamic_dom_year')[$index] ?? '',
                    'mobile' => $request->input('dynamic_mobile')[$index] ?? '',
                ];
            }
        }

        $deathAnniversaries = [];
        if ($request->has('death_name')) {
            foreach ($request->input('death_name') as $index => $name) {
                $deathAnniversaries[] = [
                    'name' => $name,
                    'relation' => $request->input('death_relation')[$index] ?? '',
                    'day' => $request->input('death_day')[$index] ?? '',
                    'month' => $request->input('death_month')[$index] ?? '',
                ];
            }
        }

        $enrollment->update([
            'name' => $request->input('name'),
            'date_of_join' => $request->input('date_of_join'),
            'door_no' => $request->input('door_no'),
            'district' => $request->input('district'),
            'street_nagar' => $request->input('street_nagar'),
            'pin' => $request->input('pin'),
            'village' => $request->input('village'),
            'post_office' => $request->input('post_office'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'diocese' => $request->input('diocese'),
            'mobile_no' => $request->input('mobile_no'),
            'whatsapp_no' => $request->input('whatsapp_no'),
            'email' => $request->input('email'),
            'any_other_intention' => $request->input('any_other_intention'),
            'signature' => $request->input('signature'),
            'family_details' => $familyDetails,
            'death_anniversary' => $deathAnniversaries,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Enrollment updated successfully.');
    }

    public function showList(Request $request)
    {
        $query = Enrollment::query();
    
        if ($request->filled('year')) {
            $query->whereYear('date_of_join', $request->year);
        }
    
        if ($request->filled('month')) {
            $query->whereMonth('date_of_join', $request->month);
        }
    
        if ($request->filled('start_day')) {
            $query->whereDay('date_of_join', '>=', (int) $request->start_day);
        }
    
        $enrollments = $query->get();
    
        return view('admin.pages.index', compact('enrollments'));
    }
    

    public function viewDatabyId($id)
    {
        $enrollment = Enrollment::find($id);
        if (!$enrollment) {
            return redirect()->back()->with('error', 'Enrollment not found.');
        }
        $enrollment->family_details = is_string($enrollment->family_details)
            ? json_decode($enrollment->family_details, true)
            : $enrollment->family_details;

        $enrollment->death_anniversary = is_string($enrollment->death_anniversary)
            ? json_decode($enrollment->death_anniversary, true)
            : $enrollment->death_anniversary;

        return view('admin.pages.view', compact('enrollment'));
    }

    public function delete($id)
    {
        $item = Enrollment::find($id);

        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'Enrollment data deleted successfully.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }
}
