<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("sesion.php");?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Pet Shop</title>
    <?php
    include_once('includes/1_head.php');
    include_once('sesion.php');
    ?>
</head>
<body>
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <?php 
        include_once('includes/2_header.php');
        ?>
        <div class="content">
            <?php 
            include_once('includes/nav.php'); 
            include_once('conexion/conexion.php');
            $sql = "SELECT SUM(total) FROM compra;";
            $result = $conex->query($sql);
            $total = mysqli_fetch_array($result);

            $sql2 = "SELECT SUM(total) FROM venta;";
            $result2 = $conex->query($sql2);
            $total2 = mysqli_fetch_array($result2);

            $sqlcli = "SELECT COUNT(*) total FROM owner;";
            $resultcli = $conex->query($sqlcli);
            $totalcli = mysqli_fetch_array($resultcli);

            $sqlp = "SELECT COUNT(*) total FROM products;";
            $resultp = $conex->query($sqlp);
            $totalp = mysqli_fetch_array($resultp);

            $sqlpr = "SELECT COUNT(*) total FROM supplier;";
            $resultpr = $conex->query($sqlpr);
            $totalpr = mysqli_fetch_array($resultpr);

            $sqlv = "SELECT COUNT(*) total FROM veterinarian;";
            $resultv = $conex->query($sqlv);
            $totalv = mysqli_fetch_array($resultv);

            $sqlc = "SELECT COUNT(*) total FROM category;";
            $resultc = $conex->query($sqlc);
            $totalc = mysqli_fetch_array($resultc);



            ?>
            <div class="row g-3 mb-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-0.png);">
                        </div>
                        <div class="card-header pb-0 position-relative">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">Productos<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Cantidad de Productos"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center pt-2 position-relative">
                        <div class="row">
                            <div class="col">
                              <div class="d-flex">
                                <i class="fas fa-box display-6 me-3 mt-1">
                                <p class="font-sans-serif lh-1 mb-2 fs-4"  data-countup='{"endValue":<?php echo  $totalp[0]; ?>,"prefix":""}'></i></p>
                              </div>
                              <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-0.png);">
                        </div>
                        <div class="card-header pb-0 position-relative">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">Proveedores<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Cantidad de Proveedores"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center pt-2 position-relative">
                        <div class="row">
                            <div class="col">
                              <div class="d-flex">
                                <i class="fas fa-dolly-flatbed display-6 me-3 mt-1">
                                <p class="font-sans-serif lh-1 mb-2 fs-4"  data-countup='{"endValue":<?php echo  $totalpr[0]; ?>,"prefix":""}'></i></p>
                              </div>
                              <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-0.png);">
                        </div>
                        <div class="card-header pb-0 position-relative">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">Veterinarios<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Cantidad de Veterinarios"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center pt-2 position-relative">
                        <div class="row">
                            <div class="col">
                              <div class="d-flex">
                                <i class="fas fa-stethoscope display-6 me-3 mt-1">
                                <p class="font-sans-serif lh-1 mb-2 fs-4"  data-countup='{"endValue":<?php echo  $totalv[0]; ?>,"prefix":""}'></i></p>
                              </div>
                              <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <div div class="bg-holder bg-card" style="background-image:url(images/dash/corner-0.png);">
                        </div>
                        <div class="card-header pb-0 position-relative">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">Categorías<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Cantidad de Categorías"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center pt-2 position-relative">
                        <div class="row">
                            <div class="col">
                              <div class="d-flex">
                                <i class="fas fa-th-list display-6 me-3 mt-1">
                                <p class="font-sans-serif lh-1 mb-2 fs-4"  data-countup='{"endValue":<?php echo  $totalc[0]; ?>,"prefix":""}'></i></p>
                              </div>
                              <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-3.png);">
                </div>
                <div class="card-body position-relative">
                <h6 class="mb-1">Clientes
                    <span class="ms-2 badge badge-soft-success rounded-pill fs--2">
                    <?php 
                      $indiceventas="SELECT 
                      ((SELECT COUNT(*) FROM owner WHERE MONTH(fere)= 12) - 
                      (SELECT COUNT(*) FROM owner WHERE MONTH(fere)= 11))/ 
                      (SELECT COUNT(*) FROM owner WHERE MONTH(fere)= 11)*100";
                      $rventas = $conex->query($indiceventas);
                      $tventas= mysqli_fetch_array($rventas);

                      if($tventas[0]>0){
                        echo '<span class="fas fa-caret-up me-1"></span>';
                      }
                      else if ($tventas[0]==0){
                        echo '<span class="fas fa-caret-right me-1"></span>';
                      }
                      else {
                        echo '<span class="fas fa-caret-down me-1"></span>';
                      }
                      echo number_format($tventas[0],2, '.', '')."%";
                    ?>
                      <!-- <span class="fas fa-caret-right me-1"></span>0.5% -->
                    </span>
                  </h6>
                  <div class="d-flex text-success mt-3">
                    <i class="fas fa-users display-5 me-3"></i><div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":<?php echo  $totalcli[0]; ?>,"prefix":""}'>0</div>
                  </div>
                  <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-2.png);">
                </div>
                <div class="card-body position-relative">
                  <h6 class="mb-1">Ventas
                    <span class="ms-2 badge badge-soft-info rounded-pill fs--2">
                    <?php 
                      $indiceventas="SELECT 
                      ((SELECT SUM(total) FROM venta WHERE MONTH(fecha)= 12) -
                      (SELECT SUM(total) FROM venta WHERE MONTH(fecha)= 11))/
                      (SELECT SUM(total) FROM venta WHERE MONTH(fecha)= 11)*100";
                      $rventas = $conex->query($indiceventas);
                      $tventas= mysqli_fetch_array($rventas);

                      if($tventas[0]>0){
                        echo '<span class="fas fa-caret-up me-1"></span>';
                      }
                      else if ($tventas[0]==0){
                        echo '<span class="fas fa-caret-right me-1"></span>';
                      }
                      else {
                        echo '<span class="fas fa-caret-down me-1"></span>';
                      }
                      echo number_format($tventas[0],2, '.', '')."%";
                    ?>
                      <!-- <span class="fas fa-caret-right me-1"></span>0.5% -->
                    </span>
                  </h6>
                  <div class="display-4 fs-4 mb-2 mt-3 fw-normal font-sans-serif text-info" data-countup='{"endValue":<?php echo  $total2[0]; ?>,"prefix":"S/ ","decimalPlaces":2}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(images/dash/corner-1.png);">
                </div>
                <div class="card-body position-relative">
                <h6 class="mb-1">Compras
                    <span class="ms-2 badge badge-soft-warning rounded-pill fs--2">
                    <?php 
                      $indicecompra="SELECT 
                      ((SELECT SUM(total) FROM compra WHERE MONTH(fecha)= 12) -
                      (SELECT SUM(total) FROM compra WHERE MONTH(fecha)= 11))/
                      (SELECT SUM(total) FROM compra WHERE MONTH(fecha)= 11)*100";
                      $rcompra = $conex->query($indicecompra);
                      $tcompra= mysqli_fetch_array($rcompra);

                      if($tcompra[0]>0){
                        echo '<span class="fas fa-caret-up me-1"></span>';
                      }
                      else if ($tcompra[0]==0){
                        echo '<span class="fas fa-caret-right me-1"></span>';
                      }
                      else {
                        echo '<span class="fas fa-caret-down me-1"></span>';
                      }
                      echo number_format($tcompra[0],2, '.', '')."%";
                    ?>
                      <!-- <span class="fas fa-caret-right me-1"></span>0.5% -->
                    </span>
                  </h6>
                  <div class="display-4 fs-4 mb-2 mt-3 fw-normal font-sans-serif text-warning" data-countup='{"endValue":<?php echo  $total[0]; ?>,"prefix":"S/ ","decimalPlaces":2}'>0</div>
                  <a class="fw-semi-bold fs--1 text-nowrap" href="#">Más detalles<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-lg-6 pe-lg-2">
              <?php 
                include_once('conexion/conexion.php');
                $sql = "SELECT 
                            SUM(if(MONTH(fecha) = 1, total,0)) as Ene,
                            SUM(if(MONTH(fecha) = 2, total,0)) as Feb,
                            SUM(if(MONTH(fecha) = 3, total,0)) as Mar,
                            SUM(if(MONTH(fecha) = 4, total,0)) as Abr,
                            SUM(if(MONTH(fecha) = 5, total,0)) as May,
                            SUM(if(MONTH(fecha) = 6, total,0)) as Jun,
                            SUM(if(MONTH(fecha) = 7, total,0)) as Jul,
                            SUM(if(MONTH(fecha) = 8, total,0)) as Ago,
                            SUM(if(MONTH(fecha) = 9, total,0)) as Sep,
                            SUM(if(MONTH(fecha) = 10, total,0)) as Oct,
                            SUM(if(MONTH(fecha) = 11, total,0)) as Nov,
                            SUM(if(MONTH(fecha) = 12, total,0)) as Dic
                        FROM venta 
                        WHERE YEAR(fecha) = '2022'";

                $result = $conex->query($sql);
                $str="[";
                $row = mysqli_fetch_array($result);

                for ($i=0; $i < 12; $i++) { 
                  $str.=$row[$i].",";
                }
                $str.="]";
                //echo $str;
                ;
                ?>
              <script>
                  var totalSalesEcommerce = function totalSalesEcommerce() {
                  // var ECHART_LINE_TOTAL_SALES_ECOMM = '.echart-line-total-sales-ecommerce';
                  var $echartsLineTotalSalesEcomm = document.getElementById('comprasventas');
                  var months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'];
                  function getFormatter(params) {
                    return params.map(function (_ref16, index) {
                      var value = _ref16.value,
                          borderColor = _ref16.borderColor;
                      return "<span class= \"fas fa-circle\" style=\"color: ".concat(borderColor, "\"></span>\n    <span class='text-600'>").concat(index === 0 ? 'Ventas' : 'Compras', ": ").concat(value, "</span>");
                    }).join('<br/>');
                  }
                  
                  if ($echartsLineTotalSalesEcomm) {
                    // Get options from data attribute
                    var userOptions = utils.getData($echartsLineTotalSalesEcomm, 'options');
                    var TOTAL_SALES_LAST_MONTH = "#".concat(userOptions.optionOne);
                    var TOTAL_SALES_PREVIOUS_YEAR = "#".concat(userOptions.optionTwo);
                    var totalSalesLastMonth = document.querySelector(TOTAL_SALES_LAST_MONTH);
                    var totalSalesPreviousYear = document.querySelector(TOTAL_SALES_PREVIOUS_YEAR);
                    var chart = window.echarts.init($echartsLineTotalSalesEcomm);

                    var getDefaultOptions = function getDefaultOptions() {
                      return {
                        color: utils.getGrays()['100'],
                        tooltip: {
                          trigger: 'axis',
                          padding: [7, 10],
                          backgroundColor: utils.getGrays()['100'],
                          borderColor: utils.getGrays()['300'],
                          textStyle: {
                            color: utils.getColors().dark
                          },
                          borderWidth: 1,
                          formatter: function formatter(params) {
                            return getFormatter(params);
                          },
                          transitionDuration: 0,
                          position: function position(pos, params, dom, rect, size) {
                            return getPosition(pos, params, dom, rect, size);
                          }
                        },
                        legend: {
                          data: ['lastMonth', 'previousYear'],
                          show: false
                        },
                        xAxis: {
                          type: 'category',
                          data: months,
                          boundaryGap: false,
                          axisPointer: {
                            lineStyle: {
                              color: utils.getColor('300'),
                              type: 'dashed'
                            }
                          },
                          splitLine: {
                            show: false
                          },
                          axisLine: {
                            lineStyle: {
                              // color: utils.getGrays()['300'],
                              color: utils.rgbaColor('#000', 0.01),
                              type: 'dashed'
                            }
                          },
                          axisTick: {
                            show: false
                          },
                          axisLabel: {
                            color: utils.getGrays()['400'],
                            formatter: function formatter(value) {
                              return value.substring(0, 3);
                            },
                            margin: 15
                          },
                        },
                        yAxis: {
                          type: 'value',
                          axisPointer: {
                            show: false
                          },
                          splitLine: {
                            lineStyle: {
                              color: utils.getColor('300'),
                              type: 'dashed'
                            }
                          },
                          boundaryGap: false,
                          axisLabel: {
                            show: true,
                            color: utils.getColor('400'),
                            margin: 15
                          },
                          axisTick: {
                            show: false
                          },
                          axisLine: {
                            show: false
                          }
                        },
                        series: [{
                          name: 'lastMonth',
                          type: 'line',
                          data: <?php echo $str; ?>,
                          lineStyle: {
                            color: utils.getColor('info')
                          },
                          itemStyle: {
                            borderColor: utils.getColor('info'),
                            borderWidth: 2
                          },
                          symbol: 'circle',
                          symbolSize: 10,
                          hoverAnimation: true,
                          areaStyle: {
                            color: {
                              type: 'linear',
                              x: 0,
                              y: 0,
                              x2: 0,
                              y2: 1,
                              colorStops: [{
                                offset: 0,
                                color: utils.rgbaColor(utils.getColor('primary'), 0.2)
                              }, {
                                offset: 1,
                                color: utils.rgbaColor(utils.getColor('primary'), 0)
                              }]
                            }
                          }
                        }, {
                          name: 'previousYear',
                          type: 'line',
                          data: <?php 
                          include_once('conexion/conexion.php');
                          $sql = "SELECT 
                                      SUM(if(MONTH(fecha) = 1, total,0)) as Ene,
                                      SUM(if(MONTH(fecha) = 2, total,0)) as Feb,
                                      SUM(if(MONTH(fecha) = 3, total,0)) as Mar,
                                      SUM(if(MONTH(fecha) = 4, total,0)) as Abr,
                                      SUM(if(MONTH(fecha) = 5, total,0)) as May,
                                      SUM(if(MONTH(fecha) = 6, total,0)) as Jun,
                                      SUM(if(MONTH(fecha) = 7, total,0)) as Jul,
                                      SUM(if(MONTH(fecha) = 8, total,0)) as Ago,
                                      SUM(if(MONTH(fecha) = 9, total,0)) as Sep,
                                      SUM(if(MONTH(fecha) = 10, total,0)) as Oct,
                                      SUM(if(MONTH(fecha) = 11, total,0)) as Nov,
                                      SUM(if(MONTH(fecha) = 12, total,0)) as Dic
                                  FROM compra 
                                  WHERE YEAR(fecha) = '2022'";

                          $result = $conex->query($sql);
                          $str="[";
                          $row = mysqli_fetch_array($result);

                          for ($i=0; $i < 12; $i++) { 
                            $str.=$row[$i].",";
                          }
                          $str.="]";
                          echo $str;
                          ?>,
                          lineStyle: {
                            color: utils.rgbaColor(utils.getColor('warning'), 0.6)
                          },
                          itemStyle: {
                            borderColor: utils.rgbaColor(utils.getColor('warning'), 0.6),
                            borderWidth: 2
                          },
                          symbol: 'circle',
                          symbolSize: 10,
                          hoverAnimation: true,
                          areaStyle: {
                            color: {
                              type: 'linear',
                              x: 0,
                              y: 0,
                              x2: 0,
                              y2: 1,
                              colorStops: [{
                                offset: 0,
                                color: utils.rgbaColor(utils.getColor('warning'), 0.2)
                              }, {
                                offset: 1,
                                color: utils.rgbaColor(utils.getColor('warning'), 0)
                              }]
                            }
                          }
                        }],
                        grid: {
                          right: '18px',
                          left: '40px',
                          bottom: '15%',
                          top: '5%'
                        }
                      };
                    };

                    echartSetOption(chart, userOptions, getDefaultOptions);
                    totalSalesLastMonth.addEventListener('click', function () {
                      chart.dispatchAction({
                        type: 'legendToggleSelect',
                        name: 'lastMonth'
                      });
                    });
                    totalSalesPreviousYear.addEventListener('click', function () {
                      chart.dispatchAction({
                        type: 'legendToggleSelect',
                        name: 'previousYear'
                      });
                    });
                  }
                };
              </script>
              <div class="card">
                <div class="card-header mt-2">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                      <h5 class="mb-0" style="font-size: 1rem!important;">Ventas vs Compras</h5>
                    </div>
                    <div class="col-auto d-flex mt-1">
                      <div class="form-check mb-0 d-flex">
                        <input class="form-check-input form-check-input-info" id="ecommerceLastMonth" type="checkbox" checked="checked" />
                        <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommerceLastMonth">Ventas<span class="text-dark d-none d-md-inline">: S/ <?php echo  $total2[0]; ?></span></label>
                      </div>
                      <div class="form-check mb-0 d-flex ps-0 ps-md-3">
                        <input class="form-check-input ms-2 form-check-input-warning" id="ecommercePrevYear" type="checkbox" checked="checked" />
                        <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommercePrevYear">Compras<span class="text-dark d-none d-md-inline">: S/ <?php echo  $total[0]; ?></span></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body pe-xxl-0 pt-0">
                  <div class="echart-line-total-sales-ecommerce pe-2" id="comprasventas" data-echart-responsive="true" data-options='{"optionOne":"ecommerceLastMonth","optionTwo":"ecommercePrevYear"}'></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 ps-lg-2">
              <div class="card" id="TableCrmRecentLeads"  data-list='{"valueNames":["code","product","stock"],"page":8,"pagination":true}'>
                <div class="card-header d-flex flex-between-center py-2">
                  <h6 class="mt-3 mb-2" style="font-size: 1rem!important;">Productos Recientes</h6>
                </div>
                <div class="card-body px-0 py-0">
                  <div class="table-responsive scrollbar">
                    <table class="table fs--1 mb-0">
                      <thead class="bg-200 text-800">
                        <tr>
                          <th class="sort align-middle py-2" data-sort="code">Código</th>
                          <th class="sort align-middle py-2" data-sort="product">Producto</th>
                          <th class="sort align-middle py-2" data-sort="stock">Stock</th>
                          <th class="sort align-middle py-2 text-end">Acción</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php 
                        $query = 'SELECT * FROM products ORDER BY id_prod DESC  LIMIT 5 ';
                        $resultado = $conex->query($query);
                        while ($row = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">                          
                          <td class="align-middle white-space-nowrap code"><small class="badge fw-semi-bold rounded-pill fs--2 badge-soft-primary"><?php echo $row[1]; ?></small></td>
                          <td class="align-middle white-space-nowrap product">
                                <h6 class="mb-0 ps-1 text-800"><?php echo $row[4]; ?></h6>
                          </td>
                          <td class="align-middle white-space-nowrap text-primary ps-3 stock"><?php echo $row[10]; ?></td>
                          <td class="align-middle white-space-nowrap text-end position-relative">
                            <div class="hover-actions bg-100">
                              <a class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" href="productos_edit.php?idproducto=<?php echo $row[0]; ?>"><span class="far fa-edit"></span></a>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                              <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-0"><a class="dropdown-item" href="productos_listar.php">Más información</a>
                                <!-- <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Quitar</a> -->
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer bg-light p-0">
                  <div class="pagination d-none"></div><a class="btn btn-sm btn-link d-block py-2" href="#!">Ver Lista Completa<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                </div>
              </div>
            </div>
          </div>
          <?php 
          include_once("./includes/3_footer.php");
          include_once("./includes/4_foot.php");
          ?>
        </div>
      </div>
    </main>
</body>
</html>
<script>
  docReady(totalSalesEcommerce);
</script>