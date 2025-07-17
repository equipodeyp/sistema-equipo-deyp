
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal -->
<?php 

$folio_incidencia = $_GET['folio_incidencia'];
echo $folio_incidencia;
?>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                

                                                <?php echo $row['folio_incidencia'];?>


                                                <table width="100%" border="1" cellpadding="0" cellspacing="0" >

                                                <!-- <thead>

                                                  <tr>
                                                    <th>Encabezado</th>
                                                    <td>Respuesta</td>
                                                  </tr>

                                                </thead> -->

                                                <tbody>

                                                  <tr>
                                                    <th>Id Asistencia:</th>
                                                    <td></td>
                                                  </tr>

                                                </tbody>

                                              </table>


                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>