$(function(){

  // VARIABLES
  var products = Array();
  var prods = Array();
  var products = Array();
  var total_vente = 0;
  var total_general = 0;

  // VERIFIER INPUTS
  $("input").on("focusout", (e)=>{
    if(e.target.name != "date"){
      if(e.target.value === ""){
        $(e.target).addClass("is-invalid");
      }else{
        $(e.target).removeClass("is-invalid");
        $(e.target).addClass("is-valid");
      }
    }

  });

  // CHOISIR UN CLIENT
  $("#clients").on("dblclick", ".list-group-item", (e)=>{
    var id = e.target.getAttribute("client");
    var data = null;
    $.get('/api/client/'+id, function(resp){
      $.map($(".card-content").find("input"), function(input){
        if(input["name"] == "nom_client"){
          data = resp["nom"];
        }else{
          data = resp[input["name"]];
        }

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
          "<i class='fas fa-times float-right del_prod'></i>",
          "<br><b class='vente'>Prix Vente : ",
          $(product).find('input[name="prix_vente"]')[0].value,
          "DH</b>",
          "<br><b class='general'>Prix General : ",
          $(product).find('.prixG')[0].innerHTML,
          "DH</b>",
          "<br><b class='qte'>Quantité : ",
          $(product).find('input[name="qte"]')[0].value,
          "</b>",
          "</li>",
        ].join('');
        prods.push(p);
        var qte = parseInt($(product).find('input[name="qte"]')[0].value);
        total_general += parseInt($(product).find('.prixG')[0].innerHTML) * qte;
        total_vente += parseInt($(product).find('input[name="prix_vente"]')[0].value) * qte;
        products.push({
          "id" : $(product).attr("productId"),
          "prix_vente" : $(product).find('input[name="prix_vente"]')[0].value,
          "prix_general" : $(product).find('.prixG')[0].innerHTML,
          "qte" : $(product).find('input[name="qte"]')[0].value
        });
        $("#revenus").html("" + (total_vente - total_general) + "DH");
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
    var qte = element.find('.qte')[0].innerHTML;
    qte = parseInt(qte.substr(11,4));
    var price = element.find(".vente")[0].innerHTML;
    price = price.substr(13,6);
    total_vente -= parseInt(price)*qte;
    price = element.find('.general')[0].innerHTML;
    price = price.substr(15,6);
    total_general -= parseInt(price)*qte;
    $("#revenus").html("" + (total_vente - total_general) + "DH");
    element.remove();
    var id = $("div[product='"+id+"']").attr("productId");
    products = products.filter((e)=>{
      if(e.id != id){
        return e;
      }
    });
  });
  // AJOUTER UNE COMMANDE
  $("#ajouter").on("click", ()=>{
    if(!products.length){
      alert("Vous-devez ajouter un produit");
      return false;
    }
    data = {};
    var valid = true;
    $.map($("#commande input"), (input)=>{
      if($(input).hasClass('is-invalid') || $(input).val() === ""){
        if($(input).attr("name") != "date"){
          alert("Le champ "+input.name+" est obligatoire");
          valid = false;
          return false;
        }

      }
    })[0];
    if(valid){
      $.map($("#commande").find("input, select, textarea"), (input)=>{
        data[input.name] = input.value;
      });
      data["products"] = products;
      data["prix"] = total_vente - total_general;
      console.log(data);
      $.post('/api/add/commande', data, (resp)=>{
        if(resp == 1){
          window.location = "/dashboard/commandes";
        }else{
          console.log(resp);
        }
      });
    }
  });
});
