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
                            <img src="{{ asset('storage/logo/' . $community->logo) }}" />
                        </div>

                        <h1 class="text-lg font-bold">{{ucwords($community->name)}}</h1>
                
                    </div>

                </div>
            </div>

            <!-- Content -->
            <div class="flex-1">
                
                <div class="w-full px-[3rem] text-lg breadcrumbs mt-[3rem]">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/community/{{ $community->id }}">{{ucwords($community->name)}}</a></li>
                        <li><a href="/" class="font-semibold">Member Lists</a></li>
                    </ul>
                </div>

                <div class="overflow-x-auto p-[3rem]">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Phone Number</th>
                          <th>Date Joined</th>
                          @if (Auth::user()->id == $community->user_id)
                            <th>Action</th>
                        @endif
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        <tr>
                        @foreach ($members as $key => $member)    
                          <th>
                            <p>{{$key + 1}}</p>
                          </th>
                          <td>
                            <div class="flex items-center gap-3">
                              <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                  @if ($member->user->profilePicture)
                                    <img src="{{ asset('storage/profile/' . $member->user->profilePicture) }}" alt="" />
                                  @else
                                    <i class="fa fa-user w-12 h-12 text-[2.5rem] text-customGreen bg-white text-center flex items-center justify-center"></i>
                                  @endif
                                  
                                </div>
                              </div>
                              <div>
                                <div class="font-bold">{{$member->user->fullName}}

                                  <span class="text-gray-500"> 
                                    @if (Auth::user()->id == $member->user_id)(You)
                                  @endif
                                </span>
                                </div>
                                <div class="text-sm opacity-50">{{$member->user->username}}</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            {{$member->user->phoneNumber}}
                          </td>
                          <td>{{$member->created_at->format('d/m/Y')}}</td>
                          @if (Auth::user()->id != $member->user_id && Auth::user()->id == $community->user_id)
                            <th>
                                <form action="/deleteMember/{{$member->id}}" method="POST" id="deleteForm{{ $member->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-lg text-red-500" onclick="confirmDelete({{ $member->id }})"><i class="fa fa-trash"></i></button>
                                </form>
                                
                            </th>
                          @endif

                        </tr>
                        @endforeach
                      </tbody>
                      
                    </table>
                  </div>

                <div class="flex justify-center">
                    @include('components.alert')
                </div>

            </div>
        </div>


        {{-- Footer Component --}}
        @include('components.specialFooter')
        
        


    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

{{-- Alert Delete --}}
<script>
    function confirmDelete(memberId) {
        var confirmation = confirm("Do you really wish to remove this member?");
        if (confirmation) {
            document.getElementById('deleteForm' + memberId).submit();
        } else {
            return false;
        }
    }
</script>

</html>
