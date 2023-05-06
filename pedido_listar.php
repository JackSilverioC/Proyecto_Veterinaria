<?php
require_once './conexion/conexion.php';
require_once "pedido_delete.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <?php
    include_once('includes/1_head.php');
    include_once('sesion.php');
    ?>
</head>

<body>
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <?php
            include_once('includes/2_header.php'); //nav
            ?>
            <div class="content">
                <?php
                include_once './includes/nav.php';
               

                // $sql_com = "SELECT  compra.fecha, compra.id_compra,compra.estado, compra.total,compra.tipoc, compra.tipopa, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.pais, supplier.tele, supplier.corre,
                // GROUP_CONCAT( products.nompro, '..', products.codigo, '..',products.preciC, '..', productos_comprados.canti SEPARATOR '__') AS products FROM compra INNER JOIN productos_comprados ON productos_comprados.id_compra = compra.id_compra INNER JOIN products ON products.id_prod = productos_comprados.id_prod INNER JOIN supplier ON compra.id_prove =supplier.id_prove GROUP BY compra.id_compra ORDER BY compra.id_compra DESC;";
                $sql_com="SELECT pc.id_pcomp, p.nompro,s.nomprove,c.tipoc,p.preciC,pc.canti,p.preciC*pc.canti as monto FROM compra c join productos_comprados pc on c.id_compra=pc.id_compra join products p on p.id_prod = pc.id_prod join supplier s on s.id_prove=pc.id_prove order by pc.id_pcomp";

                $result_com = mysqli_query($conex, $sql_com);

                ?>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="card h-100" id="table" data-list='{"valueNames":["n","producto","comprobante","proveedor","precio","monto","cantidad"],"page":5,"pagination":true,"fallback":"pages-table-fallback"}'>
                        <div class="card-header mt-3 ms-2">
                                <div class="row">
                                    <div class="col-12 align-self-center mb-3">
                                        <h5 class="mb-0">Lista Productos Comprados</h5>
                                    </div>
                                    <div class="col me-3 me-md-0 pe-0 my-2 mt-0">
                                        <div id="orders-actions" class="d-flex">
                                            <div>
                                                <label class="my-auto me-1">Mostrar:</label>
                                                <select id="select" class="custom-select custom-select-sm border-300 me-1" style="display: inline-block!important; width: auto !important;"><span class="fas fa-sort ms-2 fs--1"></span>
                                                    <option value="5" selected>5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <!-- <option value="Todos">Todos</option> -->
                                                </select>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="reporte_pedidos.php" target="_blank" class="me-1 btn btn-sm btn-outline border-300" type="button"><span class="bi bi-file-earmark-pdf-fill"></span><span class="d-none d-md-inline ms-1">Reporte</span></a>
                                                <a class="btn btn-sm btn-outline border-300" type="button" data-list-view="*"><span class="fas fa-eye" data-fa-transform="down-1"></span><span class="d-none d-md-inline ms-1">Ver Todos</span></a><a class="btn btn-sm btn-outline border-300 d-none" type="button"  data-list-view="less"><span class="far fa-eye me-1" data-fa-transform="down-1"></span><span class="d-none d-sm-inline">Ver Menos</span></a>
                                                <a href="pedido_add.php" class="ms-1 btn btn-sm btn-outline border-300" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-md-inline ms-1">Agregar</span></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12 ps-2 mt-2 mt-sm-0 col-sm-4 col-md-3 col-lg-2">
                                        <div class="h-100">
                                            <form>
                                                <div class="input-group">
                                                    <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Buscar" aria-label="search" />
                                                    <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card-body px-0 pt-0">
                                <div class="table-responsive scrollbar">
                                    <table class="table table-striped fs--1 mb-0 overflow-hidden">
                                        <thead class="bg-200 text-900">
                                            <tr class="p-0">
                                                <th class="sort" data-sort="n">Nº</th>
                                                <th class="sort" data-sort="producto">Producto</th>
                                                <th class="sort" data-sort="proveedor">Proveedor</th>
                                                <th class="sort" data-sort="comprobante">Comprobante</th>
                                                <th class="sort" data-sort="precio">P. Compra</th>
                                                <th class="sort" data-sort="cantidad">Cantidad</th>
                                                <th class="sort" data-sort="monto">Monto Total</th>
                                            </tr>
                                        </thead>

                                        <tbody class="list">
                                            <?php
                                            //recorrer las filas del conjunto de resultados
                                            while ($row = mysqli_fetch_array($result_com)) {
                                          
                                            ?>

                                                <tr>
                                                    <td class="n"><?php echo $row["id_pcomp"]; ?></td>
                                                    <td class="producto"><?php echo $row["nompro"]; ?></td> 
                                                    <td class="proveedor"><?php echo $row["nomprove"]; ?></td>  
                                                    <td class="comprobante"><?php echo $row["tipoc"]; ?></td> 
                                                    <td class="precio">s/. <?php echo $row["preciC"]; ?></td> 
                                                    <td class="cantidad"><?php echo $row["canti"]; ?> unid.</td> 
                                                    <td class="monto">s/. <?php echo $row["monto"]; ?></td> 
                                                    
                                                    
                                                    <!-- <td class="text-end">
                                                        <div>
                                                            
                                                            <a href="#"data-id="<?php echo $row["id_compra"];?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="$('#dataid').val($(this).data('id'));">
                                                            <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"><span class="text-500 fas fa-trash-alt"></span></button></a>
                                                        </div>
                                                    </td> -->
                                                </tr>
                                            <?php
                                            
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center d-none mb-4" id="pages-table-fallback">
                                    <p class="fw-bold fs-1 mt-3">Pedido no encontrado</p>
                                </div>                                
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                    <ul class="pagination mb-0"></ul>
                                    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                                </div>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="pedido_delete.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro de eliminar?
                        <input type="hidden" name="id" id="dataid"></input>
                        <input type="hidden" name="action" value="delete"></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="add" class="btn btn-primary">
                            Aceptar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>