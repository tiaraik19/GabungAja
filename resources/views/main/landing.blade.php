<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GabungAja</title>
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

    <div class="min-h-screen bg-customBg flex flex-col gap-[5rem]">

        {{-- Navbar Component --}}
        <div class="flex flex-col sticky top-0 z-10">
            <div class="bg-customGreen px-6 p-3">
                <div class="flex justify-between items-center">
                    <img src="{{ asset('assets/grey.png') }}" class="w-20 h-20" alt="logo">

                    <div class="flex gap-[4rem]">
                        <a href="#" class="text-white">Home</a>
                        <a href="#ourfeatures" class="text-white">Our Features</a>
                        <a href="#testimonies" class="text-white">Testimonies</a>
                        <a href="#faq" class="text-white">FAQ</a>
                        <a href="#aboutus" class="text-white">About Us</a>
                    </div>

                    


                    <div class="flex">
                        <div class="flex items-stretch">
                            <a href="/login" class="flex bg-customBg w-[5rem] h-[3rem] rounded-xl justify-center items-center text-customBrown">Login</a>
                        </div>
                    </div>
                </div>      
                
            </div>
            
            <div class="z-50 w-full bg-gray-200">
                <div class="relative w-full h-[.5rem] bg-gray-400">
                  <div id="myBar" class="absolute top-0 left-0 h-full bg-customGreen"></div>
                </div>
            </div>
        </div>

        
        
        <div class="w-full h-[25rem] px-[4rem] py-[2rem]">
            <div class="flex items-center">
                <div class="flex flex-col gap-[2rem]">
                        <p class="text-black text-6xl w-[50rem]"><span class="text-customBrown">Gabung Aja</span>: Your Ultimate Community and Socializing Platform!
                        </p>

                        <p class="text-2xl w-[40rem]">Experience the thrill of connecting with fellow gamers and enthusiasts. Gabung Aja is your one-stop destination to discover communities, make new friends, and embark on exciting gaming adventures together.</p>
                </div>


                <div class="flex flex-col gap-[1rem]">

                                
                    <div class="avatar">
                        <div class="w-[16rem] rounded">
                          <img src="{{ asset('assets/pic1.jpg') }}" />
                        </div>
                      </div>

                      <div class="avatar ml-[16rem]">
                        <div class="w-[16rem] rounded">
                          <img src="{{ asset('assets/pic1.jpeg') }}" />
                        </div>
                      </div>


                </div>

            </div>
        </div>


        

        <div id="ourfeatures" class="pt-[1rem]"></div>
        <div  class="w-full h-[25rem] px-[4rem] mt-[10rem]" >
            
            <p class="text-center text-6xl">- OUR FEATURES -</p>

            <div class="flex gap-[10rem] justify-center mt-[4rem]">
                <div class="card w-96 bg-base-100 shadow-xl cursor-pointer hover:text-customGreen">
                    <figure class="px-10 pt-10">
                        <i class="fa fa-users text-[10rem]"></i>
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Community Post</h2>
                      <p></p>
                      <!-- <div class="card-actions">
                        <button class="btn btn-primary">Buy Now</button>
                      </div> -->
                    </div>
                  </div>

                  <div class="card w-96 bg-base-100 shadow-xl cursor-pointer hover:text-customGreen">
                    <figure class="px-10 pt-10">
                        <i class="fa fa-comments text-[10rem]"></i>
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Chat Page</h2>
                      <p></p>
                      <!-- <div class="card-actions">
                        <button class="btn btn-primary">Buy Now</button>
                      </div> -->
                    </div>
                  </div>

                  <div class="card w-96 bg-base-100 shadow-xl cursor-pointer hover:text-customGreen">
                    <figure class="px-10 pt-10">
                        <i class="fa fa-plus text-[10rem]"></i>
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Create New Community</h2>
                      <p></p>
                      <!-- <div class="card-actions">
                        <button class="btn btn-primary">Buy Now</button>
                      </div> -->
                    </div>
                  </div>
            </div>
        </div>

        <div id="testimonies"></div>
        <div class="w-full h-[40rem] px-[4rem] mt-[7rem] flex justify-center">
            
            <div class="flex flex-col">
                <p class="text-center text-6xl" id="testimonies">- TESTIMONIES -</p>


                <div class="carousel w-[40rem] h-[30rem] mt-[4rem]">
                    <div id="slide1" class="carousel-item relative w-full">
                      <img src="{{ asset('assets/testi1.jpg') }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a> 
                        <a href="#slide2" class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide2" class="carousel-item relative w-full">
                      <img src="{{ asset('assets/testi2.jpg') }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a> 
                        <a href="#slide3" class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide3" class="carousel-item relative w-full">
                      <img src="{{ asset('assets/testi3.jpg') }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a> 
                        <a href="#slide4" class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide4" class="carousel-item relative w-full">
                      <img src="{{ asset('assets/testi4.jpg') }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a> 
                        <a href="#slide1" class="btn btn-circle">❯</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>


        <div id="faq"></div>
        <div class="w-full h-[40rem] p-[4rem] mt-[6rem] flex justify-center">
            <div class="flex flex-col gap-[4rem]">
                <p class="text-center text-6xl" id="faq">- FAQ -</p>

                <div class="flex gap-[4rem]">
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" checked="checked" /> 
                        <div class="collapse-title text-xl font-medium">
                            What kind of communities can I find on Gabung Aja?
                        </div>
                        <div class="collapse-content"> 
                          <p>On Gabung Aja, you can find a wide range of communities catering to various interests and hobbies, including
                          Adventure, Art and Culture, Celebrity, Culinary, Entertainment. These are just a few examples, but the diversity of 
                          communities on Gabung Aja ensures that you can find one that aligns with your interests and preferences
                          </p>
                        </div>
                      </div>
                      <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" /> 
                        <div class="collapse-title text-xl font-medium">
                            Can I create my own community on Gabung Aja?
                        </div>
                        <div class="collapse-content"> 
                          <p>Yes, absolutely! Gabung Aja offers a space for you to gather and engage 
                            with others who share your passions. You can easily create your own communities based on your
                            interest or hobbies. By creating your own community on Gabung Aja, 
                            you can connect with like-minded individuals and foster discussions on topics that matter to you.  
                          </p>
                        </div>
                      </div>
                </div>

                <div class="flex gap-[4rem]">
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" /> 
                        <div class="collapse-title text-xl font-medium">
                            Is Gabung Aja free to use?
                        </div>
                        <div class="collapse-content"> 
                          <p>Yes, "Gabung aja" is free to use. Gabung aja means "just join" in Indonesian, 
                            and it typically implies that joining something is easy and without cost. So, feel free to use it!</p>
                        </div>
                      </div>
                      <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" /> 
                        <div class="collapse-title text-xl font-medium">
                            Is Gabung Aja accessible on mobile devices?
                        </div>
                        <div class="collapse-content"> 
                          <p>Yes, Gabung Aja is accessible on mobile devices. You can stay connected to your communities, 
                            explore new content, participate in discussions, and engage with other users on the go. 
                            Whether you're commuting, traveling, or simply prefer using your mobile device, 
                            Gabung Aja ensures that you can stay connected and involved wherever you are.</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div id="aboutus" class="pt-[2rem]"></div>
        <div class="flex flex-col gap-[4rem] mt-[2rem]">
            
            <p class="text-center text-6xl" >- ABOUT US -</p>
            <div class="mx-20 columns-2 gap-20">
            <p class = "text-center text-3xl">Our Mission</p>
            <br>
            <p class = "text-justify text-xl">
            Our mission at GabungAja is simple: to provide a platform where individuals can easily discover, 
            join, and engage with a diverse array of communities tailored to their interests, passions, and goals. 
            Whether you're a seasoned enthusiast seeking like-minded individuals or a curious explorer looking to 
            broaden your horizons, GabungAja is here to help you find your tribe.
            </p>
            <br>
            <p class="text-center text-3xl">What We Offer</p>
            <br>
            <p class = "text-justify text-xl">
            GabungAja offers a user-friendly and intuitive interface designed to streamline the process of community
            discovery. Our platform boasts an extensive database of communities spanning a wide range of interests,
            hobbies, and professions. From photography expert to fitness fanatics, from tech 
            enthusiasts to environmental activists, there's something for everyone on GabungAja.
            </p>
           
            </div>
        </div>
       



        





        {{-- Footer Component --}}
        <div class="mt-[10rem]">
            @include('components.footer')
        </div>
        


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    // When the user scrolls the page, execute myFunction 
    window.onscroll = function() {myFunction()};
    
    function myFunction() {
      var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrolled = (winScroll / height) * 100;
      document.getElementById("myBar").style.width = scrolled + "%";
    }
</script>

</html>
