@extends('../main')
@section('content')
<h3>Our magazines</h3>
@foreach($magazines as $magazine)

<div class="row">
	<div class="col">
		<ul>
			<li>Name : {{ $magazine->name }}  </li>
			<li>Price : {{ $magazine->price }}  </li>
			<li>Cover : {{ $magazine->cover }}  </li>
			<li>Colour : {{ $magazine->colour }}  </li>
			<li>Size : {{ $magazine->size }}  </li>
			<li>Theme : {{ $magazine->theme }}  </li>
				<form action="{{route('magazine.destroy',$magazine->id)}}" method="POST" >
					@method('DELETE')
					@csrf
					
					<input type="submit" value="Delete">
				</form>
		</ul>
	</div>
</div>
@endforeach
<div class="row">
	<div class="col">
		<form action="{{url('/add-magazine')}}" method="POST">
			@csrf
			<input type="text" name="name"  placeholder="Name" required>
			<input type="text" name="price" placeholder="Price" required>
			<input type="url" name="cover" placeholder="Cover URL" required>
			<input type="text" name="colour" placeholder="Colour" required>
			<input type="text" name="size" placeholder="Size (eg: 24x32)" required>
			<input type="text" name="theme" placeholder="Theme" required>
			<input type="submit" name="submit" id="submit-magazine" value="Add a magazine">
		</form>
	</div>
</div>
@endsection