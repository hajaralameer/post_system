<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Create Post</h2>
        <form action="/post/create" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" required minlength="3">
            
            <label for="content">Content:</label>
            <textarea name="content"></textarea>
            
            <label for="media">Media Upload:</label>
            <input type="file" name="media">
            
            <label for="category">Category:</label>
            <select name="category">
                <option value="blog">Blog</option>
                <option value="news">News</option>
                <option value="tutorial">Tutorial</option>
            </select>
            
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
