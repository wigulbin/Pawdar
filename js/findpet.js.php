<?php
    session_start();
?>


$(document).ready(function(){
    var number = 0;
    var species;
    var sizePotential;
    var radius;
    var breed;
    var zipcode;
    var check = 1;
    var foundRows=1;
    var marks = <?php
                    if(isset($_SESSION['data']) && !empty($_SESSION['data'])){
                        echo $_SESSION['data'];
                    }else{
                        echo 0;
                    }
                ?>;
    <?php unset($_SESSION['data']) ?>
    var zip_code = <?php 
                        if(isset($_SESSION['zip_code']) && !empty($_SESSION['zip_code'])){
                            echo $_SESSION['zip_code'];
                        }else{
                            echo 0;
                        }
                    ?>;
    <?php 
        unset($_SESSION['zip_code']);
    ?>
    console.log(marks);
    if(marks != 0){
        $("#pet-form").append("<input type='hidden' id='zip_code' name='zip_code' value='"+zip_code+"'/>");
        $("#pets").removeClass("hide");
        for(item in marks.data){
            $(".item").append("<div class='col-xl-4 col-md-4 col-xs-12 space "+item+"'></div>")
            for(items in marks.data[item]){
                console.log(items);
                if(items=="animalThumbnailUrl"){
                    $("."+item).prepend("<img src='"+marks.data[item][items]+"'</img>");
                }else if(items=="animalBreed"){
                    $("."+item).append("<li class='list-group-item'><b>"+items+": </b>"+marks.data[item][items].split('/')[0]+"</li>");
                }else if(items=="animalOrgID"){    
                    $("."+item).append("<li class='list-group-item'><b> </b><form target='_blank' action='php/getorg.php'><input type='hidden' id='orgID' name='orgID' value='"
                                +marks.data[item][items]+"'/><input target='_blank' class='btn btn-primary' type='submit' value='Org Info'/></form></li>");
                }else{
                    $("."+item).append("<li class='list-group-item'><b>"+items+": </b>"+marks.data[item][items]+"</li>");
                }
            }
                    
        }
    }
    console.log(marks);
    $(".get-pets").submit(function(event){
        var wordpattern = /^([A-Z]|[a-z])*$/;
        var numpattern = /^([0-9])*$/;
        var error = "";
        foundRows=1;
        event.preventDefault();
        console.log("test");
        //number = $('#numberof').val();
        number = parseInt(number);
        
        species = $('#animalspecies').val();
        
        sizePotential = $('#animalsize').val();
        
        radius = $('#radius').val();
        
        breed = $('#animalbreed').val();
        
        zipcode = $("#zipcode").val()
        
        
        $('#aspecies').removeClass("has-success has-feedback");
        $('#aspecies').addClass("has-error has-feedback");
        
        
        $('#abreed').removeClass("has-success has-feedback");
        $('#abreed').addClass("has-error has-feedback");
        
        
        if(!wordpattern.test(sizePotential)){
            error += "wrong size name\n";
            $('#asize').removeClass("has-success has-feedback");
            $('#asize').addClass("has-error has-feedback");
        }else{
            $('#asize').removeClass("has-error has-feedback");
            $('#asize').addClass("has-success has-feedback");
        }
        
        if(!numpattern.test(radius)){
            error += "wrong radius\n";
            $('#aradius').removeClass("has-success has-feedback");
            $('#aradius').addClass("has-error has-feedback");
        }else{
            $('#aradius').removeClass("has-error has-feedback");
            $('#aradius').addClass("has-success has-feedback");
        }
        
        if(error){
            alert(error);
            return 0;
        }
        
        //console.log(species);
        //console.log(number);
        $.ajax({
            url: 'php/apiconnect.php',
            type: 'GET',
            dataType: 'JSON',
            data: {
                number: number,
                species: species,
                sizePotential: sizePotential,
                radius: radius,
                breed: breed,
                zipcode: zipcode
            },
            
            success: function(serverResponse) {
                $("#pets").removeClass("hide");
                console.log(serverResponse.data);
                $(".item").html("");
                //$(".test").append(JSON.stringify(serverResponse));
                var jsonObject = serverResponse;
                //console.log(jsonObject);
                //console.log(jsonObject.data);
                console.log(jsonObject);
                for(item in jsonObject.data){
                    $(".item").append("<div class='col-xl-4 col-md-4 col-xs-12 space "+item+"'></div>")
                    for(items in jsonObject.data[item]){
                        console.log(items);
                        if(items=="animalThumbnailUrl"){
                            $("."+item).prepend("<img src='"+jsonObject.data[item][items]+"'</img>");
                        }else if(items=="animalBreed"){
                            $("."+item).append("<li class='list-group-item'><b>"+items+": </b>"+jsonObject.data[item][items].split('/')[0]+"</li>");
                        }else if(items=="animalOrgID"){    
                            $("."+item).append("<li class='list-group-item'><b> </b><form target='_blank' action='php/getorg.php'><input type='hidden' id='orgID' name='orgID' value='"
                                +jsonObject.data[item][items]+"'/><input target='_blank' class='btn btn-primary' type='submit' value='Org Info'/></form></li>");
                        }else{
                            $("."+item).append("<li class='list-group-item'><b>"+items+": </b>"+jsonObject.data[item][items]+"</li>");
                        }
                    }
                    
                }
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
                console.log(errorThrown);
                console.log(jqXHR);
            },
            
    
            complete: function() {
               // $("#ajaxIndicator").modal('hide');
               console.log("done");
            }
        });
    });
    $(window).scroll(function(){
        if(($(window).scrollTop() + $(window).height() == $(document).height()) && check && foundRows){
            check=0;
            console.log("Here is the number: "+number);
            number = number+20;
            var zip_code = $("#zip_code").val();
            console.log(zip_code);
            $(".img").removeClass("hide");
            var item = document.getElementById('loader');
            item.style.display="block";
            $.ajax({
            url: 'php/apiconnect.php',
            type: 'GET',
            dataType: 'JSON',
            data: {
                number: number,
                species: species,
                sizePotential: sizePotential,
                radius: radius,
                breed: breed,
                zip_code: zip_code,
                from_viewer: "true"
            },
            
            success: function(serverResponse) {
                item.style.display="none";
                console.log("Data " + serverResponse.data);
                //$(".item").html("");
                //$(".test").append(JSON.stringify(serverResponse));
                var jsonObject = serverResponse;
                //console.log(jsonObject);
                //console.log(jsonObject.data);
                console.log(jsonObject);
                console.log(serverResponse.foundRows);
                if(serverResponse.foundRows == 0){
                    foundRows=0;
                }
                for(item in jsonObject.data){
                    $(".item").append("<div class='col-xl-4 col-md-4 col-xs-12 space "+item+"'></div>");
                    for(items in jsonObject.data[item]){
                        //console.log(items);
                       if(items=="animalThumbnailUrl"){
                            $("."+item).prepend("<img src='"+jsonObject.data[item][items]+"'</img>");
                        }else if(items=="animalBreed"){
                            $("."+item).append("<li class='list-group-item'>"+jsonObject.data[item][items].split('/')[0]+"</li>");
                        }else if(items=="animalOrgID"){    
                                $("."+item).append("<li class='list-group-item'><b> </b><form target='_blank' action='php/getorg.php'><input type='hidden' id='orgID' name='orgID' value='"
                                +jsonObject.data[item][items]+"'/><input target='_blank' class='btn btn-primary' type='submit' value='Org Info'/></form></li>");
                        }else{
                            $("."+item).append("<li class='list-group-item'>"+jsonObject.data[item][items]+"</li>");
                        }
                    }
                    
                }
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                item.style.display="none";
                console.log('error');
                console.log(errorThrown);
                console.log(jqXHR);
            },
            
    
            complete: function() {
                check=1;
                //$(".img").removeClass("hide");
               
                //$(".img-loader").remove();
               // $("#ajaxIndicator").modal('hide');
               console.log("done");
            }
        });
        }
   
    }) 
});