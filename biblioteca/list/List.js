var table = document.getElementById('tableList')
var ajax = new XMLHttpRequest()
var formData = new FormData()

showCustomerinTable()
function showCustomerinTable() {
    ajax.open('GET', 'ListUserClient.php')

    ajax.onreadystatechange = () => {

        if (ajax.readyState == 4 && ajax.status == 200) {

            let JsonAjaxResponse = JSON.parse(ajax.responseText)

            JsonAjaxResponse.forEach(element => {

                table.innerHTML += `<td>${element.NAME_CUSTOMER}</td>
                <td>${element.PHONE}</td>
                <td>${element.NAME_BOOK}</td>
                <td>${element.GENDER_CUSTOMER}</td>
                <td>${element.BIRTH}</td>
                <td><button type="button" class="btn btn-info" onclick = "returned(${element.ID},${element.ID_BOOK})">Devolvido</button></td>
                `
            });

        }

    }

    ajax.send()

}

function returned(ID, ID_BOOK) {

    formData.append('ID', ID)
    formData.append('ID_BOOK', ID_BOOK)

    ajax.open('POST', '../delete/DeleteClient.php')

    ajax.onreadystatechange = () => {

        if (ajax.readyState == 4 && ajax.status == 200) {

            window.alert(ajax.responseText)

            if (ajax.status == 200) {

                window.location.reload(true)

            }

        }

    }

    ajax.send(formData)

}

function searchCustomer() {

    let ajax2 = new XMLHttpRequest()
    let formData2 = new FormData()

    let searchBar = document.getElementById('searchBar').value

    formData2.append('namePiece', searchBar)

    ajax2.open('POST', 'searchCustomerClient.php')

    ajax2.onreadystatechange = () => {

        if (ajax2.readyState == 4 && ajax2.status == 200) {

            let searchCustomer = JSON.parse(ajax2.responseText)

            table.innerHTML = `<tr>
                                     <th scope="col">Nome</ht>
                                     <th scope="col">Telefone</th>
                                     <th scope="col">Livro</th>
                                     <th scope="col">Sexo</th>
                                     <th scope="col">Data de Nascimento</th>
                                     <th scope="col">Atualização</th>
                                     </tr>
                                     </tr>                 
                                  `

            searchCustomer.forEach(element => {

                table.innerHTML += `<td>${element.NAME_CUSTOMER}</td>
                                    <td>${element.PHONE}</td>
                                    <td>${element.NAME_BOOK}</td>
                                    <td>${element.GENDER_CUSTOMER}</td>
                                    <td>${element.BIRTH}</td>
                                    <td><button type="button" class="btn btn-info" onclick = "returned(${element.ID},${element.ID_BOOK})">Devolvido</button></td>
                                    `
            });

        }

    }

    ajax2.send(formData2)

}