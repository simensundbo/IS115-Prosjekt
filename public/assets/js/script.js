const GetTime = () => {
    let date = new Date()
    let hour = date.getHours()
    let min = date.getMinutes()
    let sec = date.getSeconds()
    console.log(hour + ":" + min + ":" + sec)

    setInterval(GetTime, 1000)
}


const searchSuggestion = () => {
    let search = document.getElementById('search')
    let suggestion = document.getElementById('suggestion')

    let searchValue = search.value

    const suggestionview = (resultat) => {
        let li_liste = "";
        for(i = 0; i < resultat.length; i++){

            console.log(resultat[i].id)

            li_liste += '<li class="list-group-item     list-group-item-action">'
            li_liste += '<a class="text-center" href="/memberProfile/' + resultat[i].id + '">'
            li_liste += resultat[i].fname + " " + resultat[i].lname
            li_liste += '</a>'
            li_liste += '</li>'
        }

        suggestion.innerHTML = li_liste
    }
    
    
    if(searchValue.length < 3){
        suggestion.innerHTML = 'Skriv minst 3 bokstaver'
        return;
    }else{
        console.log(searchValue)

        let xhr = new XMLHttpRequest();

        xhr.open('GET', '/getsearchsuggestion/'+ searchValue, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let resultat = xhr.responseText;
                console.log(resultat);
                resultat = JSON.parse(resultat)

                suggestionview(resultat)
                
            }
        };
    
        xhr.send();

    }

    
}
