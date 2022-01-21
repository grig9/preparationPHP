<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="media_handler.php" method="POST" >
      <input type="hidden" name="user_id" value="98">
      <input type="file" name="image" id="file">
      <input type="submit" value="Загрузить">
    </form>
</body>
</html>