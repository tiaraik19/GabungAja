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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>

    <div class="min-h-screen bg-customBg flex flex-col">

        {{-- Navbar Component --}}
        @include('components.navbarMember')


        <div class="flex">
            <!-- Sidebar -->
            <div class="bg-customLightGreen text-black w-64 flex-shrink-0">
                <div class="p-5">

                    <div class="avatar w-full flex flex-col items-center gap-5 pt-6">

                        <form id="communityLogo" action="/update-logo/{{ $community->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <input id="file-upload" type="file" name="logo" class="hidden"
                                onchange="uploadCommunityLogo(this)">

                        </form>

                        <label for="file-upload">
                            <div class="w-40 h-40 rounded-full">
                                <img src="{{ asset('storage/logo/' . $community->logo) }}"
                                    class="rounded-full cursor-pointer hover:opacity-95">
                            </div>
                        </label>


                        <h1 class="text-lg font-bold text-center">{{ ucwords($community->name) }}</h1>


                        @if (!$isMember)
                            <form action="/join/{{ $community->id }}" method="POST">
                                @csrf
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-customBrown font-semibold"
                                type="button">
                                Join
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <div class="my-[1rem] w-20 h-20 rounded-full ml-[9rem]">
                                                <img src="{{ asset('storage/logo/' . $community->logo) }}"
                                                    class="rounded-full cursor-pointer hover:opacity-95">
                                            </div>
                                            <h3 class="mb-5 text-lg font-normal text-black">Are you sure you want to
                                                join <span
                                                    class="font-semibold">{{ ucwords($community->name) }}</span> ?</h3>
                                            <button data-modal-hide="popup-modal" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-black rounded-lg">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        @endif


                        @if (Auth::user()->id == $community->user_id)
                            <a href="/create-post/{{ $community->id }}"
                                class="mt-5 bg-customBrown p-3 text-white rounded-lg hover:opacity-90">Create Post</a>
                        @endif

                    </div>

                </div>
            </div>

            <!-- Content -->
            <div class="flex-1">

                <div class="w-full flex justify-between px-[3rem] text-lg breadcrumbs mt-[3rem]">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/community/{{ $community->id }}"
                                class="font-semibold">{{ ucwords($community->name) }}</a></li>
                    </ul>


                    @if ($isMember && !(Auth::user()->id == $community->user_id))
                        <form action="/leave/{{ $community->id }}" method="POST" id="formLeave{{ $community->id }}">
                            @csrf
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block"
                                type="button">
                                <i class="fa fa-sign-out text-red-500"></i>
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <i class="mx-auto m-6 fa fa-sign-out text-red-500 text-4xl"></i>
                                            <h3 class="mb-5 text-lg font-normal text-black">Are you sure you want to
                                                leave <span
                                                    class="font-semibold">{{ ucwords($community->name) }}</span> ?</h3>
                                            <button data-modal-hide="popup-modal" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-black rounded-lg">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    @if (Auth::user()->id == $community->user_id)
                        <form action="/delete-community/{{ $community->id }}" method="POST"
                            id="formDelete{{ $community->id }}">
                            @csrf
                            @method('delete')


                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block"
                                type="button">
                                <i class="fa fa-trash text-red-500"></i>
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <i class="mx-auto m-6 fa fa-trash text-red-500 text-4xl"></i>
                                            <h3 class="mb-5 text-lg font-normal text-black">Are you sure you want to
                                                <span
                                                    class="font-semibold">{{ ucwords($community->name) }}</span> ?
                                            </h3>
                                            <button data-modal-hide="popup-modal" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-black rounded-lg">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif



                </div>

                <div class="flex justify-center">
                    @include('components.alert')
                </div>

                <div class="p-12 flex flex-col gap-12">
                    <div class="card w-full bg-customLightGreen shadow-md">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold">{{ $community->motto }}</h2>
                            <div class="divider font-semibold">Community Description</div>
                            <p class="text-justify">{{ $community->description }}</p>
                            @if (Auth::user()->id == $community->user_id)
                                <div class="font-medium hover:underline text-lg text-end">
                                    <a href="/edit-description/{{ $community->id }}"><i class="fa fa-pencil"></i>
                                        Edit
                                        Description</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card w-full bg-customLightGreen shadow-md">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold">Member</h2>
                            <div class="divider font-semibold">{{ $membersCount->count() }}

                                @if ($membersCount->count() > 1)
                                    Members
                                @else
                                    Member
                                @endif
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                @foreach ($members as $member)
                                    <div class="flex flex-col items-center">
                                        <div class="avatar">
                                            <div class="w-[8rem] h-[8rem] rounded-full bg-white">
                                                @if ($member->user->profilePicture)
                                                    <img
                                                        src="{{ asset('storage/profile/' . $member->user->profilePicture) }}">
                                                @else
                                                    <i
                                                        class="fa fa-user-circle text-[8rem] text-white bg-customGreen"></i>
                                                @endif

                                            </div>
                                        </div>
                                        <p class="text-center mt-2">{{ $member->user->username }}</p>


                                    </div>
                                @endforeach
                            </div>

                            @if ($isMember)
                                <a class="text-center cursor-pointer text-customBrown mt-8 font-semibold hover:underline"
                                    href="/showMember/{{ $community->id }}">View All</a>
                            @endif

                        </div>
                    </div>

                    <div class="card w-full bg-customLightGreen shadow-md">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold">Community Posts</h2>
                            <div class="divider font-semibold">{{ $posts->count() }} Posts</div>

                            <div class="grid grid-cols-2 gap-12">
                                @if ($posts->count() > 0 && $posts->first()->community_id == $community->id)
                                    @foreach ($posts as $post)
                                        <a class="max-w-[26rem] max-h-[37rem] rounded-lg overflow-hidden shadow-lg bg-white"
                                            href="/detailPost/{{ $post->id }}">
                                            <img src="{{ asset('storage/images/' . $post->image) }}"
                                                class="w-[26rem] h-[20rem]" />
                                            <div class="px-6 py-4">
                                                <div class="font-bold text-xl mb-2">{{ ucwords($post->title) }}</div>
                                                <p class="text-gray-700 text-base h-[5rem]">
                                                    {{ Str::limit($post->content, 180, '...') }}
                                                </p>

                                                <p class="font-semibold mt-[3rem] text-end">Posted:
                                                    {{ $post->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        {{-- Footer Component --}}
        @include('components.specialFooter')


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
    const textarea = document.getElementById('communityDescription');
    const characterCount = document.getElementById('characterCount');

    textarea.addEventListener('input', function() {
        const textLength = textarea.value.length;
        characterCount.textContent = `${textLength}/500 characters`;
    });
</script>

<script>
    function uploadCommunityLogo(input) {
        var form = document.getElementById('communityLogo');
        form.submit();
    }
</script>
</script>


</html>
