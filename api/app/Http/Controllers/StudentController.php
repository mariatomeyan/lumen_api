<?php

namespace App\Http\Controllers;

use App\Contracts\ExchangeRateInterface;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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

    public function test(ExchangeRateInterface $service){
        return "hello";
    }

    public function create(Request $request)
    {
        //todo // integrate here Rule seperate for the request with its defined Privacy
        $this->validate($request, [

            'Country' => 'required|alpha',
            'IdentificationNo' => 'required',
            'DateOfBirth' => 'required',
            'RegisteredOn' => 'required',
            'UserId' => 'required|unique:users,user_id',
        ]);

        //todo create Resource response repository
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
