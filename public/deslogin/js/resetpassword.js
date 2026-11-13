let icon_eye_open = document.querySelector('.icon-eye-openn');
let icon_eye_slash = document.querySelector('.icon-eye-slashh');
let passwordd = document.querySelector('.input-passwordd');

if (icon_eye_slash && icon_eye_open && passwordd) {
    icon_eye_slash.onclick = () => {
        passwordd.type = "text";
        icon_eye_slash.style.display = "none";
        icon_eye_open.style.display = "inline";
    }

    icon_eye_open.onclick = () => {
        passwordd.type = "password";
        icon_eye_slash.style.display = "inline";
        icon_eye_open.style.display = "none";
    }
}

// تم حذف كود الـ button.onclick بالكامل من هنا ليعود التحكم للارافيل بنجاح!
