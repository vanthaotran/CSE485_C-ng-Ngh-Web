// find vars
let inputFruit = document.getElementById('inputFruit')
let btnFruit = document.getElementById('btnFruit')
let textFruit = document.getElementById('textFruit')
let imgFruit = document.getElementById('imgFruit')

btnFruit.addEventListener('click', myFunc)

function myFunc() {
    let arrFruit = ['cat', 'crocodile', 'dinosaur', 'dog', 'peppa']
    let valueFruit = inputFruit.value
    
    if(valueFruit == '') {
        window.alert('Please input!')
        inputFruit.value = ''
    } else {

        let check = false
        for(let i = 0; i < arrFruit.length; i++) {
            if(valueFruit == arrFruit[i]) {
                check = true
                alert('ok')
                break
            }
        }

        if(check == true) {
            imgFruit.scr = './img/' + valueFruit + '.jpg'
        } else {
            alert('No suitable!')
        }
    }
}