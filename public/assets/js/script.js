function test() {
    console.log('Test')

    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let resultat = xhr.responseText;
            console.log(resultat);

            let element = document.getElementById('users');

            element.innerHTML = resultat;
            
        }
    };

    xhr.open('GET', '/users', true);
    xhr.send();
}