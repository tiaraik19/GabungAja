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
        @include('components.navbar')

        <div class="w-full flex justify-center">
            @include('components.alert')
        </div>


        {{-- Register Form --}}
        <form action="/login" method="POST">
            @csrf
            <div class="flex justify-center">
                <div class="card w-104 bg-base-100 shadow-xl p-10">

                    <div class="flex justify-center">
                        <img src="{{ asset('assets/grey.png') }}" class="w-32 h-32" alt="logo">
                    </div>


                    <div class="flex flex-col">
                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Email
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" placeholder="Enter your email" name="email">
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 text-sm font-medium mb-2">
                                Password
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="password" placeholder="Enter you password" name="password">
                            <p class="text-xs text-customGreen font-semibold cursor-pointer text-end mt-2"> <a href="/resetPass">Forgot
                                Password?</a>
                            </p>
                        </div>

                        <div class="flex flex-col gap-6">
                            <button
                                class="bg-customGreen border rounded h-10 hover:brightness-95 text-white">Login</button>

                            <p class="text-xs text-center">Don't have an account? Register <a href="/register"
                                    class="hover:underline text-customGreen font-semibold">Here</a></p>
                        </div>


                    </div>
                </div>
            </div>
        </form>


        {{-- Footer Component --}}
        @include('components.footer')


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>
