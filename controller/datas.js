/*
 *Here are new variables definted
 */
 var customerTable = document.getElementById("customer-table");
 var customerResponse = [ ];
 
 /**
  * Direct if I open the category Webseit will list all Categorys 
  */
 var customerRequest = new XMLHttpRequest();
 customerRequest.open("GET", "API/V1/Customers");
 customerRequest.onreadystatechange = onCustomerResponsed;
 customerRequest.send();
 
 /**
  * Here is a for-loop definted to list all Categorys.
  * Here is the ID definted too, for the delete and edit
  * Here are all td created.
  */
 function onCustomerResponsed() {
   if (customerRequest.readyState < 4) {
     return;
   }
 
   customerResponse  = JSON.parse(customerRequest.responseText);
 
   for (var i = 0; i < customerResponse .length; i++) {
     var customerRow = document.createElement("tr");
     customerTable.appendChild(customerRow);
   
     var userId = document.createElement("td");
     userId.innerText = customerResponse [i].user_id;
     customerRow.appendChild(userId);
 
     var anredeCell = document.createElement("td");
     anredeCell.innerText = customerResponse [i].anrede;
     customerRow.appendChild(anredeCell);
 
     var vornameCell = document.createElement("td");
     vornameCell.innerText = customerResponse [i].vorname;
     customerRow.appendChild(vornameCell);
 
     var nachnameCell = document.createElement("td");
     nachnameCell.innerText = customerResponse [i].nachname;
     customerRow.appendChild(nachnameCell);
 
     var geburtsdatumCell = document.createElement("td");
     geburtsdatumCell.innerText = customerResponse [i].geburtsdatum;
     customerRow.appendChild(geburtsdatumCell);
 
     var strasseCell = document.createElement("td");
     strasseCell.innerText = customerResponse [i].strasse;
     customerRow.appendChild(strasseCell);
 
     var hausNrCell = document.createElement("td");
     hausNrCell.innerText = customerResponse [i].haus_nr;
     customerRow.appendChild(hausNrCell);
 
     var stadtCell = document.createElement("td");
     stadtCell.innerText = customerResponse [i].stadt;
     customerRow.appendChild(stadtCell);

     var plzCell = document.createElement("td");
     plzCell.innerText = customerResponse [i].plz;
     customerRow.appendChild(plzCell);

     var teleFirmaCell = document.createElement("td");
     teleFirmaCell.innerText = customerResponse [i].tele_firma;
     customerRow.appendChild(teleFirmaCell);

     var telePrivateCell = document.createElement("td");
     telePrivateCell.innerText = customerResponse [i].tele_private;
     customerRow.appendChild(telePrivateCell);

     var emailCell = document.createElement("td");
     emailCell.innerText = customerResponse [i].email;
     customerRow.appendChild(emailCell);
 
     var deleteAndEditCell = document.createElement("td");
     customerRow.appendChild(deleteAndEditCell);
     deleteAndEditCell.className = "delete-and-edit-td";
 
     var deleteButton = document.createElement("button");
     deleteButton.innerText = "Delete";
     deleteButton.className = "edit-and-delete-button";
     deleteButton.setAttribute("delete-product-id", customerResponse [i].product_id);
     deleteButton.addEventListener("click", onDeleteButtonPressed);
     deleteAndEditCell.appendChild(deleteButton);
   
     var editButton = document.createElement("button");
     editButton.innerText = "Edit";
     editButton.className = "edit-and-delete-button"
     editButton.setAttribute("edit-product-id", customerResponse [i].product_id);
     editButton.addEventListener("click", onEditButtonPressed);
     deleteAndEditCell.appendChild(editButton);
   }
 }
 
 /**
  * Here is the delete request definted
  */
 function onDeleteButtonPressed(event) {
   deleteRequest = new XMLHttpRequest();
   deleteRequest.open("Delete", "API/V1/Product/" + event.currentTarget.getAttribute("delete-product-id"));
   deleteRequest.onreadystatechange = onCategoryDeleteResponsed;
   deleteRequest.send();
 }
 
 /**
  * Here is the request responsed
  */
 function onCategoryDeleteResponsed() {
   if (deleteRequest.readyState < 4) {
     return;
   }
 
   responseStatus = console.log(deleteRequest.status);
 
   if (responseStatus = 200) {
     alert("Deleted");
   }
   else {
     alert("Not found");
   }
 }
 
 /**
  * Here is the edit request definted
  */
 function onEditButtonPressed(event) {
   window.open("edit_product.php#" + event.currentTarget.getAttribute("edit-product-id"), "_self"); 
   
   }