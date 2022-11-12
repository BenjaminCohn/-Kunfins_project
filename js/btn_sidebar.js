let condition = false

let imgCle = document.querySelector('.cle');
let sideBarMenu = document.querySelector('.sidebar');
imgCle.addEventListener('click', () => {
    if (condition) {
        sideBarMenu.style.display = "none"
        imgCle.style.opacity = "0.5"
        condition = !condition
    } else {
    sideBarMenu.style.display = "block"
    imgCle.style.opacity = "1"
    condition = !condition
    }
})

sideBarMenu.addEventListener('click', () => {
    if (condition) {
        sideBarMenu.style.display = "none"
        imgCle.style.opacity = "0.5"
        condition = !condition
    }
})