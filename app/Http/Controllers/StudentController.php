<?php

namespace App\Http\Controllers;

use App\Fees;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index(){
        return view('101536.newstudent');
    }

   /* public function allStudents(){
        //read all students
        $students = DB::select('select * from students');
        return view("101536.allstudents", ['students' => $students]);
    } */

    public function particularStudent(){
        //read a particular student identified by id
        $search = request('query');
        $students = Fees::with('Student')->where('student_number', $search)->get();
        //$students = DB::select('select * from students where id = ?', [$id]);
        return view("101536.particularstudent", ['students' => $students]);
    }

    public function newStudent(){
        $this->validate(request(),[
            'student_number' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            ]);

        $student= new Student;
        $student->student_number = request('student_number');
        $student->full_name = request('full_name');
        $student->address = request('address');
        $student->dob = request('dob');
        $student->save();

        return view('101536.newstudent');
    }

    public function fetchStudents(){
        $students =Student::has('Fees')->withCount([
           "fees as total_fees" => function($total){
            $total->select(DB::Raw('sum(amount)'));
           }
        ])->get();
        return view("101536.allstudents", ['students' => $students]);
    }


}
