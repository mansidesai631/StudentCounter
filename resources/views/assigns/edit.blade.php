<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Assign</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Assign</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('assigns.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-danger">
<p>{{ $message }}</p>
</div>
@endif
<form action="{{ route('assigns.update',$assign->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Teacher:</strong>
<select name="teacher_id" class="select2 form-control">
@foreach($getTeacher as $teacher)
<option value="{{$teacher->id}}" {{($assign->teacher_id == $teacher->id)? "selected" : ""}}>{{$teacher->name}}</option>
@endforeach
</select>
@error('teacher_id')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Subject:</strong>
<select name="subject_id" class="select2 form-control">
@foreach($getSubject as $subject)
<option value="{{$subject->id}}" {{($assign->subject_id == $subject->id)? "selected" : ""}}>{{$subject->name}}</option>
@endforeach
</select>
@error('subject_id')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student:</strong>
<?php
$student_array = $assign->students->pluck('id')->toArray();
?>
<select name="students[]" multiple class="select2 form-control">
@foreach($getStudent as $student)
<option value="{{$student->id}}" @if(in_array($student->id, $student_array)) selected @endif>{{$student->name}}</option>
@endforeach
</select>
@error('students')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<select name="status">
<option value="1" @if($teacher->status == "1") selected @endif >Active</option>
<option value="0" @if($teacher->status == "0") selected @endif >Inactive</option>
</select>
@error('status')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$('.select2').select2();
</script>
</body>
</html>