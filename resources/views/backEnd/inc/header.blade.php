<section class="header">
    <div class="logo">
        <i class="ri-menu-line icon icon-0 menu"></i>

        <img src="{{asset('backend')}}/images/Group.svg" alt="logo" class="img-fluid">
    </div>
    <a href="{{route('pos.add')}}" class="btn btn-success rounded-1 btn-lg" target="_blank">POS</a>
{{--    <div class="back-to" style="background: #0088EA; padding: 5px 2px; text-align:center; width:13%;border-radius: 10px;">--}}
{{--        <span >--}}
{{--            <a style="color:#fff !important; font-size: 14px;" href="{{route('pos.add')}}" target="blank">POS</a>.--}}
{{--        </span>--}}
{{--    </div>--}}
    <div class="search--notification--profile">
        <div class="search">
            <input type="text" placeholder="Search....">
            <button><i class="ri-search-2-line"></i></button>
        </div>
        <div class="notification--profile">
            <div class=" dark--theme--btn">
                <i class="bell picon ri-moon-line moon"></i>
                <i class=" chat picon ri-sun-line sun"></i>
            </div>
            <div class="header-left">
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-notification-2-line"></i>
                        <span class="count bg-danger">3</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 3 Notification</p>
                        <a class="dropdown-item media" href="#">
                            <i class="ri-check-fill"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="ri-information-line"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="ri-alarm-warning-fill"></i>
                            <p>Server #3 overloaded.</p>
                        </a>
                    </div>
                </div>

                <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-chat-poll-fill"></i>
                        <span class="count bg-primary">4</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        <p class="red">You have 4 Mails</p>
                        <a class="dropdown-item media" href="#">
                            <span class=" media-left"><img alt="avatar" src="{{asset('backend')}}/images/2.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Jonathan Smith</span>
                                <span class="time float-right">Just now</span>
                                <p>Hello, this is an example msg</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class=" media-left"><img alt="avatar" src="{{asset('backend')}}/images/1.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Jack Sanders</span>
                                <span class="time float-right">5 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class=" media-left"><img alt="avatar" src="{{asset('backend')}}/images/3.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Cheryl Wheeler</span>
                                <span class="time float-right">10 minutes ago</span>
                                <p>Hello, this is an example msg</p>
                            </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <span class=" media-left"><img alt="avatar" src="{{asset('backend')}}/images/4.jpg"></span>
                            <div class="message media-body">
                                <span class="name float-left">Rachel Santos</span>
                                <span class="time float-right">15 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="picon profile">
                        <img src="{{asset('backend')}}/images/pic.jpg" alt="" class="img-fluid">
                    </div>
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="ri-user-fill"></i>My Profile</a>

                    <a class="nav-link" href="#"><i class="ri-notification-fill"></i>Notifications <span class="count">13</span></a>
                    <a class="nav-link" href="#"><i class="ri-chat-poll-fill"></i>Messages <span class="count">10</span></a>
                    <a class="nav-link" href="#"><i class="ri-settings-5-fill"></i>Settings</a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <a class="nav-link" href="{{route('logout')}}"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="ri-shut-down-line"></i>
                            Logout
                        </a>
                    </form>


                </div>
            </div>
            <div class="logout" style="margin-left: 10px;">{{Auth::user()->name }}<br>


            </div>
        </div>
    </div>
</section>
