<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h4>Hi</h4>
	<p>{{ @$description }}</p>
	<h4>Regards,</h4>
	<h4>{{ @$name }}</h4>
	@if (@$phone)
	<h4>Phone: {{ @$phone }}</h4>
	@endif
	<h4>Email: {{ @$email }}</h4>
</body>
</html>