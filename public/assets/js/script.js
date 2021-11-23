function test() {
    console.log('Test')

    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let resultat = xhr.responseText;
            console.log(resultat);

            let element = document.getElementById('users');

            element.innerHTML = resultat;
            
        }else{
            console.log("Error")
        }
    };

    xhr.open('GET', '/users', true);
    xhr.send();
}


const GetTime = () => {
    let date = new Date()
    let hour = date.getHours()
    let min = date.getMinutes()
    let sec = date.getSeconds()
    console.log(hour + ":" + min + ":" + sec)

    setInterval(GetTime, 1000)
}