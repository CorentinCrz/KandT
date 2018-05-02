<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une page</title>
</head>
<body>
<form action="\crud\doadd.php" method="post">
    <label for="slug">slug</label> <input type="text" name="slug"><br>
    <label for="title">title</label> <input type="text" name="title"><br>
    <label for="h1">h1</label> <input type="text" name="h1"><br>
    <label for="p">text</label> <input type="text" name="p"><br>
    <label for="span-class">span-class</label> <input type="text" name="span-class"><br>
    <label for="span-text">span-text</label> <input type="text" name="span-text"><br>
    <label for="img-alt">img-alt</label> <input type="text" name="img-alt"><br>
    <label for="img-src">img-src</label> <input type="text" name="img-src"><br>
    <label for="nav-title">nav-title</label> <input type="text" name="nav-title"><br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>