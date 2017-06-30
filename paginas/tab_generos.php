                <!-- TAB DE GENEROS -->
                <div id="tabGeneros" class="tab-pane fade">
                  <h3>Puede agregar, editar o incluso eliminar generos</h3>
                  <div class="col-md-4 col-md-offset-4">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                         <th>Nombre</th>
                         <th>Editar</th>
                      </tr>
                     </thead>
                     <tbody> 
                     <?php for ($g=0; $g < count($generos) ; $g++) { ?>
                      <tr>
                         <td><?php echo $generos[$g]['genero'] ?></td>
                         <td>
                              <button type="button" class="btn btn-success" data-toggle="modal" 
                              onclick="editarGenero(<?php echo $generos[$g]['id'] .",'" . addslashes($generos[$g]['genero']) ."'" ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                         </td>
                      </tr>
                      <?php } ?>
                      
                     </tbody>
                     <thead>
                      <tr>
                         <th>Agregar un nuevo género</th>
                         <th></th>
                      </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <form action="php/paginas/addGenero.php" method="post" id="addGenero_form">
                          <td><input class="form-control" type="text" name="addGenero" placeholder="Ingrese el nombre del genero" required></td>
                          <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                          <td><button type="submit" class="btn btn-bc">Agregar</button></td>
                        </form>
                      </tr>
                     </tbody>
                    </table>
                  </div>
                </div>
                <div id="tabUsuarios" class="tab-pane fade">
                  <h3>Puede agregar, editar o incluso eliminar usuarios</h3>

                </div>
              </div>