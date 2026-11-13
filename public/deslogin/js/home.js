const allQuestions = document.querySelectorAll('.qustion .box-qustion');

allQuestions.forEach((box) => {

    let plus = box.querySelector('.img2');
    let mins = box.querySelector('.img1');
    let para = box.querySelector('p');

    plus.onclick = () => {
        plus.style.opacity = 0;
        mins.style.opacity = 1;
        para.style.display = "grid";
    }

    mins.onclick = () => {
        mins.style.opacity = 0;
        plus.style.opacity = 1;
        para.style.display = "none";
    }
});
