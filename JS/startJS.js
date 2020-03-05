import { getProducts } from "./productJS.js"
import { getCategories } from "./categoryJS.js"
import { makeRequest } from "./requestHandler.js"
import { count } from "./productJS.js"

let myPagesIcon = document.getElementsByClassName("userIcon")[0]
// let signOutBitton = document.getElementbywhatever
if (sessionStorage.inloggedUserId && sessionStorage.inloggedUserId != "") {
    myPagesIcon.style.display = "inherit"
    // signOutBitton.style.display = "inherit"
}
else {
    myPagesIcon.style.display = "none"
    // signOutBitton.style.display = "inherit"

}

window.onload = init()

function init() {
    getProducts()
    getCategories()
    checkInloggedUser()
    count()
}




function checkInloggedUser() {
    makeRequest("../API/recivers/userReciver.php", "GET", null, (result) => {
        console.log(result)
    })
}