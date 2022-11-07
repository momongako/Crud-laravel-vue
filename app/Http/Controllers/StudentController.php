<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    protected $item;
    public function __construct(Student $item)
    {
        $this->item = $item;
    }
    public function save_student()
    {
        $student = new Student;
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->save();
        return 'ok';
    }

    public function all_students_pagination_library(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $students = Student::paginate($pageSize);
        return response()->json($students);
    }


    public function all_students(Request $request)
    {

        $items = $this->item->getList($request->all())->paginate();

        $response = [

            'pagination' => [
                'total' => $items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ],
            'data' => $items
        ];
        return response()->json($response);
    }



    public function edit_student($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }
    public function update_student()
    {
        $student = Student::find(request()->id);
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->update();
    }
    public function delete_student($id)
    {
        $student = Student::find($id)->delete();
    }

    public function search_student($name)
    {
        return Student::where("name", $name)->get();
    }
}