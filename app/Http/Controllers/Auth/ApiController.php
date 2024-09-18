<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;

class ApiController extends Controller
{

    public function showList()
    {
        $enrollment = Enrollment::all();

        if ($enrollment->count() < 1) {
            return response()->json([
                'message' => 'No enrollment data found.'
            ], 404);
        }

        return response()->json([
            'count' => $enrollment->count(),
            'enrollment' => $enrollment
        ], 200);
    }

    public function listDatabyId($id)
    {
        $enrollment = Enrollment::where('id', $id)->first();

        if (!$enrollment) {
            return response()->json([
                'message' => 'Enrollment not found.'
            ], 404);
        }

        return response()->json([
            'count' => Enrollment::where('id', $id)->count(),
            'enrollment' => $enrollment
        ], 200);
    }
}

