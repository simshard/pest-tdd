<div class="container text-black bg-white">
    <nav>
        <div class="flex items-center space-x-6">
            @guest()
                 <a class="text-base font-medium text-white hover:text-gray-300" href="{{ route('login') }}">you need to Login</a>
            @else
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-base font-medium text-white hover:text-gray-300" type="submit">Logout</button>  
            </form>
            <p><a href="{{ route('pages.dashboard') }}"> Dashboard  </a></p>

            @endguest
            </div>
        </nav> 



         {{-- <!-- Available Courses -->
        <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
            <div class="relative">
                <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Pick one of our exclusive premium courses</h2>
                    <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">All of our courses will teach you one
                        specific aspect of programming. Go step by step and never stop learning.</p>
                </div>
                <div
                    class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">
                     @foreach($courses as $course)
                        @include('partials.home-course-item')
                    @endforeach  
                   

                </div>
            </div>
        </div> --}}
        <!-- Available Courses -->

 
<h1>Pest TDD</h1>

<h2> Courses </h2>
@foreach ($courses as $course)

<h2>{{ $course->title }}</h2>
<p>{{ $course->description }}</p>
    
@endforeach
</div>