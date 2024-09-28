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

        <div class="w-full px-[3rem] text-lg breadcrumbs">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/profile/{{ $user->id }}" class="font-semibold">Profile</a></li>
            </ul>
        </div>

        <div class="w-full flex justify-center">
            @include('components.alert')
        </div>

        <div class="flex justify-between items-center px-10 gap-10">
            <div class="flex flex-col gap-2">
                <div class="avatar">
                    <label for="file-upload">
                        @if ($user->profilePicture)
                            <div class="w-40 h-40 rounded-full bg-white">
                                <img src="{{ asset('storage/profile/' . $user->profilePicture) }}"
                                    class="rounded-full cursor-pointer hover:opacity-95">
                            </div>
                        @else
                            <i
                                class="fa fa-user-circle text-[10rem] text-white rounded-full bg-customGreen cursor-pointer"></i>
                        @endif
                    </label>
                </div>

                <form id="profilePictureForm" action="/store-picture/{{ auth()->user()->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="flex flex-col items-center gap-2 flex-column">
                        <input id="file-upload" type="file" name="profilePicture" class="hidden"
                            onchange="uploadProfilePicture(this)">
                    </div>
                </form>
            </div>


            <div class="card w-full h-max bg-customLightGreen shadow-md">
                <div class="card-body">
                    <h2 class="text-2xl font-bold">{{ $user->username }}</h2>
                    <div class="divider font-semibold">Profile Details</div>
                    <div class="flex flex-col gap-6">
                        <p class="text-lg font-semibold">Full Name: <span
                                class="font-normal">{{ $user->fullName }}</span></p>
                        <p class="text-lg font-semibold">Phone Number: <span
                                class="font-normal">{{ $user->phoneNumber }}</span></p>
                        @if ($user->bio)
                            <p class="text-lg text-justify font-semibold">Bio: <span
                                    class="font-normal">{{ $user->bio }}</span></p>
                        @endif

                        <div class="flex justify-between mt-5">
                            @if (Auth::user()->id == $user->id)
                                <div class="font-semibold hover:underline text-lg">
                                    <a href="/edit-profile/{{ $user->id }}"><i class="fa fa-pencil"></i> Edit
                                        Profile</a>
                                </div>
                            @endif


                            <p class="text-end text-lg font-semibold">Since: {{ $user->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="divider font-semibold">Community List</div>

        @if ($communities->count() > 0)
            <div class="flex flex-wrap justify-center px-16 gap-12">
                @foreach ($communities as $c)
                    <div class="card card-compact w-[22rem] bg-base-100 shadow-xl">
                        <figure><img class="w-[22rem] h-[16rem] object-fill"
                                src="{{ asset('storage/logo/' . $c->logo) }}" alt="Shoes" />
                        </figure>
                        <div class="card-body flex">

                            <h2 class="card-title">{{ ucwords($c->name) }}</h2>
                            <p class="text-sm"><i class="fa fa-user"></i> {{ $c->members->count() }} Members</p>
                            <p class="text-sm"><i class="fa fa-map"></i> {{ ucwords($c->location) }}</p>
                            <p class="text-sm"><i class="fa fa-list-alt"></i> {{ $c->category }} </p>
                            <hr>

                            <div class="flex w-full justify-between items-center mt-2">
                                <div class="card-actions">
                                    <a href="/community/{{ $c->id }}"
                                        class="flex items-center justify-center w-24 font-semibold bg-customGreen border rounded-lg h-12 hover:brightness-95 text-white text-center">Details</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-3xl">No Communities Yet</p>
        @endif
        {{-- Footer Component --}}
        <div class="mt-10">
            @include('components.footer')
        </div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
    function uploadProfilePicture(input) {
        var form = document.getElementById('profilePictureForm');
        form.submit();
    }
</script>

</html>
