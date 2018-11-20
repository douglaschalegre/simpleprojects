function relogio(){
    var time = new Date()
    h = time.getHours();
    m = time.getMinutes();
    s = time.getSeconds();
    
    var horas = (h < 10 ? "0" : "") + h + ":" + (m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s

    document.getElementById("relogio").innerHTML = horas;
    
    setTimeout(relogio,1000)
    
}

function relogioBugado(){
        
    var horas = ("??:??:??");

    document.getElementById("relogio").innerHTML = horas;   
}

