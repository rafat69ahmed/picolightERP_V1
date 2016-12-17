<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Jutemillitems Pdf Report</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />   



    <!-- Styles -->

    <style type="text/css">
        
        /*.page_breaking
            {
              position:absolute;
              bottom: 2px;
              page-break-after: always;
            } */

        body {
        margin:0px;
        overflow: hidden;
        text-decoration:none;
        font-size:11px;
        border-bottom:medium #000 solid;

        }
        #table1{
            width:80%;
            padding:3px 7px 3px 7px;
            margin-top: 10px;
            margin:3px 10px 0 0
            -webkit-border-radius: 5px; 
            -moz-border-radius: 5px; 
            overflow: hidden;
            border-radius: 2px; 
            border:thin #333 solid;
            page-break-inside:auto;
            overflow: visible;
            border-collapse: separate;
            border-spacing: 3px;
            

        }

        #tr1{

            text-align: center;
            background-color: #f2f2f2;
            overflow: hidden;
            page-break-inside:avoid; 
            page-break-after:auto;
        }

        th{
        height: 30px;
        font-size:10px;
        text-align: center;
        background-color:rgb(0, 163, 136);
        color: white;
        }

        td{

        border-bottom-color: rgb(221, 221, 221);
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-collapse: collapse;
        border-image-outset: 0 0 0 0;
        border-image-repeat: stretch stretch;
        border-image-slice: 100% 100% 100% 100%;
        border-image-source: none;
        border-image-width: 1 1 1 1;
        border-left-color: rgb(221, 221, 221);
        border-left-style: solid;
        border-left-width: 1px;
        border-right-color: rgb(221, 221, 221);
        border-right-style: solid;
        border-right-width: 1px;
        border-top-color: rgb(221, 221, 221);
        border-top-style: solid;
        border-top-width: 0px;
        text-align: center;
        vertical-align: top
    }



        #page_number{ 
            width:100%;
            position:fixed;
            bottom:17px;
            text-align: center;
            font-size: 11px;

            }
    </style>

</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header" style="text-align:center">

               
                <div class="intro-text">
                <div class="intro-lead-in"><h1>Shah Ismail Gazi (Rah) Jute Mills Ltd.</h1></div>
                <div class="intro-heading">Soekpur, Khedmotpur , Pirgonj , Rangpur . </div>
                </div>
            </div>
        </div>
        </nav>

    @yield('content')

    <!-- JavaScripts -->

    <script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

</body>
</html>
