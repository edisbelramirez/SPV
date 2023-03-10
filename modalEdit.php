<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="evento/action/eventoEdit.php" onsubmit="return validaForm(this);">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar evento de videoconferencia</h4>
				
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="titulo" class="col-sm-2 control-label">T&iacute;tulo</label>
					<div class="col-sm-10">
					  <input type="text" name="titulo" class="form-control" id="titulo" placeholder="T&iacute;tulo" required>
					</div>
				  </div>

				  <div class="form-group">
					<label for="descricao" class="col-sm-2 control-label">Descripci&oacute;n</label>
					<div class="col-sm-10">
					  <textarea type="text" name="descricao" class="form-control" id="descricao" placeholder="Descripci&oacute;n"></textarea>
					</div>
				  </div>

				  <div class="form-group">
					<label for="cor" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="cor" class="form-control" id="cor">
						  <option value="">Escojer el color</option>
						  <option style="color:#0071c5" value="#0071c5">&#9724; Azul</option>
						  <option style="color:#40E0D0" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="convidado" class="col-sm-2 control-label">Convidado</label>
					<div class="col-sm-10">
					  <select name="convidado" class="form-control" id="convidado" disabled>
					  <option value="">Ninguno</option>
					  <?php
							$sql6 = "SELECT * FROM usuarios";
							$req = $db->prepare($sql6);
							$req->execute();
							$linhas = $req->rowCount();
							
								while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
									$id_usuario = $dados['id_usuario'];
									$nome_usuario = $dados['nome'];
									echo " <option value=\"$id_usuario\">$nome_usuario</option>";
								}
							
						?>				  
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="remetente" class="col-sm-2 control-label">Remitente</label>
					<div class="col-sm-10">
					  <select name="remetente" class="form-control" id="remetente" disabled>
					  <option value="">Ninguno</option>
					  <?php
							$sql5 = "SELECT * FROM usuarios";
							$req = $db->prepare($sql5);
							$req->execute();
							$linhas = $req->rowCount();
						
								while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
									$id_usuario = $dados['id_usuario'];
									$nome_usuario = $dados['nome'];
									echo " <option value=\"$id_usuario\">$nome_usuario</option>";
								}
							
						?>				  
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="status" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select name="status" class="form-control" id="status" disabled>
						<option value="">Pendiente</option>
						<option value="1">Aprobado</option>
						<option value="0">Cancelado</option>		  
						</select>
					</div>
				</div>

				  <div class="form-group">
					<label for="inicio" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
					  <input type="text" name="inicio" class="form-control" id="inicio" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="termino" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
					  <input type="text" name="termino" class="form-control" id="termino" required>
					</div>
				  </div>
                    
                    <!-- Deletar Evento -->
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete">Eliminar</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id_evento" class="form-control" id="id_evento">
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>