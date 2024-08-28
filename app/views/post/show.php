<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['post']->title; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $data['post']->title; ?></h1>
        <p><?php echo $data['post']->content; ?></p>
        <?php if ($data['post']->media): ?>
            <?php if (strpos($data['post']->media, 'jpg') !== false || strpos($data['post']->media, 'png') !== false): ?>
                <img src="../uploads/<?php echo $data['post']->media; ?>" alt="">
            <?php elseif (strpos($data['post']->media, 'mp4') !== false): ?>
                <video controls src="../uploads/<?php echo $data['post']->media; ?>"></video>
            <?php elseif (strpos($data['post']->media, 'mp3') !== false): ?>
                <audio controls src="../uploads/<?php echo $data['post']->media; ?>"></audio>
            <?php endif; ?>
        <?php endif; ?>
        <a href="/post/edit/<?php echo $data['post']->id; ?>">Edit</a>
        <a href="/post/delete/<?php echo $data['post']->id; ?>">Delete</a>
    </div>
</body>
</html>
