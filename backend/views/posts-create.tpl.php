<?php

/** @var array $data */
$categories = $data['categories'];
$authores = $data['authores'];
$statuses = $data['statuses'];
$errorData = isset($data['errorData']) ? $data['errorData'] : null;
$error = isset($data['error']) ? $data['error'] : null;

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
                    <?php if(is_null($errorData)): ?>
                    <input type="text" name="title" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php else: ?>
                    <input type="text" name="title" value="<?php echo $errorData['title'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php endif;?>
                    <?php if ($error && isset($error['title'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['title']; ?></div>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <?php foreach($categories as $category): ?>
                            <?php if($errorData['category_id'] === $category->getId()):?>
                            <option value="<?php echo $category->getId(); ?>" selected><?php echo $category->getTitle(); ?></option>
                            <?php else: ?>
                            <option value="<?php echo $category->getId(); ?>" ><?php echo $category->getTitle(); ?></option>
                            <?php endif;?>
                        <?php endforeach ?>
                    </select>
                    <?php if ($error && isset($error['category_id'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['category_id']; ?></div>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="author_id">
                        <?php foreach($authores as $author): ?>
                            <?php if($errorData['author_id'] === $author->getId()):?>
                                <option value="<?php echo $author->getId(); ?>" selected><?php echo $author->getFullname(); ?></option>
                            <?php else: ?>
                                <option value="<?php echo $author->getId(); ?>"><?php echo $author->getFullname(); ?></option>
                            <?php endif;?>
                        <?php endforeach ?>
                    </select>
                    <?php if ($error && isset($error['author_id'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['author_id']; ?></div>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="status_id">
                        <?php foreach($statuses as $status): ?>
                            <?php if($errorData['status_id'] === $status->getId()):?>
                                <option value="<?php echo $status->getId(); ?>" selected><?php echo $status->getTitle(); ?></option>
                            <?php else: ?>
                                <option value="<?php echo $status->getId(); ?>"><?php echo $status->getTitle(); ?></option>
                            <?php endif;?>
                        <?php endforeach ?>
                    </select>
                    <?php if ($error && isset($error['status_id'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['status_id']; ?></div>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Load cover img</label>
                    <input class="form-control" type="file" id="formFile" name="img" value="<?php echo $errorData['img'] || '';?>">
                    <?php if ($error && isset($error['img'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['img']; ?></div>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post content</label>
                    <textarea value="<?php echo $errorData['content'] || '';?>" class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    <?php if ($error && isset($error['content'])):?>
                        <div id="emailHelp" class="form-text"><?php echo $error['content']; ?></div>
                    <?php endif;?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>