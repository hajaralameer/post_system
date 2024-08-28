<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Post</h2>
        <form action="/post/edit/<?php echo $data['post']->id; ?>" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $data['post']->title; ?>" required minlength="3">
            
            <label for="content">Content:</label>
            <textarea name="content"><?php echo $data['post']->content; ?></textarea>
            
            <label for="media">Media Upload:</label>
            <input type="file" name="media">
            
            <label for="category">Category:</label>
            <select name="category">
                <option value="blog" <?php echo $data['post']->category == 'blog' ? 'selected' : ''; ?>>Blog</option>
                <option value="news" <?php echo $data['post']->category == 'news' ? 'selected' : ''; ?>>News</option>
                <option value="tutorial" <?php echo $data['post']->category == 'tutorial' ? 'selected' : ''; ?>>Tutorial</option>
            </select>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
