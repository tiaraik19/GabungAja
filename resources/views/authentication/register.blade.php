<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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

    <div class="bg-customBg flex flex-col gap-20">

        {{-- Navbar Component --}}
        @include('components.navbar')

        {{-- Register Form --}}
        <div class="flex justify-center">
            <div class="card w-104 bg-base-100 shadow-xl p-10">

                <p class="text-3xl text-center mb-6 font-semibold">Register your account here!</p>

                @include('components.alert')

                <form action="/register" method="POST">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Full Name
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your full name" name="fullName" value="{{old('fullName')}}">
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
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your username" name="username" value="{{old('username')}}">
                            @error('username')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Email
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="email" placeholder="Enter your email" name="email" value="{{old('email')}}">
                            @error('email')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-3">
                                Phone Number
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your phone number" name="phoneNumber" value="{{old('phoneNumber')}}">
                            @error('phoneNumber')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Password
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="password" placeholder="Enter you password" name="password">
                            @error('password')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Confirm Password
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="password" placeholder="Confirm your password" name="confirmPassword">
                            @error('confirmPassword')
                                <div class="text-xs text-red-500 p-1 font-semibold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-6">
                            <button
                                class="bg-customGreen border rounded h-10 hover:brightness-95 text-white">Register</button>

                            <p class="text-xs text-center">Already have an account? Login <a href="/login"
                                    class="hover:underline text-customGreen font-semibold">Here</a></p>
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

</html>
