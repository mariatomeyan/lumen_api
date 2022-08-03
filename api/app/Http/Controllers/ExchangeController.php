<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function showAllStudents()
    {
        return response()->json(Student::all());
    }

    public function showOneStudent($id)
    {
        return response()->json(Student::with('user')->find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'Country' => 'required|alpha',
            'IdentificationNo' => 'required',
            'DateOfBirth' => 'required',
            'RegisteredOn' => 'required',
            'UserId' => 'required|unique:users,user_id',

        ]);

        $author = Student::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Student::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
