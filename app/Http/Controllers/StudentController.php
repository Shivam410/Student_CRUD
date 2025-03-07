<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $sortField = $request->input('sort_field', 'id'); // Default sorting by ID
        $sortOrder = $request->input('sort_order', 'desc'); // Default order descending

        $students = Student::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('roll_no', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%");

            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(5) // Paginate with 15 records per page
            ->appends(request()->query()); // Maintain query parameters during pagination

        return view('StudentTable', compact('students', 'sortField', 'sortOrder'));
    }


    public function create(){
        return view('AddStudent');
    }
    public function addStudent(Request $request){
        $request->validate([
            'roll_no' => [
                'required',
                Rule::unique('students')->where(function ($query) use ($request) {
                    return $query->where('class', $request->class);
                }),
            ],
            'name'     => 'required|string|max:255',
            'school'   => 'required|string|max:255',
            'address'  => 'required|string|max:500',

            'class'    => 'required|string|max:50',
            'dob'      => 'required|date|before:today',
            'gender'   => 'required|in:male,female,other',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);



        $student = new Student();
        $student->roll_no = $request->roll_no;
        $student->name = $request->name;
        $student->school = $request->school;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->dob = $request->dob;
        $student->gender = $request->gender;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Student_images'), $imageName);
            $student->image = $imageName;
        }


        $student->save();
        if ($student) {
            return redirect('/')->with('success', 'Student has been added successfully!');
        } else {
            return redirect('/addview')->with('fail', 'Operation failed. Please try again.');
        }

    }
    public function editStudent(Request $request,$id){
        $student = Student::find($id);
        return view('UpdateStudent',compact('student'));

    }
    public function updateStudent(Request $request,$id){
        $student =Student::find($id);

        $request->validate([
            'roll_no' => [
            'required',
            Rule::unique('students')->where(function ($query) use ($request, $student) {
                return $query->where('class', $request->class)->where('id', '!=', $student->id);
            }),
        ],
        'email' => [
            'required',
            Rule::unique('students')->ignore($student->id),
        ],
        'phone' => [
            'required',
            Rule::unique('students')->ignore($student->id),
        ],
            'name'     => 'required|string|max:255',
            'school'   => 'required|string|max:255',
            'address'  => 'required|string|max:500',
            'class'    => 'required|string|max:50',
            'dob'      => 'required|date|before:today',
            'gender'   => 'required|in:male,female,other',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);




        $student->roll_no = $request->roll_no;
        $student->name = $request->name;
        $student->school = $request->school;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->class = $request->class;
        $student->dob = $request->dob;
        $student->gender = $request->gender;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Student_images'), $imageName);
            $student->image = $imageName;
        }


        $student->save();
        if ($student) {
            return redirect('/')->with('success', 'Student has been added successfully!');
        } else {
            return redirect('/addview')->with('fail', 'Operation failed. Please try again.');
        }


    }

    public function ViewStudent($id){
        $student = Student::find($id);
        return view('ViewStudent',compact('student'));
      }
    public function deleteStudent($id){
        $student = Student::findOrFail($id);


        if ($student->image) {
            $imagePath = public_path('Student_images/' . $student->image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $student->delete();
            if($student){
            return redirect('/')->with('success','Student has been deleted');
            }
            else{
                return redirect('/addview')->with('fail','Opration failed');
            }

    }
}
