@if(session()->has('success'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-48 py-3 mt-6">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif