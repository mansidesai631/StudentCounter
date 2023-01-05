<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Subject</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('subjects.create') }}"> Create Subject</a>
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
<th>Subject Name</th>
<th width="280px">Action</th>
</tr>
@foreach ($subjects as $subject)
<tr>
<td>{{ $subject->id }}</td>
<td>{{ $subject->name }}</td>
<td>
<form action="{{ route('subjects.destroy',$subject->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $subjects->links() !!}
</body>
</html>