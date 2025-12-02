<?php

namespace App\Http\Controllers;

use App\Event;
use App\Internship;
use App\Job;
use App\Notice;
use App\Student;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  //
  public function index()
  {
    $events = Event::orderBy("id", "desc")->take(3)->get();
    return view("pages.index")->with("events", $events);
  }
  public function studentdash()
  {
    $user = Auth::guard("student")->user();
    return view("student-dashboard")->with("user", $user);
  }

