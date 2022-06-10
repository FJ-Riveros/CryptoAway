
<!DOCTYPE html <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
    <script>
        var currentDataUser = @php echo Auth::user(); @endphp;
        // @php 
        // use App\Models\User;
        
        // User::find(1)->assignRole('admin'); 
        
        // @endphp 

        @php 
        use App\Models\User;
        
         
        
        @endphp 
    </script>


@if(Auth::user()->hasRole('admin')) <h2>holita</h2> @endif
<div class="container">
    <div id="reactHeader"></div>
    <div id="reactGetTimeline"></div>
</div>
<div class="container mt-4">
    
    <div class="row">
        <!-- Left Side -->
        <div class="col-3">

            <!-- Profile card -->
            <div class="profile__card">
                <div class="profile__card__img" style="background-image: url('img/person_1.jpg')"></div>
                <div class="ml-2 mb-0 text text-left">
                    <h5>FJ</h5>
                    <p>@FJ-riv</p>
                </div>
            </div>

            <!-- Routes -->
            <div class="routes">
                <div class="children__routes active">
                    <div class="home d-flex align-items-center">
                        <i class="bi bi-house-fill"></i>
                        <a href="" class="ml-2">Home</a>
                    </div>
                </div>
                
                <div class="children__routes">
                    <div class="friends d-flex align-items-center">
                        <i class="bi bi-people-fill"></i>
                        <a href="friends" class="ml-2">Friends</a>
                    </div>
                </div>

                <div class="children__routes">
                    <div class="posts d-flex align-items-center">
                        <i class="bi bi-collection-fill"></i>
                        <a href="" class="ml-2">Your Posts</a>
                    </div>
                </div>

            </div>

        </div>

        <!-- Center -->
        <div class="col-6">
            <div class="feed__card__post">
                <div class="feed__card__post__header">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-start align-items-center">
                            <img src="img/destination-3.jpg" alt="" class="header__img">
                            <div class="header__text ml-2">
                                <h4>Ruiz</h4>
                                <p>3 hours ago</p>
                            </div>
                        </div>

                        <div class="col-6">
                            
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="body__img" style="background-image: url('img/destination-3.jpg')">

                    </div>
                    <p class="body__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugit dignissimos obcaecati, nam suscipit, voluptas animi praesentium harum illo laborum minima iusto doloribus ratione commodi cum? Doloribus iste facilis delectus.
                    Consequatur odio dicta blanditiis.</p>

                </div>

                <div class="footer">
                    <i class="bi bi-suit-heart"></i>
                    <i class="bi bi-chat-left-text ml-4"></i>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-3">
            <div class="latest__photos__container">
                <div class="header">
                    <h3>Latest Photos</h3>
                    <hr/>
                </div>
                
                <div class="photos__grid row">
                    <div class="col-4">
                        <img src="img/destination-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-4">
                        <img src="img/destination-2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-4">
                        <img src="img/destination-3.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-4">
                        <img src="img/destination-4.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-4">
                        <img src="img/destination-5.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-4">
                        <img src="img/destination-6.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="friend__suggestion__container">
                <h3>Add Friends!</h3>
                <hr/>
                <div class="row d-flex align-items-center">
                    <div class="col-6 user__info">
                        <img src="img/destination-4.jpg" alt=""  height="100%">
                        <span class="username">hola</span>
                    </div>
                    <div class="col-6 add__button__container"><i class="bi bi-person-plus-fill add"></i></div>
                </div>

                <div class="row d-flex align-items-center">
                    <div class="col-6 user__info">
                        <img src="img/destination-6.jpg" alt=""  height="100%">
                        <span class="username">Julia</span>
                    </div>
                    <div class="col-6 add__button__container"><i class="bi bi-person-plus-fill add"></i></div>
                </div>
            </div>
        </div>

        

    </div>
</div>    
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

