  <div> 
  <h2> {{ $course->tagline }}
  </h2>                    
      <p >{{ $course->title }} </p>
        <p >{{ $course->description }}</p>
        <p>{{ $course->videos->count()}} videos</p>
        <p ><a href="{{ route('pages.course-video', $course) }}">Watch Video</a></p>
        
  <h3>Learnings</h3>
    <ul>
        @foreach($course->learnings as $learning)
         <li>{{ $learning }}</li>
         @endforeach
      </ul>
    <img  src="{{ asset("images/$course->image_name") }}">
    </div>