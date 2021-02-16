<?php

/** @var array $data */
$categories = $data['categories'];
$authores = $data['authores'];
$statuses = $data['statuses'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form method="POST" enctype="multipart/form-data" action="/posts/add">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title post</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="category_id" required>
                        <option selected>Select category</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->getId(); ?>"><?php echo $category->getTitle(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="author_id" required>
                        <option selected>Select author</option>
                        <?php foreach($authores as $author): ?>
                            <option value="<?php echo $author->getId(); ?>"><?php echo $author->getFullname(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="status_id" required>
                        <option selected>Select status</option>
                        <?php foreach($statuses as $status): ?>
                            <option value="<?php echo $status->getId(); ?>"><?php echo $status->getTitle(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Load cover img</label>
                    <input class="form-control" type="file" id="formFile" name="img" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>