  <?php

   if(isset($results)){ ?>


  @foreach($results as $result)


	<a href="{{ url(config('laraadmin.adminRoute') . '/modules/'.$result->id) }}">{{$result->name}}
	</a>

 @endforeach


  <?php 
} 
  else {
  echo "Modules Not Found";
  }


?>


