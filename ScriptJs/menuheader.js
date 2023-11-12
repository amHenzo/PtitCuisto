function menuHeader() {
    if(document.getElementById('menuHeader-checkbox').checked) {
        document.getElementById('menuHeader-content').classList.add('menuHeader-content-show');
        document.getElementById('menuHeader-content').classList.remove('menuHeader-content-hide');
    }
    else {
        document.getElementById('menuHeader-content').classList.remove('menuHeader-content-show');
        document.getElementById('menuHeader-content').classList.add('menuHeader-content-hide');
    }
}

$(document).ready(function(){
    $("#myBtnConnexion").click(function(){
        $("#myModalConnexion").prependTo("body");
      $("#myModalConnexion").modal();
      
    });
    $("#myBtnCategorie").click(function(){
        $("#myModalCategorie").prependTo("body");
      $("#myModalCategorie").modal();
      
    });
    $("#myBtnTitre").click(function(){
        $("#myModalTitre").prependTo("body");
      $("#myModalTitre").modal();
      
    });
    
    $("#myBtnIngredients").click(function(){
        $("#myModalIngredients").prependTo("body");
      $("#myModalIngredients").modal();
      
    });
    $("#myBtnFiltres").click(function(){
        let menuelm=document.querySelectorAll(".dropdown-menu li");
        let menu2= document.querySelectorAll(".menuHeader-content-show li");
        
        console.log(menuelm);
        console.log(menu2);

        for (let index = 0; index < menu2.length; index++) {
            while(menu2[index].firstChild){
                menu2[index].removeChild(menu2[index].firstChild);
            }
            menu2[index].appendChild(menuelm[index]);
            
        }
        

    });

        
    
  });
  