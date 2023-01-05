<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Assign Student to Teacher</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Assign Student to Teacher</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('assigns.create') }}">Assign</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Teacher Name</th>
<th>Subject Name</th>
<th width="280px">Action</th>
</tr>
@foreach ($assigns as $assign)
<tr>
<td>{{ $assign->id }}</td>
<td>{{isset($assign->teacher_id) ? App\Models\Teacher::getTeacherNameById($assign->teacher_id) : '-'}}</td>
<td>{{isset($assign->subject_id) ? App\Models\Subject::getSubjectNameById($assign->subject_id) : '-'}}</td>
<td>
<form action="{{ route('assigns.destroy',$assign->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('assigns.edit',$assign->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $assigns->links() !!}
</body>
</html>