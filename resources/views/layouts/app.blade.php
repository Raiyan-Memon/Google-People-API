





{{--  new side bar--}}





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> --}}
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

       <!-- Scripts -->
       <script src="{{ asset('js/script.js') }}" defer></script>



       
    <title>People API</title>

    <style>
    

        </style>
</head>

<body>

    <!-- side bar  -->
    <div class="navigation">
        <ul>
            <li class="username">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="log-in-outline"></ion-icon>
                    </span>
                    <span class="title"> {{ Auth::user()->name }}</span>
                </a>
            </li>
            <!-- <hr class=""> -->
            <li class="list ">
                <a href="/users">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li class="list  ">
                <a href="/people">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Contacts</span>
                </a>
            </li>
            <li class="list active">
                <a href="/contactgroup">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">ContactGroups</span>
                </a>
            </li>
            <li class="list">
                <a href="/othercontact">
                    <span class="icon">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </span>
                    <span class="title">OtherContacts</span>
                </a>
            </li>
            <li class="signout">

                

                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">SignOut</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

          

        </ul>
    </div>


    <!-- Top bar -->

    <div class="top-bar">

        <ul>
            <li class="list">
                <a href="#">
                    <span class="icon"><img src="{{asset('side-bar images/icons8-google-contacts-96.png')}}" alt="" width="40px"
                            height="40px"></span>
                    <span class="title">People API</span>
                </a>
            </li>

            <li class="search">
                <input type="text" name="" id="" placeholder="   Search...">
                <a href="#" class="icon">
                    <span class="search-icon"><img src="{{asset('side-bar images/icons8-search-30 (1).png')}}" alt="" width="25px"></ion-icon></span>
                </a>
            </li>
           

        </ul>
        
    </div>
    <main class="container">
        @yield('content')
    </main>
   





    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>




