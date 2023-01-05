<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Subject Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Subject</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student Name:</strong>
<input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Student name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Student Email" value="{{ $student->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Subjects:</strong>
<?php
$subject_array = [];
$subject_array = $student->subjects->pluck('id')->toArray();
?>
<select name="subjects[]" multiple class="select2 form-control">
    @foreach($getSubject as $subject)
    <option value="{{$subject->id}}" @if(in_array($subject->id, $subject_array)) selected @endif>{{$subject->name}}</option>
    @endforeach
</select>
@error('subjects')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<select name="status">
<option value="1" @if($student->status == "1") selected @endif >Active</option>
<option value="0" @if($student->status == "0") selected @endif >Inactive</option>
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