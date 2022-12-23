var table = document.getElementById('table')
var ajax = new XMLHttpRequest()

ajax.open('GET','ListBookClient.php')

    ajax.onreadystatechange = () =>{

        if(ajax.readyState == 4 && ajax.status == 200){

            let listBook = JSON.parse(ajax.responseText)

                listBook.forEach(element => {

                    console.log(element)

                    table.innerHTML += `<tr>
                                         <td>${element.NAME_BOOK}</td>
                                         <td>${element.QUANTITY_PAGES}</td>
                                         <td>${element.STATUS}</td>
                                       </tr>`                   
                });

        }

    }

ajax.send()