<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../jquery-validation-1.19.0/dist/jquery.validate.js"></script>


<script type="text/javascript">
 
    $('.btnUp').click(function(event) {
        // alert(1);
        var row = $(this).data( "row" );
        //console.log(row);
        $('#name_th').val(row.name_th);
        $('#surname_th').val(row.surname_th);
        $('#name_en').val(row.name_en);
        $('#surname_en').val(row.surname_en);
        $('#address_user').val(row.address_user);
        $('#phonenumber_user').val(row.phonenumber_user);
        $('#type_title_id').val(row.type_title_id);
        $('#type_title_name').val(row.type_title_name);
        $('#pre_id').val(row.pre_id);
        $('#pre_en').val(row.pre_en); 
        $('#pre_th_short').val(row.pre_th_short); 
        $('#pre_en_short').val(row.pre_en_short);
        

        $("#myModal").modal({backdrop: true});
    });
</script>