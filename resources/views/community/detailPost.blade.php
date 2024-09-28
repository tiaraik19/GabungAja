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

    <div class="min-h-screen bg-customBg flex flex-col">

        {{-- Navbar Component --}}
        @include('components.navbarMember')


        <div class="flex">
            <!-- Sidebar -->
            <div class="bg-customLightGreen text-black w-64 flex-shrink-0 h-[50rem]">
                <div class="p-5">

                    <div class="avatar w-full flex flex-col items-center gap-5 pt-6">
                        <div class="w-40 h-40 rounded-full">
                            <img src="{{ asset('storage/images/' . $community->logo) }}" />
                        </div>

                        <h1 class="text-lg font-bold">{{ucwords($community->name)}}</h1>
                
                    </div>

                </div>
            </div>

            <div class="flex-1">
                <div class="w-full flex justify-between px-[3rem] text-lg breadcrumbs mt-[3rem]">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/community/{{ $community->id }}">{{ucwords($community->name)}}</a></li>
                        <li><a href="" class="font-semibold">Post Details</a></li>
                    </ul>

                    
                </div>

                <div class="w-full flex flex-col items-start gap-[2rem] p-[4rem]">
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('storage/images/' . $post->image) }}" class="w-[35rem] h-[25rem]"/>
                    </div>
                    
                    <p class="w-full text-3xl text-center">{{$post->title}}</p>
                    <p class="text-lg">{{$post->content}}</p>
                </div>
            </div>


        </div>


        {{-- Footer Component --}}
        @include('components.specialFooter')
        
        


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>

