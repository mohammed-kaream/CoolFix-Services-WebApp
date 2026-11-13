<!-- ملف: resources/views/upload.blade.php -->

<form action="/upload-file" method="POST" enctype="multipart/form-data">
    @csrf

    <label>اختر صورتك الشخصية:</label>
    <br>
    <hr>
    <input type="file" name="user_photo"> <!-- لاحظ نوع المدخل file -->
<br>
<hr>
    <button type="submit">Send</button>
</form>

