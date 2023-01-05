<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Teacher</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Teacher</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('teachers.create') }}"> Create Teacher</a>
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
<th>Teacher Email</th>
<th width="280px">Action</th>
</tr>
@foreach ($teachers as $teacher)
<tr>
<td>{{ $teacher->id }}</td>
<td>{{ $teacher->name }}</td>
<td>{{ $teacher->email }}</td>
<td>
<form action="{{ route('teachers.destroy',$teacher->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $teachers->links() !!}
</body>
</html>