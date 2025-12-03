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
  public function edit($id)
  {
    $admin = Auth::guard("admin")->user();
    //
    $students = Student::find($id);
    return view("students.edit")
      ->with("students", $students)
      ->with("admin", $admin);
  }

  public function update(Request $request, $id)
  {
    
    $this->validate($request, [
      "fname" => "required",
      "mname" => "required",
      "sname" => "required",
      "phone" => "required",
      "email" => "required|string|email|max:255",

      "dob" => "required",
      "year" => "required",
      "county" => "required",
      "register_stuid" => "required",
      "register_gender" => "required",
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
    $student->First_name = $request->input("fname");
    $student->Middle_name = $request->input("mname");
    $student->Surname = $request->input("sname");
    $student->RegNo = $request->input("register_stuid");
    $student->Phone = $request->input("phone");
    $student->DOB = $request->input("dob");
    $student->Year_joined = $request->input("year");
    $student->County = $request->input("county");
    $student->Avatar = $fileNameToStore;
    //        $student->Password=Hash::make('default');
    $student->Email = $request->input("email");
    $student->gender = $request->input("register_gender");
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
      "fname" => "required",
      "mname" => "required",
      "sname" => "required",
      "phone" => "required",
      "email" => "required|string|email|max:255",

      "dob" => "required",
      "year" => "required",
      "county" => "required",
      "register_stuid" => "required",
      "register_gender" => "required",
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
    $student->First_name = $request->input("fname");
    $student->Middle_name = $request->input("mname");
    $student->Surname = $request->input("sname");
    $student->RegNo = $request->input("register_stuid");
    $student->Phone = $request->input("phone");
    $student->DOB = $request->input("dob");
    $student->Year_joined = $request->input("year");
    $student->County = $request->input("county");
    $student->Avatar = $fileNameToStore;
    $student->Password = Hash::make("default");
    $student->Email = $request->input("email");
    $student->gender = $request->input("register_gender");
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
    }

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

