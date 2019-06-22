<?php

namespace App\Http\Controllers;

use App\Fees;
use App\Student;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function newFeePayment(){
        $this->validate(request(), [
            'student_number'=>'required',
            'dop'=>'required',
            'amount'=>'required'
        ]);

        $student = Student::where('student_number', request('student_number'))->firstOrFail();

        $fees = new Fees;
        $fees->student_number = request('student_number');
        $fees->dop = request('dop');
        $fees->amount = request('amount');
        $fees->student_id = $student->id;
        $fees->save();

        return view('101536.fees');
    }


}
