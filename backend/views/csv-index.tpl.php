<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/csv/read" method="post" enctype="multipart/form-data">
        <h1>Read CSV</h1>
        <input type="file" name="csvDocument">
        <button type="submit">Upload</button>
    </form>
    <form action="/csv/write" method="post" enctype="multipart/form-data">
        <h1>Write CSV</h1>
        <input type="text" name="title" placeholder="title">
        <input type="text" name="text" placeholder="text">
        <button type="submit">Write</button>
    </form>
    <form action="/csv/todb" method="post" enctype="multipart/form-data">
        <h1>CSV To DB</h1>
        <input type="file" name="csvDocument">
        <button type="submit">Upload</button>
    </form>
</body>
</html>