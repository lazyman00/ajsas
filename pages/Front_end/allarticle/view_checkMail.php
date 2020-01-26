<?php  include('../../../connect/connect.php'); ?>
<!-- <div class="row" style="padding-top: 15px;padding-bottom: 10px;">
    <div class="col"><button style="float: right;" type="button" id="add_Professional" data-type_article_id="<?php // echo $_GET['type_article_id']; ?>" data-article_id="<?php // echo $_GET['article_id']; ?>" class="btn btn-primary">เพิ่มผู้ทรงคุณวุฒิ</button></div>
</div> -->
<!-- <table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table> -->



<script type="text/javascript">
    $('#add_Professional').click(function(event) {
        var type_article_id = $(this).attr('data-type_article_id');
        var article_id = $(this).attr('data-article_id');

        $('#modal_Professional').modal({
            show : true,
            backdrop : 'static' 
        });
        $('#modal_Professional').css('padding-left', '0px');
        $('.modal-backdrop').eq(1).css("z-index", "1059");
        $.get('allarticle/view_Professional.php',{ type_article_id: type_article_id }, function(data) {
            $('#view_Professional').html(data);
        });


    });
</script>