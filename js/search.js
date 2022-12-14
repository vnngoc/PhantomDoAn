const search = () =>{
    const searchBox = document.getElementById("search-input").value.toUpperCase();
    const storeItems = document.getElementById("game-content")
    const gameBox = document.querySelectorAll(".box")
    const gameName = storeItems.getElementsByTagName("h2")
    // const maxItem = 12;
    // let index=1;
        for(var i=0; i < gameName.length; i++)
        {
            let match = gameBox[i].getElementsByTagName('h2')[0];
            if(match)
            {
                let textValue = match.textContent || match.innerHTML
    
                if(textValue.toUpperCase().indexOf(searchBox) > -1 )
                {
                    gameBox[i].classList.remove("hide");
                    gameBox[i].classList.add("show");
                   
                }
           
                else
                {
                    gameBox[i].classList.remove("show");
                    gameBox[i].classList.add("hide");

                }
            }
           
        }

}
