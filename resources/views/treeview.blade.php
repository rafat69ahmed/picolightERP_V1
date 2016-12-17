<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dynamic Treeview with jQuery, Laravel PHP Framework Example</title>
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" /> -->

    <link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

    <!-- <link href="http://www.expertphp.in/css/bootstrap.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="http://demo.expertphp.in/css/jquery.treeview.css" />


    <!-- <script src="http://demo.expertphp.in/js/jquery.js"></script>  -->  

    <script src="http://demo.expertphp.in/js/jquery-treeview.js"></script>
    <script type="text/javascript" src="http://demo.expertphp.in/js/demo.js"></script>
    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


</head>
<body>
<div class="container">      
    {!! $tree !!}
</div> 
</body>
</html>