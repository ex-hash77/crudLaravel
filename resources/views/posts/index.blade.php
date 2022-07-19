<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<meta name="csrf-token" content=" {{csrf_token()}} ">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<title>BELAJAR LARAVEL</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif

				@if (session('gagal'))
				<div class="alert alert-danger">
					{{ session('gagal') }}
				</div>
				@endif

				<div class="card border-0 shadow rounded">
					<div class="card-body">
						<a href=" {{ route('post.create')}}" class="btn btn-primary btn-md mb-3">Tambah Baru</a>

						<table class="table table-bordered mt1">
							<thead>
								<tr class="text-center">
									<th scope="col">title</th>
									<th scope="col">status</th>
									<th scope="col">Create ata</th>
									<th scope="col">action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($posts as $post)

								<tr>
									<td>
										{{ $post->title }}
									</td>
									<td>
										{{ $post->status == 0 ? 'Draft':'Publish' }}
									</td>
									<td>
										{{ $post->created_at->format('d-m-y') }}
									</td>
									<td class="text-center">
										<form onsubmit="return confirm('apakah anda yakin')" action="{{route('post.destroy', $post->id)}}" method="POST">
											<a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit</a>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger">Hapus</button>
										</form>
									</td>
								</tr>
								<tr>
									@empty
								</tr>
									<tr>
										<td class="text-center text-mute" colspan="4">DATA POST TIDAK TERSEDIA</td>
									</tr>
									@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</html>