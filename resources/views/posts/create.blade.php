<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<title>Tambah Data Di larael</title>
</head>
<body>
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-md-12">
				@if (session('success'))
				<div class="alert alert-success">
					{{session('success')}}
				</div>
				@endif

				@if (session('error'))
				<div class="alert alert-danger">
					{{session('error')}}
				</div>
				@endif

				<div class="card border-0 shadow rounded">
					<div class="card-body">
						<form action="{{route('post.store')}}" method="POST">
							@csrf

							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>

								@error('title')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>

							<div class="form-group">
								<label>status</label>
								<select name="status" class="form-control">
									<option value="1" selected>Publish</option>
									<option value="0"> Draft</option>
								</select>
							</div>

							<div class="form-group">
								<label>Content</label>
								<textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>
									{{ old('content') }}
								</textarea>
								@error('content')
								<div class="alert alert-danger">
									{{ $message }}
								</div>
								@enderror
							</div>

							<button type="submit" class="btn btn-primary">Save</button>
							<a href="{{route('post.index')}}" class="btn btn-warning">BACK</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>