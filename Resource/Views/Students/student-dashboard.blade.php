@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="side-nav" style="height: 100vh !important;" class="col-lg-2">
                <div id="side-nav-overlay">
                    @include('inc.student-sidenav')
                </div>
            </div>

            <div class="col-lg-10">

                <div class="row">
                    <div class="col-lg-12">

                        <h4 class="text-center">Welcome {{ $user->name }}</h4>
                        <hr>

                        @if($user->isBlocked)
                            <div class="alert alert-danger" role="alert">
                                You have been blocked by the admin. Some features may not be accessible.
                                Please contact the administration for assistance.
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-8">
                                <h4>Profile</h4>

                                <table class="table table-condensed">
                                    <tbody>

                                    <tr>
                                        <td><b>Student ID</b></td>
                                        <td>{{ $user->student_id }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Admission Year</b></td>
                                        <td>{{ $user->admission_year }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Current Semester</b></td>
                                        <td>{{ $user->current_semester }}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Division</b></td>
                                        <td>{{ $user->division }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-4">
                                <br><br>
                                <center>
                                    <img style="border-radius: 50%; width: 150px; height: 150px"
                                         src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=150"
                                         alt="Profile Avatar">
                                </center>
                                <br>
                                <a href="/student-dashboard/{{ $user->id }}/edit">
                                    Edit your profile details
                                </a>
                            </div>

                        </div>

                        <hr>
                        <h4>Make a Donation</h4>

                        <form action="/student-dashboard/{{ $user->id }}/donate" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Donation Type</label>
                                <select class="form-control" name="donation_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Money">Money</option>
                                    <option value="Food">Food</option>
                                    <option value="Cloth">Cloth</option>
                                    <option value="Books">Books</option>
                                    <option value="Equipment">Equipment</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Upload Image (optional)</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label>Amount (if Money)</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter amount">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Donation</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
