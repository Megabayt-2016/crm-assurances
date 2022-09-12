

const fileName = document.querySelector(".file-name");
const defualtBtn = document.querySelector("#default-btn");
const customBtn = document.querySelector("#custom-btn");
let regExp = /[0-9a-zA-Z]\^\&\'\@\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

function defaultBtnActive(){
    defualtBtn.click();
}

defualtBtn.addEventListener("change", function(){
     const file =this.files[0];
     if(file){
         const reader = new FileReader();
         reader.onload = function(){
            const result = reader.result;
        }
        reader.readAsDataURL(file);
     }
     if(this.value){
         let ValueStore = this.value.match(regExp);
         fileName.textContent = ValueStore;
     }

     
});

