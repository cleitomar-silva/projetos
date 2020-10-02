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
    <form id="form" class="formpos">
<!--    Select the pdf to upload:-->
      <input type="file" name="fileToUpload[]" id="fileToUpload" accept="application/pdf" multiple>
      <div><p id="drag">Drop your files here or click to select them</p>

      </div>
      
      <button id="submitbtn" type="submit" onclick="return check()" >Upload</button>


      <input type="hidden" id="fecha" name="fecha_copy" value="'.$fecha.'" />
      <input type="hidden" id="vendor" name="vendorname" value="'.$vendor.'" />
      <input type="hidden" id="sku" name="sku" value="'.$sku.'"" />
    </form>
    <h1 style="width: 500px!important;margin:20px auto 0px!important;font-size:24px!important;">File list:</h1>
    <div id="filelist" style="width: 500px!important;margin:10px auto 0px!important;">Nothing selected yet</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  var clon = {};  // will be my FileList clone
  var removedkeys = 0; // removed keys counter for later processing the request
  var NextId = 0; // counter to add entries to the clone and not replace existing ones

  $('#form #submitbtn').on("click",function(e){
      e.preventDefault();
  });

  jQuery(document).ready(function(){
    jQuery("#form #fileToUpload").change(function () {

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

      if (NextId === 0){
          jQuery("#filelist").html("");
          for(var i=0; i<curFiles.length; i++) {
              var f = curFiles[i];
              jQuery("#filelist").append("<p id=\"file"+i+"\" style=\'margin-bottom: 3px!important;\'>" + f.name + "<a style=\"float:right;cursor:pointer;\" onclick=\"BorrarFile("+i+")\">x</a></p>"); // the function BorrarFile will handle file deletion from the clone by file id
          }
      }else{
          for(var i=0; i<curFiles.length; i++) {
              var f = curFiles[i];
              jQuery("#filelist").append("<p id=\"file"+(i+NextId-curFiles.length)+"\" style=\'margin-bottom: 3px!important;\'>" + f.name + "<a style=\"float:right;cursor:pointer;\" onclick=\"BorrarFile("+(i+NextId-curFiles.length)+")\">x</a></p>"); // yeap, i+NextId-curFiles.length actually gets it right
          }        
      }
      // update the total files count wherever you want
      jQuery("#form p").text(Object.keys(clon).length + " file(s) selected");
    });
  });

  function BorrarFile(id) // handling file deletion from clone
  { 
    jQuery("#file"+id).remove(); // remove the html filelist element
    delete clon[id]; // delete the entry
    removedkeys++; // add to removed keys counter
    if (Object.keys(clon).length === 0){
        jQuery("#form p").text(Object.keys(clon).length + " file(s) selected");
        jQuery("#fileToUpload").val(""); // I had to reset the form file input for my form check function before submission. Else it would send even though my clone was empty
    }else{
        jQuery("#form p").text(Object.keys(clon).length + " file(s) selected");
    }
  }
// now my form check function

  function check()
  {
    if( document.getElementById("fileToUpload").files.length == 0 ){
        alert("No file selected");
        return false;
    }else{
        var _validFileExtensions = [".pdf", ".PDF"]; // I wanted pdf files
        // retrieve input files
        var arrInputs = clon;

      // validating files
      for (var i = 0; i < Object.keys(arrInputs).length+removedkeys; i++) {
        if (typeof arrInputs[i]!="undefined"){
          var oInput = arrInputs[i];
          if (oInput.type == "application/pdf") {
              var sFileName = oInput.name;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                      blnValid = true;
                      break;
                    }
                  }
                  if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                  }
              }
          }else{
          alert("Sorry, " + arrInputs[0].name + " is invalid, allowed extensions are: " + _validFileExtensions.join(" or "));
          return false;
          }
        }
      }

    // proceed with the data appending and submission
    // here some hidden input values i had previously set. Now retrieving them for submission. My form wasn't actually even a form...
    var fecha = jQuery("#fecha").val();
    var vendor = jQuery("#vendor").val();
    var sku = jQuery("#sku").val();
    // create the formdata object
    var formData = new FormData();
    formData.append("fecha", fecha);
    formData.append("vendor", encodeURI(vendor));
    formData.append("sku", sku);
    // now appending the clone file data (finally!)
    var fila = clon; // i just did this because I had already written the following using the "fila" object, so I copy my clone again
    // the interesting part. As entries in my clone object aren't consecutive numbers I cannot iterate normally, so I came up with the following idea
    for (i = 0; i < Object.keys(fila).length+removedkeys; i++) { 
        if(typeof fila[i]!="undefined"){
            formData.append("fileToUpload[]", fila[i]); // VERY IMPORTANT the formdata key for the files HAS to be an array. It will be later retrieved as $_FILES['fileToUpload']['temp_name'][i]
        }
    }
    jQuery("#submitbtn").fadeOut("slow"); // remove the upload btn so it can't be used again
    jQuery("#drag").html(""); // clearing the output message element
    // start the request
    var xhttp = new XMLHttpRequest();
    xhttp.addEventListener("progress", function(e) {
            var done = e.position || e.loaded, total = e.totalSize || e.total;
        }, false);
        if ( xhttp.upload ) {
            xhttp.upload.onprogress = function(e) {
                var done = e.position || e.loaded, total = e.totalSize || e.total;
                var percent = done / total;
                jQuery("#drag").html(Math.round(percent * 100) + "%");
            };
        }
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var respuesta = this.responseText;
        jQuery("#drag").html(respuesta);
        }
      };
      xhttp.open("POST", "upload.php", true);  
      xhttp.send(formData);
    return true;
    }
  };

</script>
</body>
</html>