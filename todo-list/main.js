//Adicionando uma nova tarefa
function newTask(){
    var htmlValue = document.getElementById("Input").value;
    if(htmlValue === ""){
        alert("O campo não pode estar em branco!");
    }else{
        var ul = document.getElementById("lista");
        ul.insertAdjacentHTML("beforeend","<li class=\"listaFilhos\"><a class=\"btnRemove\">-</a>"+ htmlValue +"</li>");
        
        atualizandoIndexs = remove;
        atualizandoIndexs();
    }   
}
var idAdicionar = document.querySelector("#btnAdicionar");
idAdicionar.addEventListener('click',newTask);

//Permissão para criar uma nova tarefa apertando o enter
function enter(e){
    if(e.key === "Enter"){
        newTask();
    }
}
var input = document.querySelector("#Input");
input.addEventListener('keypress',enter);

//Removendo uma tarefa de acordo com seu index no <ul>
function remove(){
    var close = document.getElementsByClassName("btnRemove");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }
}
remove(); //Tem que executar uma vez ao carregar o js caso a ul não esteja vazia

