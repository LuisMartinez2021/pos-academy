<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            asdfasdf
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Productos Registrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Cod. Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th><button class="btn btn-primary" onclick="MNuevoProducto()">Nuevo</button></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $producto = ControladorProducto::ctrInfoProductos();
                                foreach ($producto as $value) { ?>
                                    <tr>
                                        <td><?php echo $value["cod_producto"]; ?></td>
                                        <td><?php echo $value["nombre_producto"]; ?></td>
                                        <td><?php echo $value["precio_producto"]; ?></td>
                                        <td><?php
                                        if($value["imagen_producto"]==""){
                                            ?>
                                            <img src="assets/dist/img/product_default.png" alt="" width="50" class="img-thumbnail previsualizar">
                                            <?php
                                        }else{
                                            ?>
                                            <img src="assets/dist/img/productos/<?php echo $value["imagen_producto"]; ?>" alt="" width="50" class="img-thumbnail previsualizar">
                                        <?php
                                        }
                                        ?>
                                            </td>
                                        <td><?php
                                            if($value["disponible"]==1){
                                                ?>
                                                <span class="badge badge-success">Disponible</span>
                                                <?php
                                            }else{
                                                ?>
                                                <span class="badge badge-danger">No disponible</span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><div class="btn-group">
                                                <button class="btn btn-info" onclick="MVerProducto(<?php echo $value["id_producto"]; ?>)"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-secondary" onclick="MEditProducto(<?php echo $value["id_producto"]; ?>)"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger" onclick="MEliProducto(<?php echo $value["id_producto"]; ?>)"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->