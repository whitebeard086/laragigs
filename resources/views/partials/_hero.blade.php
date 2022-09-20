
<section
class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
    <div
        class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('images/laravel-logo.png')"
    ></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Lara<span class="text-black">Gigs</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Find or post Laravel jobs & projects
        </p>
        @auth
            <div>
                <a
                    href="/listings/create"
                    class="inline-block border-2 border-white text-xl text-bold text-white py-4 px-6 rounded-xl capitalize mt-2 hover:text-white hover:border-white hover:bg-black"
                    >Post a Gig And Hire The Best Developers today</a
                >
            </div>
        @else
            <div>
                <a
                    href="/register"
                    class="inline-block border-2 border-white text-xl text-bold text-white py-4 px-6 rounded-xl capitalize mt-2 hover:text-white hover:border-white hover:bg-black"
                    >Sign Up to List a Gig</a
                >
            </div>
        @endauth
    </div>
</section>