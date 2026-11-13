<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="user-card">
        <!-- هان بنعرض الصورة للمستخدمين -->
        <img src="{{ asset('storage/' . $path) }}" alt="صورة المستخدم" width="150">

        <h2>اسم المستخدم: محمد</h2>
    </div>

</body>

</html>


