const menuIcon = document.querySelector('#burger'),
aside = document.querySelector('aside'),
closeBtn = document.querySelector('#close')
// wrapper = document.querySelector('#wrapper')


menuIcon.addEventListener('click', () => {
    aside.style.left = '0'
})

closeBtn.addEventListener('click', () => {
    aside.style.left = '-75%'
})

// wrapper.addEventListener('click', (e) => {
//     console.log(e, e.target);
//     if(e.target.nodeName !== 'ASIDE') {
//         aside.style.left = '-75%'
//     }
// })