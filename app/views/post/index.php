<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Posts</h2>
        <a href="/post/create">Create New Post</a>
        <div class="posts">
            <?php foreach ($data['posts'] as $post): ?>
                <div class="post">
                    <h3><?php echo $post->title; ?></h3>
                    <p><?php echo $post->content; ?></p>
                    <?php if ($post->media): ?>
                        <?php if (strpos($post->media, 'jpg') !== false || strpos($post->media, 'png') !== false): ?>
                            <img src="../uploads/<?php echo $post->media; ?>" alt="">
                        <?php elseif (strpos($post->media, 'mp4') !== false): ?>
                            <video controls src="../uploads/<?php echo $post->media; ?>"></video>
                        <?php elseif (strpos($post->media, 'mp3') !== false): ?>
                            <audio controls src="../uploads/<?php echo $post->media; ?>"></audio>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a href="/post/edit/<?php echo $post->id; ?>">Edit</a>
                    <a href="/post/delete/<?php echo $post->id; ?>">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
