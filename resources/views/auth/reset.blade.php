<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo  Form::open(array('url' => URL::to('password')."/".$id, 'class' => 'form-horizontal')) ; ?>
    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        New Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">
            Reset Password
        </button>
    </div>
<?php echo Form::close() ?>

</body>
</html>