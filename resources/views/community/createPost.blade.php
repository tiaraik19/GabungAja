<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Website Icon --}}
    <link rel="icon" href="{{ asset('assets/grey.png') }}">
    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
    {{-- Daisy UI CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="min-h-screen bg-customBg flex flex-col gap-20">

        {{-- Navbar Component --}}
        @include('components.navbarMember')


        {{-- Register Form --}}
        <div class="flex justify-center">
            <div class="card w-104 bg-base-100 shadow-xl p-10">

                <p class="text-3xl text-center mb-6 font-semibold">Create community post here</p>

                @include('components.alert')

                <form action="/store-post/{{ $community->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Post Title
                            </label>
                            <input name="title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter community name" value="{{old('title')}}">
                            @error('title')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Post Caption
                            </label>

                            <textarea id="communityDescription" name="content"
                                class="h-[14rem] shadow appearance-none border resize-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter community description" maxlength="500"></textarea>
                            <div class="flex justify-between">
                                @error('content')
                                    <div class="text-xs text-red-500 p-1 font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div id="characterCount" class="text-xs text-end text-black p-1">0/500
                                    characters
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-3">
                                Post Image
                            </label>

                            <input name="image" type="file"
                                class="file-input border-gray-200 shadow rounded w-full h-10" />
                            @error('image')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="flex flex-col gap-6">
                            <button class="bg-customGreen border rounded h-10 hover:brightness-95 text-white">Create
                                Community</button>
                        </div>
                </form>



            </div>
        </div>
    </div>


    {{-- Footer Component --}}
    @include('components.footer')


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script>
    const textarea = document.getElementById('communityDescription');
    const characterCount = document.getElementById('characterCount');

    textarea.addEventListener('input', function() {
        const textLength = textarea.value.length;
        characterCount.textContent = `${textLength}/500 characters`;
    });
</script>

</html>
