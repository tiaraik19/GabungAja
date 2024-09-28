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

    <div class="min-h-screen bg-customBg flex flex-col gap-14">

        {{-- Navbar Component --}}
                {{-- Navbar --}}
                <div class="px-3 bg-customGreen">
                    <div class="navbar">
                        <a href="/"><img src="{{ asset('assets/grey.png') }}" class="w-20 h-20" alt="logo"></a>
                        <div class="flex justify-end flex-1 px-2">
                            <div class="flex items-stretch gap-5">
                                
                                <a class="btn btn-ghost rounded-btn text-white text-3xl"><i class="fa fa-commenting"></i></a>
                                
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">
                                        @if (Auth::user()->profilePicture)
                                            <div class="avatar">
                                                <div class="w-10 h-10 rounded-full bg-white">
                                                    <img src="{{ asset('storage/profile/' . Auth::user()->profilePicture) }}">
                                                </div>
                                            </div>
                                        @else
                                            <i class="fa fa-user-circle text-4xl text-white"></i>
                                        @endif
        
                                    </div>
                                    <ul tabindex="0"
                                        class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                                        <li><a href="/profile/{{ Auth::user()->id }}"
                                                class="text-end hover:bg-gray-600 hover:text-white">My Profile<i
                                                    class="fa fa-user"></i></a>
                                        </li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <li><button type="submit"
                                                    class="text-end hover:bg-red-400 hover:text-white">Logout<i
                                                        class="fa fa-arrow-left"></i></button>
                                            </li>
                                        </form>
        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-between px-[3rem] text-lg breadcrumbs mt-[3rem]">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/" class="font-semibold">Community Chat</a></li>
                    </ul>
                </div>
        

                <div class="flex justify-center">
                    <div class="w-[40rem] min-h-[40rem] bg-white p-[2rem]">
                        <p class="text-center text-3xl font-semibold pb-[2rem]">Community Chat List</p>

                        @if ($communities->count() > 0)
                    @foreach ($communities as $community)

                    <div class="flex py-[1.5rem] hover:bg-customGreen p-[1rem] hover:text-white">
                        <a class="w-full flex justify-between items-center" href="/communities/{{ $community->id }}/chats">
                            <div class="flex gap-[1rem] items-center">
                                <img class="w-[4rem] h-[4rem] object-fill" src="{{ asset('storage/logo/' . $community->logo) }}" alt="Shoes" />
                                <p class="text-xl">{{ucwords($community->name)}}</p>
                            </div>
                            
                            <p class="text-3xl"><i class="fa fa-commenting"></i></p>
                        </a>
                    </div>
                    
                    @endforeach

                    @else

                    <p class="text-lg pt-[2rem]">You haven't joined any community yet! <a href="/home" class="text-customGreen font-semibold underline">Join Here!</a></p>
                    @endif
                    </div>
                </div>


    




        {{-- Footer Component --}}
        <div class="mt-[20rem]">
            @include('components.footer')
        </div>


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>
