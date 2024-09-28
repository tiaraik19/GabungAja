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
                        <li><a href="/chattingList/{{ Auth::user()->id }}">Community Chat</a></li>
                        <li><a href="/" class="font-semibold">{{ucwords($community->name)}}</a></li>
                    </ul>
                </div>

                <div class="flex justify-center">
                    <div class="w-[60rem] min-h-[40rem] bg-white p-[2rem]">
                        <div class="flex items-center gap-[1rem] pb-[1rem]">
                            <img class="w-[4rem] h-[4rem] object-fill" src="{{ asset('storage/logo/' . $community->logo) }}" />
                            <p class="text-xl">{{ucwords($community->name)}}</p>
                        </div>

                        <hr class="py-[1rem]">

                        <div class="min-h-[25rem]">
                            @foreach ($chats as $chat)
                                <div class="flex mb-4 items-start @if($chat->user->id === Auth::id()) justify-end @endif">
                                    <div class="flex items-center">
                                        @if($chat->user->id !== Auth::id())
                                            <img src="{{ asset('storage/profile/' . $chat->user->profilePicture) }}" class="w-10 h-10 rounded-3xl mr-2">
                                        @endif
                                        <div class="ml-2 text-sm text-gray-600 bg-gray-100 p-2 rounded-lg">
                                            <p class="font-bold">{{ $chat->user->username }}</p>
                                            <p class="text-sm">{{ $chat->message }}</p>

                                            <p class="text-xs pt-[.3rem]">{{ $chat->created_at->format('d/m/Y H:i') }}
                                            </p>
                                        </div>
                                        @if($chat->user->id === Auth::id())
                                            <img src="{{ asset('storage/profile/' . $chat->user->profilePicture) }}" class="w-10 h-10 rounded-3xl ml-2 order-1">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        
            
                            <form action="/communities/{{$community->id}}/chats" method="POST" class="w-full pt-[1rem]">
                                @csrf
                                <div class="w-full flex justify-between input input-bordered items-center">
                                    <input type="text" name="message" class="w-full h-full" placeholder="Enter message">
                                    <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </div>
                            </form>
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
