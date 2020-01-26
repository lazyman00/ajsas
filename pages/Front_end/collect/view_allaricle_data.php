<?php  include('../../../connect/connect.php'); ?>


<div class="modal-body">

    <div style="overflow-x: hidden; overflow-y: scroll; height: 350px;">
        <?php 
        $sql = sprintf("SELECT  a.*, b.type_article_name FROM tb_collect as a left join type_article as b on a.type_article_id = b.type_article_id WHERE a.`id_collect` = %s",GetSQLValueString($_POST['id_collect'], 'int'));
        $query = $conn->query($sql);
        $row_1 = $query->fetch_assoc();
        ?>

        <p><b>ชื่อวารสาร :</b> <?php echo $row_1['name_collect']; ?></p>
        <p>สาขา : <?php echo $row_1['type_article_name']; ?> ปีที่ : <?php echo $row_1['y_collect']; ?> ครั้งที่ : <?php echo $row_1['time_collect']; ?></p>

        <?php 
        $sql = sprintf("SELECT  * FROM tb_collect_list as a left join article as b on a.article_id = b.article_id WHERE a.`id_collect` = %s",GetSQLValueString($_POST['id_collect'], 'int'));
        $query = $conn->query($sql);
        ?>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">บทความ</th>
                    <th scope="col">หน้าที่</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; while ($row = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $i;  ?></td>
                        <td><?php echo $row['article_name_th']; ?> :</td>
                        <td><?php echo $row['page']; ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>


        </div>



    </div>
    <div class="modal-footer" style="display: block; text-align: -webkit-center;">

        <table>
            <tr>
                <td><button type="button" id="Edit_add_journalModal" data-row='<?php echo json_encode($row_1); ?>' class="btn btn-primary ">แก้ไขข้อมูล</button></td>
                <td><button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button></td>
            </tr>
        </table>



    </div>

    <script type="text/javascript">
        $('#Edit_add_journalModal').click(function(event) {
            var row = $(this).data('row');

            $('[name=name_collect]').val(row.name_collect);
            $('[name=y_collect]').val(row.y_collect);
            $('[name=time_collect]').val(row.time_collect);
            $('[name=type_article_id]').val(row.type_article_id);
            $('#add_article').prop('disabled', false);

            var type_article_id = row.type_article_id;
            var id_collect = row.id_collect;
            $.post('collect/view_aricle_sec.php', { type_article_id: type_article_id, link: 'edit', id_collect: id_collect }, function(data) {
                $('#tableAdd').html(data);
            });
            
            $('#add_journalModal').modal('show');
            $('#add_journalModal').css('z-index', '1060');
            $('.modal-backdrop').eq(1).css("z-index", "1059");
        });

        $('#add_journalModal').on('hidden.bs.modal', function () {
            $('body').addClass('modal-open');
            $('#add_journalModal').removeAttr('style');
        });

    </script>



