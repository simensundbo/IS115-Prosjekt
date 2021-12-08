const GetTime = () => {
    let date = new Date()
    let hour = date.getHours()
    let min = date.getMinutes()
    let sec = date.getSeconds()
    console.log(hour + ":" + min + ":" + sec)

    setInterval(GetTime, 1000)
}


const searchSuggestion = () => {
    let search = document.getElementById('search');
    let suggestion = document.getElementById('suggestion');

    let searchValue = search.value;

    const suggestionview = (resultat) => {
        let li_liste = "";
        for(i = 0; i < resultat.length; i++){

            console.log(resultat[i].id);

            li_liste += '<li class="list-group-item     list-group-item-action">';
            li_liste += '<a class="text-center" href="/memberProfile/' + resultat[i].id + '">';
            li_liste += resultat[i].fname + " " + resultat[i].lname;
            li_liste += '</a>';
            li_liste += '</li>';
        }
        suggestion.innerHTML = li_liste;
    }
    
    if(searchValue.length < 2){
        suggestion.innerHTML = 'Skriv minst to bokstaver';
        return;
    }else{
        console.log(searchValue);
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/getsearchsuggestion/'+ searchValue, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let resultat = xhr.responseText;
                console.log(resultat);
                resultat = JSON.parse(resultat);

                suggestionview(resultat);
            }
        };
        xhr.send();
    }
}

const getFilter = (id) => {

    const showResult = (resultat) => {
        let tr = [];
        let tbody = document.getElementById('async');

        document.getElementById('interest').innerHTML = "Interesse: " + resultat[0].name;

        for(i = 0; i < resultat.length; i++){
            tr += "<tr>"
            tr += "<td >" + resultat[i].fname + "</td>"
            tr += "<td >" + resultat[i].lname + "</td>"
            tr += "<td >" + resultat[i].email + "</td>"
            tr += "<td >" + resultat[i].mobile_nr + "</td>"
            tr += "</tr>"
        }
        console.log(tr)
        tbody.innerHTML = tr;   
    }

    const emtyResult = () => {
        let tr = [];
        let tbody = document.getElementById('async');

        document.getElementById('interest').innerHTML = "Ingen har denne interessen &#128560";

        tr += "<tr></tr>";
        tbody.innerHTML = tr; 

    }

    let xhr = new XMLHttpRequest();

    xhr.open('POST', '/filterInterestsAsync/'+ id , true);
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let resultat = xhr.responseText;
            resultat = JSON.parse(resultat);
            console.log(resultat);

            if(resultat.length > 0){
                showResult(resultat);
            }else{
                emtyResult();
            } 
        }
    };
}
