var ajax = new XMLHttpRequest()

selectList()
function selectList(){
    ajax.open('GET', 'BookListClient.php')

        ajax.onreadystatechange = () =>{

            if(ajax.readyState == 4 && ajax.status == 200){

                let responseJson = JSON.parse(ajax.responseText)

                responseJson.forEach(element => {

                    books.innerHTML += `<option value = "${element.ID_BOOK}">${element.NAME_BOOK}</option>`
                    
                })              

            }
        }
    ajax.send()
}

function register(){

    let id_customer = document.getElementById('id_customer').value
    let name_customer = document.getElementById('name_customer').value
    let phone = document.getElementById('phone').value
    let gender_customer = document.querySelector('input[name="gender_customer"]:checked').value
    let birth = document.getElementById('birth').value
  
    var formData = new FormData()

    formData.append('ID_CUSTOMER', id_customer)
    formData.append('ID_BOOK', books.value)
    formData.append('NAME_CUSTOMER', name_customer)
    formData.append('PHONE', phone)
    formData.append('GENDER_CUSTOMER', gender_customer)
    formData.append('BIRTH', birth)

    ajax.open("POST", 'RegisterClient.php')

    ajax.onreadystatechange = () =>{

        if(ajax.readyState == 4 && ajax.status == 200){
          
            window.alert(ajax.responseText)

            if(ajax.status == 200){

                windows.location.reload(true)

            }
    
        }
        
    }

    ajax.send(formData)
    
}
