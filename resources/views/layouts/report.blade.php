<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Jutemillitems Report</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    
    <link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('la-assets/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />

   <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> -->

     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->

    <!-- Styles -->

    <!-- <style type="text/css">
        
        .page_breaking
            {
              position:absolute;
              bottom: 2px;
              page-break-after: always;
            } 


        .page_number{ 
            width:100%;
            position:fixed;
            bottom:17px;
            text-align: center;
            font-size: 11px;

            }
    </style> -->

</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header" style="text-align:center;">

                <!-- Collapsed Hamburger -->
                <div class="intro-text" >
                <div class="intro-lead-in" >
                <p><h1 >Shah Ismail Gazi (Rah) Jute Mills Ltd.</h1></p>
                </div>
                <div class="intro-heading">Soekpur, Khedmotpur , Pirgonj , Rangpur . </div>
                </div>
            </div>
        </div>
        </nav>

    @yield('content')

    <!-- JavaScripts -->

    <script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
     
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 -->

</body>
</html>
