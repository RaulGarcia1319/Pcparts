<?php
  $page_title = 'Lista de usuarios';
  require_once('includes/load.php');
?>
<?php
// revisar nivel de permiso
 page_require_level(1);
//usuarios de base de datos
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-user"></span>
          <span>Usuarios</span>
       </strong>
         <a href="add_user.php" class="btn btn-primary pull-right">Agregar usuario</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nombre </th>
            <th>Usuario</th>
            <th class="text-center" style="width: 15%;">Rol de usuario</th>
            <th class="text-center" style="width: 10%;">Estado</th>
            <th style="width: 20%;">Último login</th>
            <th class="text-center" style="width: 200px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td class="text-center">
           <?php if($a_user['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Activo"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactivo"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo read_date($a_user['last_login'])?></td>
           <td class="text-center">
             <div class="btn">
                <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-default btn-info" data-toggle="tooltip" title="Editar">
                  <!-- <i class="glyphicon glyphicon-pencil"></i> -->Editar
               </a>
                <a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-default btn-danger" data-toggle="tooltip" title="Eliminar">
                  <!-- <i class="glyphicon glyphicon-remove"></i> -->Eliminar
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
