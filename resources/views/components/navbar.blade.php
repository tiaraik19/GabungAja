        {{-- Navbar --}}
        <div class="px-3 bg-customGreen">
            <div class="navbar">
                <a href="/"><img src="{{ asset('assets/grey.png') }}" class="w-20 h-20" alt="logo"></a>
                <div class="flex justify-end flex-1 px-2">
                    <div class="flex items-stretch">
                        <!-- <a class="btn btn-ghost rounded-btn">Button</a> -->
                        <div class="dropdown dropdown-end">
                            <!-- <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">Dropdown</div> -->
                            <ul tabindex="0"
                                class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                                <li><a>Item 1</a></li>
                                <li><a>Item 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
