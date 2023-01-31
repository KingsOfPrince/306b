<?php require "view/blocks/page_start.php";?>

<h2>Daten</h2>
<!--Here is the table created for the list of the products.-->
<table class="products-categorys-table" id="customer-table">
    <tr class="products-row">
        <th class="products-categorys-header">ID</th>
        <th class="products-categorys-header">Anrede</th>
        <th class="products-categorys-header">Vorname</th>
        <th class="products-categorys-header">Nachname</th>
        <th class="products-categorys-header">Geburtsdatum</th>
        <th class="products-categorys-header">Strasse</th>
        <th class="products-categorys-header">Haus Nr.</th>
        <th class="products-categorys-header">Stadt</th>
        <th class="products-categorys-header">PLZ</th>
        <th class="products-categorys-header">Telefon Firma</th>
        <th class="products-categorys-header">Telefon Privat</th>
        <th class="products-categorys-header">Email</th>
        
    </tr>
</table>
<br>
<br>

<script src="controller/datas.js"></script>

<?php require "view/blocks/page_end.php";?>