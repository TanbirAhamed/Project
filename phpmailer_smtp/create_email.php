<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Email Test</h2>
  <form action="test-email.php" method="post">
    <div class="form-group">
      <label for="email">Sender Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="sub">Subject:</label>
      <input type="text" class="form-control" id="sub" placeholder="Enter subject" name="sub">
    </div>
    <div class="form-group">
      <label for="comment">Write Your Message:</label>
      <textarea class="form-control" rows="5" id="comment" name="msg"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Send</button>
  </form>
</div>

</body>
</html>
