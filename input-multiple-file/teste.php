<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="">
    <style type="text/css">
        .formpos{
  width: 500px;
  height: 200px;
  border: 4px dashed #999;
  margin: 30px auto 100px;
 }
.formpos  p{
  text-align: center!important;
  padding: 80px 30px 0px;
  color: #000;
}
.formpos  div{
  width: 100%!important;
  height: 100%!important;
  text-align: center!important;
  margin-bottom: 30px!important;
}
.formpos input{
  position: absolute!important;
  margin: 0!important;
  padding: 0!important;
  width: 500px!important;
  height: 200px!important;
  outline: none!important;
  opacity: 0!important;
}
.formpos button{
  margin: 0;
  color: #fff;
  background: #16a085;
  border: none;
  width: 508px;
  height: 35px;
  margin-left: -4px;
  border-radius: 4px;
  transition: all .2s ease;
  outline: none;
}
.formpos button:hover{
  background: #149174;
  color: #0C5645;
}
.formpos button:active{
  border:0;
}
    </style>
</head>
<body>
    <div id="upload_producao" class="formpos">
<!--    Select the pdf to upload:-->
      <input type="file" name="files[]" id="files" accept="application/pdf" multiple>
      <div><p id="drag">Drop your files here or click to select them</p>
      </div>
      <button id="submitbtn" onclick="return check()" >Upload</button>
    
      
    </div>
    <h1 style="width: 500px!important;margin:20px auto 0px!important;font-size:24px!important;">File list:</h1>
   <!-- <div id="filelist" style="width: 500px!important;margin:10px auto 0px!important;">Nothing selected yet</div>-->
    
    <table class="table" width="100%">
      <thead>
          <tr>
              <td>Nome</td>
              <td>Acao</td>
          </tr>
      </thead>
      <tbody id="files-list"></tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        var clon = {};  // will be my FileList clone
        var removedkeys = 0; // removed keys counter for later processing the request
        var NextId = 0; // counter to add entries to the clone and not replace existing ones

        
        
        jQuery(document).ready(function()
        {


            jQuery("#upload_producao input").change(function () {

            // making the clone
            var curFiles = this.files;
            // temporary object clone before copying info to the clone
            var temparr = jQuery.extend(true, {}, curFiles);
            // delete unnecessary FileList keys that were cloned
            delete temparr["length"];
            delete temparr["item"];

            if (Object.keys(clon).length === 0){
               jQuery.extend(true, clon, temparr);
            }else{
               var keysArr = Object.keys(clon);
               NextId = Math.max.apply(null, keysArr)+1; // FileList keys are numbers
               if (NextId < curFiles.length){ // a bug I found and had to solve for not replacing my temparr keys...
                  NextId = curFiles.length;
               }
               for (var key in temparr) { // I have to rename new entries for not overwriting existing keys in clon
                  if (temparr.hasOwnProperty(key)) {
                     temparr[NextId] = temparr[key];
                     delete temparr[key];
                        // meter aca los cambios de id en los html tags con el nuevo NextId
                        NextId++;
                  }
               } 
               jQuery.extend(true, clon, temparr); // copy new entries to clon
            }

        // modifying the html file list display

            if (NextId === 0)
            {
                jQuery("#files-list").html("");
                for(var i=0; i<curFiles.length; i++) {
                    var f = curFiles[i];
                    jQuery("#files-list").append(`<tr id="file`+i+`">
                                                    <td>`+ f.name +`</td>
                                                    <td onclick="BorrarFile(`+i+`)">X</td>
                                                  </tr>`); 

                // the function BorrarFile will handle file deletion from the clone by file id

                
            }
            }else{
                for(var i=0; i<curFiles.length; i++) {
                    var f = curFiles[i];
                    jQuery("#files-list").append(`<tr id="file`+(i+NextId-curFiles.length)+`">
                                                    <td>`+ f.name +`</td>
                                                    <td onclick="BorrarFile(`+(i+NextId-curFiles.length)+`)">X</td>
                                                  </tr>`); // yeap, i+NextId-curFiles.length actually gets it right
                

                }        
            }
            // update the total files count wherever you want
            jQuery("#upload_producao p").text(Object.keys(clon).length + " file(s) selected");
                });
            });

            function BorrarFile(id){ // handling file deletion from clone
                jQuery("#file"+id).remove(); // remove the html filelist element
                delete clon[id]; // delete the entry
                removedkeys++; // add to removed keys counter
                if (Object.keys(clon).length === 0){
                    jQuery("#upload_producao p").text(Object.keys(clon).length + " file(s) selected");
                    jQuery("#files").val(""); // I had to reset the form file input for my form check function before submission. Else it would send even though my clone was empty
                }else{
                    jQuery("#upload_producao p").text(Object.keys(clon).length + " file(s) selected");
                }
            }
        // now my form check function



    </script>
</body>
</html>