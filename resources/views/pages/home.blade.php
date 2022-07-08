<h1>Welcome {{ $name }}</h1>

{{ $message}}
<?php echo htmlspecialchars($message) ; ?>
{!! $message !!}

@foreach ($colors as $color)
 <li> {{ $color }}</li>
@endforeach

<h1>Welcome <?php echo $name; ?></h1>

<?php foreach ($colors as $color) : ?>
  <li><?php echo $color; ?></li>
<?php endforeach; ?>

@for($i= 0; $i < 5; $i++)
  <h3> {{ $i}}</h3>
@endfor

@if(true)
<h1>This is True.</h1>
@else
<h1>This is False.</h1>
@endif
