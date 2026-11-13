let btn_forget = document.querySelector('.btn-forget');
let input_email = document.querySelector('.input-email');

btn_forget.onclick = (e) => {
    if (input_email.value.length > 0) {
    } else {
        alert("Please fill in the email field first!");
    }
}



