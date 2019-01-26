$(function(){

  // VARIABLES
  var products = Array();
  var prods = Array();
  var products = Array();
  var total_vente = 0;
  var total_general = 0;

  // VERIFIER INPUTS
  $("input").on("focusout", (e)=>{
    if(e.target.value === ""){
      $(e.target).addClass("is-invalid");
    }else{
      $(e.target).removeClass("is-invalid");
      $(e.target).addClass("is-valid");
    }
  });

  // CHOISIR UN CLIENT
  $("#clients").on("dblclick", ".list-group-item", (e)=>{
    var id = e.target.getAttribute("client");
    var data = null;
    $.get('/api/client/'+id, function(resp){
      $.map($(".card-content").find("input"), function(input){
        data = resp[input["name"]];
        if(data != undefined){
          input.value = data;
        }
      });
      $("#clients").modal("toggle");
    });

  });

  // SELECTIONER UN PRODUIT
  $("#products").on('dblclick', '.card', function(){
    $(this).toggleClass('shadow');
  });

  // AJOUTER DES PRODUITS
  $("#close").on('click', function(){
    $.map($('#products').find('.shadow'), (product)=>{

      if($("#"+$(product).attr("product")).length == 0){
        p = [
          "<li class='list-group-item text-left' id='",
          $(product).attr("product"),
          "' >",
          $(product).find('.card-title')[0].innerHTML,
          "<i class='fa fa-close float-right del_prod'></i>",
          "<br><b class='vente'>Prix Vente : ",
          $(product).find('input[name="prix_vente"]')[0].value,
          "DH</b>",
          "<br><b class='general'>Prix General : ",
          $(product).find('.prixG')[0].innerHTML,
          "DH</b>",
          "</li>",
        ].join('');
        prods.push(p);
        total_general += parseInt($(product).find('.prixG')[0].innerHTML);
        total_vente += parseInt($(product).find('input[name="prix_vente"]')[0].value);
        products.push({
          "id" : $(product).attr("productId"),
          "prix" : $(product).find('input[name="prix_vente"]')[0].value,
          "qte" : $(product).find('input[name="qte"]')[0].value
        });
      }
    });
    $("#addProducts").append(prods.join(""));
    prods = Array();
  });

  // SUPPRIMER PRODUIT
  $("#addProducts").on("click",".del_prod", function(e){
    var element = $(e.target).parent();
    var id = element.attr("id");
    $("div[product='"+id+"']").removeClass("shadow");
    var price = element.find(".vente")[0].innerHTML;
    price = price.substr(13,6);
    total_vente -= parseInt(price);
    console.log(total_vente);
    element.remove();
  });

  $("#ajouter").on("click", ()=>{
    data = {};
    var valid = $.map($("#commande input"), (input)=>{
      if($(input).hasClass('is-invalid')){
        alert("Le champ "+input.name+" est obligatoire");
        return false;
      }
    })[0];
    if(valid){
      $.map($("#commande").find("input, select, textarea"), (input)=>{
        data[input.name] = input.value;
      });
    }
  });
});
