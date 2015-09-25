<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
@if( count($errors) > 0 )
  @foreach($errors->all() as $key=>$error)
      
  <div class="alert alert-danger display-hide" style="display: block;">
    <button class="close" data-close="alert"></button>
    <span>
      <?php echo $error; ?>
    </span>
  </div>

  @endforeach        
@endif
	<form method="POST" action="/password/email">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>
</body>
</html>