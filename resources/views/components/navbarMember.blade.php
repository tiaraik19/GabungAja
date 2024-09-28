                {{-- Navbar --}}
                <div class="px-3 bg-customGreen">
                    <div class="navbar">
                        <a href="/"><img src="{{ asset('assets/grey.png') }}" class="w-20 h-20" alt="logo"></a>
                        <div class="flex justify-end flex-1 px-2">
                            <div class="flex items-stretch gap-5">
                                
                                <a class="btn btn-ghost rounded-btn text-white text-3xl" href="/chattingList/{{ Auth::user()->id }}"><i class="fa fa-commenting"></i></a>
                                
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