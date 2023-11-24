@extends('layout/admin-layout')

@section('space-work')

@endsection


    /ami ekhane code gulo diye rakhchi exam dashboard load er/
    //exam dashboard load
    public function examDashboard()
    {
        $subjects = Subject::all();
        return view('admin.exam-dashboard',['subjects'=>$subjects]);
        
    }