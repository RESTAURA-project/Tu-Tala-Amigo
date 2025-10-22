<?php include'db_connect.php' ?>

<style>
@media only screen and (max-width: 1240px) {

    #unseen table td:nth-child(1),
    #unseen table th:nth-child(3) {
        display: none;
    }
}

@media only screen and (max-width: 640px) {

    #unseen table td:nth-child(1),
    #unseen table th:nth-child(1),
    #unseen table td:nth-child(4),
    #unseen table th:nth-child(4),
    #unseen table td:nth-child(3),
    #unseen table th:nth-child(3),
    #unseen table th:nth-child(3) {
        display: none;
    }
}

@media only screen and (max-width: 640px) {
    .tablita {
        margin-right: 15px;
        margin-left: 25px;
        margin-top: 5px;
        margin-bottom: 10px;

    }
}
</style>

<div class="col-lg-12">
    <div class="card card-outline card-warning">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-default btn-flat border-primary"
                    href="./index.php?page=nuevo_usuario"><i class="fa fa-plus"></i> Agregar usuario</a>
            </div>
        </div>
        <section id="unseen" class=" tablita">
            <div class="card-body">
                <table class="table tabe-hover  " id="list">
                    <colgroup>
                        <col width="5%">
                        <col width="20%">
                        <col width="35%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">

                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$i = 1;
					$type = array('',"Admin","Fenología","Germinación", "Fenología+Germinación");
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td><b><?php echo ucwords($row['name']) ?></b></td>
                            <td><b><?php echo $row['email'] ?></b></td>
                            <td><b><?php echo $type[$row['type']] ?></b></td>
                            <td class="text-center">
                                <button type="button" class="fas fa-edit btn btn-warning btn-sm" data-toggle="dropdown"
                                    aria-expanded="true">
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="./index.php?page=editar_usuario&id=<?php echo $row['id'] ?>">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_user" href="javascript:void(0)"
                                        data-id="<?php echo $row['id'] ?>">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#list').dataTable({
        "paging": false

    });
    $('.view_user').click(function() {
        uni_modal("<i class='fa fa-id-card'></i> User Details", "view_user.php?id=" + $(this).attr(
            'data-id'))
    })
    $('.delete_user').click(function() {
        _conf("Seguro que desea eliminar este usuario?", "delete_user", [$(this).attr('data-id')])
    })
})

function delete_user($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_user',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            }
        }
    })
}
</script>