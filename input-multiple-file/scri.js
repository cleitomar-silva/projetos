$(function() {
      const form = document.getElementById("upload_producao"),
        loading = document.querySelector('.loading');

      form.addEventListener("submit", function(event) {
        event.preventDefault();
        loading.style.display = "block";
        this.submit();
      });
    });

    $(function() 
    {
      const inputElement = document.getElementById("files"),
        filesContainer = document.getElementById("files-container"),
        fileNum = document.getElementById("fileNum"),
        fileSize = document.getElementById("fileSize");

      inputElement.addEventListener("change", handleFiles, false);

      function formatSize(sizeBytes) {
        let sOutput;
        const multiples = ["KB", "MB", "GB"];
        for (i = 0, size = sizeBytes / 1024; size > 1; size /= 1024, i++) {
          sOutput = size.toFixed(2) + " " + multiples[i];
        }
        return sOutput;
      }

      function handleFiles() {
          let sizeTotal = 0,
          fileList = this.files,
          filesNumber = fileList.length;

          filesNumber ? filesContainer.style.display = "block" : filesContainer.style.display = "none";

          const table = document.getElementById("files-list");
          table.innerHTML = "";
          if (filesNumber) {

          for (let i = 0; i < filesNumber; i++) {
            sizeTotal += fileList[i].size;
            let row = table.insertRow();

            let name = row.insertCell(0);
            name.innerHTML = fileList[i].name;
            
            let size = row.insertCell(1);
            size.innerHTML = formatSize(fileList[i].size);

            let remover = row.insertCell(2);
            remover.innerHTML = `<i class="fa fa-trash-alt remove-row" id="remove-row-`+i+`" style="color:red; cursor: pointer;" title="remover"></i>`;
            
           
         
            
            $( "#remove-row-"+i ).click(function() { 
              //var teste = $('input:file#files')[0].files
              var teste = $('input:file#files').val()
              //var arquivo = Object.values(teste)                         
               
                
            
              //arquivo.innerHTML = teste
              console.log(teste)
               
              $(row).remove()   
              $('#files').val("");
              fileNum.innerHTML = '0'
              fileSize.innerHTML = "0"
              
            
              
            });

          }








        }

        fileNum.innerHTML = filesNumber;
        fileSize.innerHTML = formatSize(sizeTotal);
        sizeTotal > 157286400 ? fileSize.style.color = 'red' : fileSize.style.color = 'black';
      }
    });