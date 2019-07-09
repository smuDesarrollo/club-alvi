<?php

require'db.php';

$objData = new Database();

$sth = $objData->prepare('SELECT * FROM inscribete');

$sth->execute();

$sth->setFetchMode(PDO::FETCH_ASSOC);

print( htmlentities($result) );

$result = $sth->fetchAll();

            
            if($result){
                foreach ($result as $key => $value) {?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['nombre'];?></td>
                <td><?php echo $value['direccion'];?></td>
                <td><?php echo $value['telefono'];?></td>
                <td><?php echo $value['rut'];?></td>
                <td><?php echo $value['comerciante'];?></td>
                <td><?php echo $value['rut_comercio'];?></td>
                <td><?php echo $value['direccion_comercio'];?></td>
                <td><?php echo $value['rubro'];?></td>
                <td><?php echo $value['documento'];?></td>
                <td><?php echo $value['email'];?></td>
                <td><?php echo $value['terminos'];?></td>
                <td><a href="modificar.php?id=<?php echo $value['idDato'];?>">Modificar</a></td>
                <td><a href="eliminar.php?id=<?php echo $value['idDato'];?>">Eliminar</a></td>
            </tr>
            <?php
                
            }
            
                
            }else{?>
            <tr>
                <td colspan="4">No hay registros para mostrar</td>
            </tr><?php
                
            }



?>