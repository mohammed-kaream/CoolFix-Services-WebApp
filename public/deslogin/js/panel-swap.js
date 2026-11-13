// // COOLFIX — animated panel swap between Sign In and Forgot Password
// document.addEventListener('DOMContentLoaded', function () {
//   var container = document.querySelector('.container');
//   if (!container) return;

//   // Entrance animation plays automatically via CSS (@keyframes) — no JS
//   // needed for it. We just intercept the swap-nav links to play the exit
//   // flip before leaving the page.
//   var links = document.querySelectorAll('.swap-nav');
//   links.forEach(function (link) {
//     link.addEventListener('click', function (e) {
//       var href = link.getAttribute('href');
//       if (!href) return;
//       e.preventDefault();

//       container.classList.add('swap-anim');

//       window.setTimeout(function () {
//         window.location.href = href;
//       }, 160);
//     });
//   });
// });

// COOLFIX — animated panel swap between Sign In and Forgot Password
document.addEventListener('DOMContentLoaded', function () {
    var container = document.querySelector('.container');
    if (!container) return;

    var links = document.querySelectorAll('.swap-nav');
    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            var href = link.getAttribute('href');
            if (!href || href === '#' || href.endsWith('.html')) return; // حماية ضد الروابط القديمة

            e.preventDefault();
            container.classList.add('swap-anim');

            window.setTimeout(function () {
                window.location.href = href;
            }, 160);
        });
    });
});
