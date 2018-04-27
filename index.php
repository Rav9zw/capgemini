<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Zadanie capgemini zmienione na branchu new test</title>

	
  <!-- datatables -->	
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

   
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
   
     <!-- icons materialised --> 
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
  <!--jquery -->
  <script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        
<!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
          
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      


	<style>
	
.container-fluid{
	margin:15px;
}

    </style>	
</head>
<body>

 

  <!-- Modal Structure -->
  <div id="modal_delete" class="modal">
    <div class="modal-content">
      <h4>Usuwanie rekordu</h4>
     Nastąpi całkowite usunięcie rekordu, kontynować?

 
 
    </div>
    <div class="modal-footer">
      <a href="#!" id="delete" class=" modal-action modal-close waves-effect waves-green btn-flat">Usuń</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Anuluj</a>
    </div>
  </div>

 

  <!-- Modal Structure -->
  <div id="modal_edit" class="modal">
    <div class="modal-content">
      <h4>Edycja rekordu</h4>
     
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="surname_edit" type="text" class="validate">
          <label for="surname_edit">Nazwisko</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="name_edit" type="tel" class="validate">
          <label for="name_edit">Imię</label>
        </div>
      </div>
    </form>
  </div>
        
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="phone_edit" type="text" class="validate">
          <label for="phone_edit">Telefon</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="address_edit" type="tel" class="validate">
          <label for="address_edit">Adres</label>
        </div>
      </div>
    </form>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" id="edit" class=" modal-action modal-close waves-effect waves-green btn-flat">Zapisz</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Anuluj</a>
    </div>
  </div>


<div class="container">

  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="surname" type="text" class="validate">
          <label for="surname">Nazwisko</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" type="tel" class="validate">
          <label for="name">Imię</label>
        </div>
      </div>
    </form>
  </div>
        
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="phone" type="text" class="validate">
          <label for="phone">Telefon</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="address" type="tel" class="validate">
          <label for="address">Adres</label>
        </div>
      </div>
    </form>
  </div>		
		
	 <button id="insert" class="btn waves-effect waves-light  green darken-3" type="submit" name="action">Dodaj
    <i class="material-icons right">add</i>
  </button>	
	</div>
	
	
	<div class="container-fluid">
	
	<table id="main_table">
		<thead><tr>
		<th>ID</th>
		<th>Nazwisko</th>
		<th>Imię</th>
		<th>Telefon</th>
		<th>Adres</th>
		<th>Akcje</th>
		</tr></thead>
		<tbody></tbody>
	</table>
	

	</div>
	
	
</body>

  <script src="JavaScript/scripts.js"></script>

</html>