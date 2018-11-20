 rng = function rng(){
    randomNumberGenerator = Math.random();
    console.log(randomNumberGenerator);
    if (randomNumberGenerator >= 0.5){
        document.getElementById("rngGif").src="gifs/by2.gif";
    }else{
        document.getElementById("rngGif").src="gifs/by.gif";
    }
}