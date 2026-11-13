const icon_eye_openn = document.querySelector('.icon-eye-openn');
const icon_eye_slashh = document.querySelector('.icon-eye-slashh');
const input_passwordd = document.querySelector('.input-passwordd');

icon_eye_slashh.onclick = () => {
    input_passwordd.type = "text";
    icon_eye_slashh.style.display = "none";
    icon_eye_openn.style.display = "inline-block";
}


icon_eye_openn.onclick = () => {
    input_passwordd.type = "password";
    icon_eye_slashh.style.display = "inline-block";
    icon_eye_openn.style.display = "none";
}