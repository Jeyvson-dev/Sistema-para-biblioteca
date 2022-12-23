var ajax = new XMLHttpRequest()
var formData = new FormData()
function bookRegister(){
    let bookTitle = document.getElementById('bookTitle').value
    let bookPages = document.getElementById('bookPages').value

    formData.append('NAME_BOOK', bookTitle)
    formData.append('QUANTITY_PAGES', bookPages)

    ajax.open('POST','BookRegisterClient.php')

        ajax.onreadystatechange = () =>{

            if(ajax.readyState == 4 && ajax.status == 200){

                window.alert(ajax.responseText)

                    if(ajax.status == 200){

                        window.location.reload(true)
                        
                    }
            }

        }

    ajax.send(formData)

}