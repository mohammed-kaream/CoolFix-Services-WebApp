// 1. جلب كل حقل إدخال بشكل منفصل بناءً على الكلاس المرقم الخاص به
const input1 = document.querySelector('.massege .input-text1');
const input2 = document.querySelector('.massege .input-text2');
const input3 = document.querySelector('.massege .input-text3');
const input4 = document.querySelector('.massege .input-text4');

// 2. وضع الحقول الأربعة داخل مصفوفة بالترتيب
const otpInputs = [input1, input2, input3, input4];

// 3. تفعيل ذكاء الانتقال التلقائي (شرط الأمان يتأكد أن الحقل الأول موجود بالصفحة لمنع التضارب)
if (input1) {
    otpInputs.forEach((input, index) => {

        // الانتقال التلقائي للخانة التالية عند كتابة حرف
        input.oninput = () => {
            if (input.value.length >= 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        };

        // الرجوع التلقائي للخانة السابقة عند الضغط على زر مسح (Backspace)
        input.onkeydown = (e) => {
            if (e.key === "Backspace" && input.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        };
    });
}


const span = document.querySelector('.reset_code span');
const text = document.querySelector('.reset_code a');
let counter = parseInt(span.innerText);

let timer = setInterval(() => {

    counter--;
    span.innerText = counter;
    if (counter == 57) {
        clearInterval(timer);
        text.style.display='inline';
        text.style.marginRight = "25px";
        span.style.display='none';
        text.style.fontWeight = 600;

    }
}, 1000);


const btn_forget = document.querySelector('.btn-forget');
let input_text1 = document.querySelector('.input-text1');
let input_text2 = document.querySelector('.input-text2');
let input_text3 = document.querySelector('.input-text3');
let input_text4 = document.querySelector('.input-text4');

btn_forget.onclick = (e) => {
    e.preventDefault();
    if (input_text1.value.length > 0
        && input_text2.value.length > 0
        && input_text3.value.length > 0
        && input_text4.value.length > 0) {
        window.location.href = "ressetpassotp.html";
    } else {
        alert("Please fill in the email field first!");
    }
}
