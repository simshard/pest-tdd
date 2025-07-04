<div class="container text-black bg-white">
    <nav>
        <div class="flex items-center space-x-6">
            @guest()
                 <a class="text-base font-medium text-white hover:text-gray-300" href="{{ route('login') }}">Login</a>
            @else
                 <a href="{{ route('pages.dashboard') }}"
                    class="inline-flex items-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-base font-medium text-white hover:bg-gray-700">Dashboard</a>
            @endguest
            </div>
        </nav> 

    <div>
 
    </div>
<h1>Pest TDD</h1>

<h2> Courses </h2>
@foreach ($courses as $course)

<h2>{{ $course->title }}</h2>
<p>{{ $course->description }}</p>
    
@endforeach
</div>