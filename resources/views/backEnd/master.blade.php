<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('style')
    <link rel="stylesheet" href="{{asset('backend')}}/fonts/remixicon.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css/calender.css">
    <link rel="stylesheet" href="{{asset('backend')}}/style.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css/responsive.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body">
@include('backEnd.inc.header')

<section class="main">
    @include('backEnd.inc.sidebar')

    <div style="background: linear-gradient(0deg, rgba(255, 255, 255, 0) 1.13%, #C7FEFF 86.9%); height: 35px; padding-top: 10px;"></div>

    @yield('content')

</section>

<script src="{{asset('backend')}}/js/jquery-2.2.4.min.js"></script>
<script src="{{asset('backend')}}/js/popper.min.js"></script>
<script src="{{asset('backend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('backend')}}/js/apexcharts.min.js"></script>
<script src="{{asset('backend')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    let menu = document.querySelector('.menu')
    let sidebar = document.querySelector('.sidebar')
    let mainContent = document.querySelector('.main--content')

    menu.onclick = function() {
        sidebar.classList.toggle('active')
        mainContent.classList.toggle('active')
    }
</script>
<script>
    //-----order list--------

    function olFunction() {
        var x = document.getElementById("olDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function usFunction() {
        var x = document.getElementById("usDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function sellFunction() {
        var x = document.getElementById("sellDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    let body = document.querySelector(".body")
    let sun = document.querySelector(".sun")
    let moon = document.querySelector(".moon")

    moon.onclick = function(){
        body.classList.add("dark--mode")
    }
    sun.onclick = function(){
        body.classList.remove("dark--mode")
    }
</script>

<!--Graph chart js code-->

<script>
    var zValues = ["20%", "30%", "40%", "25%"];
    var yValues = [19, 30, 40, 25];
    var barColors = ["#0288D1", "#26A69A","#F4511E","#FFA000"];

    new Chart("newChart", {
        type: "bar",
        data: {
            labels: zValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
            }
        }
    });
</script>
<!--timer-->

<script>
    function sidefunction(){
        document.getElementById("actives").classList.remove("actives");
    }
</script>

<script>
    $('.icon-up').click(function () {
        $(this).toggleClass('rotate')
    })
</script>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{$error}}',
            });
        </script>
    @endforeach

@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message: '{{session()->get('success')}}',
        });

    </script>

@endif

@yield('script')
</body>
</html>

