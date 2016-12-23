$(document).ready(function(){
	
$('.modal').modal();



$('#insert').click(function(){

var name=$('#name').val();
var surname=$('#surname').val();
var address=$('#address').val();
var phone=$('#phone').val();

insert(name,surname,address,phone);


});




$('.container-fluid').on('click', '.edit', function (){

$('#surname_edit').val($(this).data('surname'));
$('#name_edit').val($(this).data('name'));
$('#phone_edit').val($(this).data('phone'));
$('#address_edit').val($(this).data('address'));

$('#edit').data('id',$(this).data('id'));


Materialize.updateTextFields();


});



$('.modal').on('click', '#edit', function (){

var id=$(this).data('id');
var surname=$('#surname_edit').val();
var name=$('#name_edit').val();
var phone=$('#phone_edit').val();
var address=$('#address_edit').val();


edit(id,name,surname,address,phone);
		

});





$('.container-fluid').on('click', '.delete', function (){

$('#delete').data('id',$(this).data('id'));



});






$('.modal').on('click', '#delete', function (){



var id=$(this).data('id');


delete_row(id);



});



    $('#main_table').DataTable( {
           "ajax": {
          	"url": "crud.php",
            "dataSrc": ""
        },
    	  "columns": [
            { "data": "id" ,
			className: "col_id"},
            { "data": "Nazwisko",
			className: "col_surname" },
            { "data": "Imię" ,
			className: "col_name"},
            { "data": "Telefon",
			className: "col_phone" },
            { "data": "Adres",
			className: "col_address" },
            { "data": "Akcje" ,
			"width": "30%" ,
			},
			

        ],
		 
		
		"bLengthChange": false,
		
		"iDisplayLength": 100,
		"aaSorting": [[ 0, "desc" ]]
 
    } );
	


	
	
	
function insert(name,surname,address,phone){

       $.ajax({
            url: "crud.php",
            async: true,
            method: 'post',
            dataType: "json",
            data: {
			
			name:name,
			surname:surname,
			address:address,
			phone:phone,
			choice:'insert'	
			
			},
            beforeSend: function() {
		
		
		
		
		
            },
		
            success: function(dane) {
				
				
				//add new row 
				var table = $('#main_table').DataTable();
 
				var new_id=parseInt($('td:first-child').first().text())+1;
			
				if(!new_id)
				new_id=1;	
				
				var editButton="<button data-target='modal_edit'  data-id='"+new_id+"'  data-name='"+name+"'    data-surname='"+surname+"'  data-address='"+address+"'  data-phone='"+phone+"' class='edit btn waves-effect waves-light orange lighten-1' >Edytuj<i class='material-icons right'>edit</i></button>";
			
				var deleteButton="<button data-target='modal_delete'  data-id='"+new_id+"'  class='delete btn waves-effect waves-light red darken-3' >Usuń<i class='material-icons right'>delete</i></button>";
			
				
			
			
				var rowNode =table.row.add( {
							"id":new_id,
							"Nazwisko":surname,
							"Imię":    name,
							"Telefon": phone,
							"Adres":   address,
							"Akcje":   editButton+' '+deleteButton
						
						} ).draw().node();
				
						$( rowNode )
				.css( 'color', '#c62828' )
				.animate( { color: 'black' } )
				.hide()
				.fadeIn('slow');

			},
	 
 
        });




}





function edit(id,name,surname,address,phone){

       $.ajax({
            url: "crud.php",
            async: true,
            method: 'post',
            dataType: "json",
            data: {
			
			id:id,
			name:name,
			surname:surname,
			address:address,
			phone:phone,
			choice:'edit'	
			
			},
            beforeSend: function() {
		

            },
		
            success: function(dane) {
				
				
			
			var table = $('#main_table').DataTable();

			var col_id=$('#main_table .col_id').filter(function() {
				
			return $(this).text() == id;
			
			});	
			
			
			
			function redraw_table(cell_new_data,name){
				
			var cell_new = table.cell( col_id.closest('tr').find('.col_'+name) );	
			cell_new.data( cell_new_data ).draw();
			
			
			}
			col_id.closest('tr').hide().fadeIn('slow');
			
			
			redraw_table(surname,'surname');
			redraw_table(name,'name');
			redraw_table(phone,'phone');
			redraw_table(address,'address');
			
			
		
			},
	 
	 
	 
	 
 
        });




}





function delete_row(id){

       $.ajax({
            url: "crud.php",
            async: true,
            method: 'post',
            dataType: "json",
            data: {
			
			id:id,
			choice:'delete_row'	
			
			},
            beforeSend: function() {
		

            },
		
            success: function(dane) {
				
				
			var table = $('#main_table').DataTable();
			
			var col_id=$('#main_table .col_id').filter(function() {
				
			return $(this).text() == id;
			
			});	
			
			table.row(col_id.closest('tr')).remove().draw();
			
			
			Materialize.toast('Rekord usunięty', 4000)
		  
		  
			},
	 
	 
	 
	 
 
        });




}















	
});
