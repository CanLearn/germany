<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Document</title>
    <style>
        .pagination {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #424242;
            width: fit-content;
            padding: 10px;
            border-radius: 10px;
            background-color: #212121;
        }
        .pagination a {
            color: #e0e0e0;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="pagination">
    {{ $posts->links() }}
</div>
</body>
</html>
