
	<div id="form_container">
	
		<h1><a>Formulario de Solicitudes</a></h1>
      
		<form id="form_33876" class="appnitro"  method="post" action="">
		<div class="form_description">
		<h2>Formulario de Solicitudes - LLenado Automatico</h2>
		<p></p>
		</div>						
		<ul >
		         
		<li id="li_1" >
		<label class="description">Nombre Cliente </label>
		<div>
        <input type="text" name="search_cliente" id='search_cliente' 
        ondblclick="Doble_Clic(this.value)" value="">
        </div> 
		</li>
              
        <li id="li_2" >
		<label class="description">Documento de Identidad </label>
		<div>
		<input id="dni" name="dni" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
        
        <li id="li_3" >
		<label class="description" >Direccion del cliente </label>
		<div>
		<input id="direccion" name="direccion" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
              
        <li id="li_4" >
		<label class="description">Solicitud </label>
		<div>
		<textarea id="element_4" name="element_4" class="element textarea small"></textarea> 
		</div> 
		</li>
			
		<li class="buttons">
		<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" />
		</li>
		</ul>
		
        </form>	

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
      
<script type="text/javascript">
  $(function() {
     $( "#search_cliente" ).autocomplete({
       source: 'lista_cliente.php',
     });
  });
</script>       
   
  <!-- ESTE SCRIPT REALIZA EL AUTOLLENADO DEL DNI Y LA DIRECCION LUEGO DE HACER DOBLE CLIK -->
  <script>

		function Doble_Clic(str) {
			if (str.length == 0) {
				document.getElementById("dni").value = "";
				document.getElementById("direccion").value = "";
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function ()
                {

					if (this.readyState == 4 && this.status == 200)
                    {
					var myObj = JSON.parse(this.responseText);
					document.getElementById
					("dni").value = myObj[0];
             		document.getElementById(
					"direccion").value = myObj[1];
					}
				};
				xmlhttp.open("GET", "busca_dni_dir.php?search_cliente=" + str, true);
				xmlhttp.send();
			}
		}
	</script>      
  