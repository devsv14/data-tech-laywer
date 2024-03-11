

let btnaddProdcto = document.getElementById('reg-new-prod');
if(btnaddProdcto){
btnaddProdcto.addEventListener('click', ()=>{   
   let producto = document.getElementById('name-producto').value;
   let categoria = document.getElementById("cat-item-compra").value;
   console.log(categoria) 
   // Obtén el radio button seleccionado para perecedero
   let perecedero = ''
   let radioPerecedero= document.querySelector('input[name="perecedero-prod"]:checked');
   if (radioPerecedero) {
        perecedero = radioPerecedero.value;        
    } else {
        Toast.fire({icon: "error",title: "Especificar si producto es perecedero o no"});
    }
    let stock_min='';
    let radio_stock_min =  document.querySelector('input[name="stock-min-prod"]:checked');
    if (radio_stock_min) {
        stock_min = radio_stock_min.value;        
    } else {
    Toast.fire({icon: "error",title: "Especificar si producto es requier control de inventario mínimo"});
   }
    
   axios.post(route("insert.newproduct"), { producto,  categoria,  perecedero,  stock_min })
   .then((response) => {
       $("#new-producto").modal("hide")
       let data = response.data;
       console.log(data)
       if(data.msj=='OkInsert'){
        let productos = $("#name-item-compra").selectize(); 
        let selectExistsProd = productos[0].selectize;       
        selectExistsProd.addOption({ value: data.id, text: producto });
        selectExistsProd.setValue(data.id); 
        selectExistsProd.refreshItems();
        document.getElementById("cant-item-compra").focus()
       }
   })
   .catch((error) => {
       console.error(error);
   });
    
})
}
