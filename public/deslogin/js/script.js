// let icon_eye_open = document.querySelector('.icon-eye-open');
// let icon_eye_slash = document.querySelector('.icon-eye-slash');
// let input_password = document.querySelector('.input-password');

// icon_eye_slash.onclick = () => {
//     input_password.type = "text";
//     icon_eye_slash.style.display = "none";
//     icon_eye_open.style.display = "inline";
// }


// icon_eye_open.onclick = () => {
//     input_password.type = "password";
//     icon_eye_slash.style.display = "inline";
//     icon_eye_open.style.display = "none";
// }

// let btn = document.querySelector('.btn');

// btn.onclick = (e) => {
//     e.preventDefault();
//     window.location.href = "home.html";


// }



// // let input_email1 = document.querySelector('.input-email');
// // let input_password1 = document.querySelector('.input-password');
// // let button = document.querySelector('.btn');

// // button.onclick = (e) => {
// //     e.preventDefault()
// //     if (input_email1.value.length > 0 && input_password1.value.length > 0) {
// //         window.location.href = "signin.html";
// //     } else {
// //         alert('يرجى ملء جميع الحقول أولاً!');
// //     }
// // }

// let btn_forget = document.querySelector('.btn-forget');
// let input_email = document.querySelector('.input-email');

// btn_forget.onclick = (e) => {
//     e.preventDefault();
//     if (input_email.value.length > 0) {
//         window.location.href = "otp.html";
//     } else {
//         alert("Please fill in the email field first!");
//     }
// }




// تشغيل ميزة إظهار وإخفاء كلمة المرور المخصصة في واجهتك الأنيقة
let icon_eye_open = document.querySelector('.icon-eye-open');
let icon_eye_slash = document.querySelector('.icon-eye-slash');
let input_password = document.querySelector('.input-password');

if (icon_eye_slash && icon_eye_open && input_password) {
    icon_eye_slash.onclick = () => {
        input_password.type = "text";
        icon_eye_slash.style.display = "none";
        icon_eye_open.style.display = "inline";
    }

    icon_eye_open.onclick = () => {
        input_password.type = "password";
        icon_eye_slash.style.display = "inline";
        icon_eye_open.style.display = "none";
    }
}

// تم حذف أكواد الـ onclick المسببة لـ الـ 404 لترك التحكم الكامل لجدار حماية لارافيل
