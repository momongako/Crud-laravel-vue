<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    public function all_teacher(Request $request)
    {
        $pageSize = $request->page_size ?? 10;
        $teacher = Teacher::paginate($pageSize);
        return response()->json($teacher);
    }
}