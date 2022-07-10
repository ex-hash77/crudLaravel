<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container mt-5">
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
						<form action="{{route('post.update',$post->id)}}" method="POST">
							
							@csrf
							@method('PUT')

							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value=" {{old('title', $post->title)}} " required>

								@error('title')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							</div>

							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control" required>
									<option value="1" {{$post->status == 1 ? 'selected':''}} > Publish</option>
									<option value="0" {{$post->status == 0 ? 'selected':''}} > Draft</option>
								</select>
							</div>
							<div class="form-group">
								<label>content</label>
								<textarea
                                    class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                    rows="5" required>{{ old('content', $post->content) }}</textarea>
								@error('content')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror

								<button type="submit" class="btn btn-md btn-primary">Update</button>
								<a href="{{route('post.index')}}" class="btn btn-warning"> back</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>