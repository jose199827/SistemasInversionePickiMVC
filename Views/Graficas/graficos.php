<!-- Se manda a llamar el encabezado -->
<?php headerAdmin($data);
/* getModal("modalRoles", $data); */

?>

<div class="main-container">
  <div class="pd-ltr-20">

    <div class="row">

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">

                <?= $data['productosre'];

                ?>

              </div>
              <div class="font-16 text-secondary weight-500">PRODUCTOS REGISTRADOS</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy dw dw-shopping-bag1"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">

                <?= $data['clientesre'];

                ?>

              </div>
              <div class="font-16 text-secondary weight-500">CLIENTES   REGISTRADOS</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy dw dw-group"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">
                <?= $data['marcasre'];

                ?>
              </div>
              <div class="font-16 text-secondary weight-500">MARCAS REGISTRADAS</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy dw dw-star"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">

                <?= $data['proveedoresre'];

                ?>

              </div>
              <div class="font-16 text-secondary weight-500">PROVEEDORES REGISTRADOS</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy dw dw-truck"></i></div>
            </div>
          </div>
        </div>
      </div>


    </div>
    </div>







        <div class="card-box height-100-p pd-20">

          <script src="<?= media(); ?>/js/chart.min.js"></script>

                  <div class="title">
                    <h4>Factura por Fecha</h4>
                  </div>

                  <canvas id="chart1" style="width:100%;" height="100"></canvas>
                  <script>
                  var ctx = document.getElementById("chart1");
                  var data = {
                          labels: [
                            <?php foreach($data['grafica'] as $d):?>
                            "<?php echo $d['fec_factura']?>",
                            <?php endforeach; ?>
                          ],
                          datasets: [{
                              label: 'L.Total de la Venta',
                              data: [
                                <?php foreach($data['grafica'] as $d):?>
                                "<?php echo $d['totalFactura']?>",
                                <?php endforeach; ?>
                              ],
                              backgroundColor: "#3898db",
                              borderColor: "#9b59b6",
                              borderWidth: 2
                          }]
                      };
                  var options = {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          }
                      };
                  var chart1 = new Chart(ctx, {
                      type: 'bar', /* valores: line, bar*/
                      data: data,
                      options: options
                  });
                  </script>
        </div>
      </div>
    </div>

        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Se manda a llamar el footer  -->
<?php footerAdmin($data); ?>
