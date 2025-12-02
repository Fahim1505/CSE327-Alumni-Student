<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
  public function index()
  {
    //

    $posts = Student::orderBy("id", "desc")->get();
    return view("students.index")->with("posts", $posts);
  }

  public function create()
  {
    
  }

  public function store(Request $request)
  {
    
  }

  public function show($id)
  {
  
  }
  /**
   * This function allows a registered student to edit their profile
   */
  public function edit($id)
  {
    $admin = Auth::guard("admin")->user();
    //
    $students = Student::find($id);
    return view("students.edit")
      ->with("students", $students)
      ->with("admin", $admin);
  }
  /**
   * This function updates the profile of the student once they have edited their profile
   */

  public function update(Request $request, $id)
  {
    
    $this->validate($request, [
      "name" => "required",
      "admission_year" => "required",
      "current_semester" => "required",
      "division" => "required",
      "student_id" => "required",

    ]);
    if ($request->hasFile("cover_image")) {
      $filenameWithExt = $request->file("cover_image")->getClientOriginalName();
    
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      
      $extension = $request->file("cover_image")->getClientOriginalExtension();
     
      $fileNameToStore = $filename . "_" . time() . "." . $extension;
     
      $path = $request
        ->file("cover_image")
        ->storeAs("public/cover_images", $fileNameToStore);
    } else {
      $fileNameToStore = "noimage.jpg";
    }
    $student = Student::find($id);
    $student->name = $request->input("name");
    $student->admission_year = $request->input("admission_year");
    $student->current_semester = $request->input("current_semester");
    $student->division = $request->input("division");
    $student->student_id = $request->input("student_id");

    //        $student->Password=Hash::make('default');
    $student->Email = $request->input("email");
    $student->save();
    return redirect("/Students")->with("success", "Account updated");
  }
  public function destroy($id)
  {
    //
    $student = Student::find($id);
    if ($student->image != "noimage.jpg") {
      Storage::delete("public/cover_images/" . $student->image);
    }
    $student->delete();
    return redirect("/Students")->with("success", "Student removed");
  }
  public function block($id)
  {
    $student = Student::find($id);
    $student->isBlocked = true;
    $student->save();
    return redirect("/Students")->with("success", "Student blocked");
  }
  public function unblock($id)
  {
    $student = Student::find($id);
    $student->isBlocked = false;
    $student->save();
    return redirect("/Students")->with("success", "Student blocked");
  }
  public function editview($id)
  {
    $student = Student::find($id);
    return view("students.profile")->with("students", $student);
  }
  public function updateprofile(Request $request, $id)
  {
    //
    $this->validate($request, [
      "name" => "required",
      "admission_year" => "required",
      "current-semester" => "required",
      "division" => "required",
      "student_id" => "required",

    ]);
    if ($request->hasFile("cover_image")) {
      $filenameWithExt = $request->file("cover_image")->getClientOriginalName();
    
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      $extension = $request->file("cover_image")->getClientOriginalExtension();

      $fileNameToStore = $filename . "_" . time() . "." . $extension;

      $path = $request
        ->file("cover_image")
        ->storeAs("public/cover_images", $fileNameToStore);
    } else {
      $fileNameToStore = "noimage.jpg";
    }
    $student = Student::find($id);
    $student->name = $request->input("name");
    $student->admission_year = $request->input("admission_year");
    $student->current_semester = $request->input("current_semester");
    $student->division = $request->input("division");
    $student->student_id= $request->input("student_id");
    $student->save();
    return redirect("/student-dashboard")->with("success", "Account updated");
  }
  public function all_alumni()
  {
    $alumni = Alumni::orderBy("id", "desc")->get();

    return view("dashboards.students.alumni-list")->with("alumnis", $alumni);
  }
  public function storeDonation(Request $request, $student_id)
  {
    $validated = $request->validate([
        'donation_type' => 'required|string',
        'description'   => 'nullable|string',
        'amount'        => 'nullable|numeric',
        'image'         => 'nullable|image|max:2048'
    ]);

    // If image uploaded
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('donations', 'public');
  

    StudentDonation::create([
        'student_id'    => $student_id,
        'donation_type' => $validated['donation_type'],
        'description'   => $validated['description'] ?? null,
        'amount'        => $validated['amount'] ?? null,
        'image'         => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Donation submitted successfully.');
}
}
}
