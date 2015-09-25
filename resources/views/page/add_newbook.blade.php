<!DOCTYPE html>
<html>
<head>
	<title>test add new</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="{{ Asset('book') }}" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-offset-2 col-sm-8">
        	<div class="col-sm-2">
        		name
        	</div>
        	<div class="col-sm-10">
        		<input type="text" name="name" class="form-control" placeholder="enter name of book">
        	</div><br><br>
        	<div class="col-sm-2">
        		author
        	</div>
        	<div class="col-sm-10">
        		<input type="text" name="author" class="form-control" placeholder="enter author of book">
        	</div><br><br>
        	<div class="col-sm-offset-4 col-sm-4">
        		<button type="submit" class="btn btn-primary">submit</button>
        	</div>
        </div>

    </form>
</body>
</html>