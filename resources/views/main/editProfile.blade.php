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

        <div class="w-full px-[3rem] text-lg breadcrumbs">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/profile/{{ $user->id }}">Profile</a></li>
                <li class="font-semibold">Update Profile</li>
            </ul>
        </div>

        {{-- Register Form --}}
        <div class="flex justify-center -mt-12">
            <div class="card w-[30rem] bg-base-100 shadow-xl p-10">

                <div class="avatar w-full flex flex-col items-center gap-5 pt-2">
                    <div class="w-40 h-40 rounded-full ">
                        <img src="{{ asset('storage/profile/' . $user->profilePicture) }}" />
                    </div>
                </div>

                <div class="mt-2">
                    @include('components.alert')
                </div>


                <form action="/update-profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="flex flex-col gap-2">
                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Full Name
                            </label>
                            <input name="fullName"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your full name"
                                value="{{ ucwords($user->fullName) }}">
                            @error('fullName')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2"">
                                Username
                            </label>
                            <input name="username"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your username" value="{{ $user->username }}">
                            @error('username')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2"">
                                Phone Number
                            </label>
                            <input name="phoneNumber"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your phone number" value="{{ $user->phoneNumber }}">
                            @error('phoneNumber')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Bio <span class="text-customBrown">*(Optional)</span>
                            </label>
                            <textarea id="bio" name="bio"
                                class="h-[14rem] shadow appearance-none border resize-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter your bio" maxlength="200">{{$user->bio}}</textarea>
                            <div class="flex justify-between">
                                @error('bio')
                                    <div class="text-xs text-red-500 p-1 font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div id="characterCount" class="text-xs text-end text-black p-1">0/200
                                    characters
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-6">
                            <button class="bg-customGreen border rounded h-10 hover:brightness-95 text-white">Edit
                                Profile</button>
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
    const textarea = document.getElementById('bio');
    const characterCount = document.getElementById('characterCount');

    textarea.addEventListener('input', function() {
        const textLength = textarea.value.length;
        characterCount.textContent = `${textLength}/200 characters`;
    });
</script>

</html>
