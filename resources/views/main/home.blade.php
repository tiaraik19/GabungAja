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
        @include('components.navbarMember')

        

        <p class="text-center text-3xl font-semibold">Home Page</p>

        @include('components.alert')


        <div class="flex justify-center px-16 items-center">
            <div class="flex flex-col gap-3">
                <div class="flex gap-[2rem] items-center">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="m-1"><i class="fa fa-filter text-3xl"></i></div>
                        <ul tabindex="0" class="block dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                            <form action="/search" method="GET">
                                <form action="/search" method="GET">
                                    <li><button name="search" value="Adventure" type="submit">Adventure</button></li>
                                    <li><button name="search" value="Art and Culture" type="submit">Art and Culture</button></li>
                                    <li><button name="search" value="Celebrity" type="submit">Celebrity</button></li>
                                    <li><button name="search" value="Culinary" type="submit">Culinary</button></li>
                                    <li><button name="search" value="Entertainment" type="submit">Entertainment</button></li>
                                    <li><button name="search" value="Environment" type="submit">Environment</button></li>
                                    <li><button name="search" value="Fashion" type="submit">Fashion</button></li>
                                    <li><button name="search" value="Finance" type="submit">Finance</button></li>
                                    <li><button name="search" value="Lifestyle" type="submit">Lifestyle</button></li>
                                    <li><button name="search" value="Music" type="submit">Music</button></li>
                                    <li><button name="search" value="Political" type="submit">Political</button></li>
                                    <li><button name="search" value="Profession" type="submit">Profession</button></li>
                                    <li><button name="search" value="Religious" type="submit">Religious</button></li>
                                    <li><button name="search" value="Science" type="submit">Science</button></li>
                                    <li><button name="search" value="Social" type="submit">Social</button></li>
                                    <li><button name="search" value="Sport" type="submit">Sport</button></li>
                                    <li><button name="search" value="Technology" type="submit">Technology</button></li>
                                </form>
                                
                            </form>
                        </ul>
                      </div>

                    <form action="/search" method="GET">
                        <label class="input input-bordered flex items-center gap-2 w-[30rem]">
                            <input type="text" class="grow" placeholder="Search Anything Here" name="search">
                            <button class="kbd kbd-xl" type="submit"><i class="fa fa-search"></i></button>
                        </label>
                    </form>

                    <button type="button" onclick="resetSearch()"><i class="fa fa-times text-xl"></i></button>
                </div>
                <p class="text-sm font-medium text-center ">Can't find your community? Make one <a href="/create-community" class="hover:underline text-customBrown font-semibold">here</a> </p>
            </div>
        </div>



        <div class="flex flex-col">
            <div class="flex flex-wrap justify-between px-16 gap-12">
                @if ($communities->count() > 0)
                    @foreach ($communities as $community)
                        <div class="card card-compact w-[22rem] bg-base-100 shadow-xl">
                            <figure><img class="w-[22rem] h-[16rem] object-fill"
                                    src="{{ asset('storage/logo/' . $community->logo) }}" alt="Shoes" />
                            </figure>
                            <div class="card-body flex">

                                <h2 class="card-title">{{ ucwords($community->name) }}</h2>

                                <p class="text-sm m"><i class="fa fa-user mr-1"></i> {{ $community->members->count() }} 
                                    @if ($community->members->count() > 1)
                                        Members
                                    @else
                                        Member
                                    @endif
                                    
                                </p>
                                <p class="text-sm"><i class="fa fa-map mr-1"></i> {{ ucwords($community->location) }}</p>
                                <p class="text-sm"><i class="fa fa-list-alt mr-1"></i> {{ ucwords($community->category) }}
                                </p>
                                <hr>

                                <div class="flex w-full justify-end items-center mt-2">


                                    <div class="card-actions">
                                        <a href="/community/{{ $community->id }}"
                                            class="flex items-center justify-center w-24 font-semibold bg-customGreen border rounded-lg h-12 hover:brightness-95 text-white text-center">Details</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    <p class="w-full text-3xl text-center">No Communities Yet!</p>
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

<script>
    function resetSearch() {
        window.location.href = window.location.pathname;
    }
</script>
</html>
