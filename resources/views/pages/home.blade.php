<div class="container text-black bg-white">
<h1>OOOOOOOOO!</h1>

<h2> Courses </h2>
@foreach ($courses as $course)

<h2>{{ $course->title }}</h2>
<p>{{ $course->description }}</p>
    
@endforeach
</div>