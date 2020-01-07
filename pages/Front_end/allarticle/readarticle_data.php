<?php  include('../../connect/connect.php'); ?>

<?php

$type          = $_GET["action"]; 
$page          = $_GET["page"];
$search_name   = $_POST['search_name'];
$search_name2  = $_POST['search_name2'];
$search_name3  = $_POST['search_name3'];


$total_record  ="";
$total_page    ="";

$perpage       = 10;
$data_last     = $page * $perpage;
$data_first    = $data_last - $perpage;

if($data_last <= 10)
{
    $i = 1;
}
else 
{
    $i = $data_last-9;
}

if($type=="showdata_table"){


    $display_n2 = ($search_name != "") ? "" :  "display:none" ;

        if(!empty($search_name))
        {
            $search_name = " AND concat(m.article_id, ' ', m.article_name_th) Like '%".$search_name."%' ";         
            
        }else{
            //echo "ไม่มีมีค่า";
            $search_name ="";
        }

        if(!empty($search_name2))
        { 

            $search_name2 = " AND concat(m.article_id, ' ', m.article_name_th) Like '%".$search_name2."%' ";         
            
        }else{
            //echo "ไม่มีมีค่า";
            $search_name2 ="";
        }

        if(!empty($search_name3))
        { 

            $search_name3 = " AND concat(m.article_id, ' ', m.article_name_th) Like '%".$search_name3."%' ";         
            
        }else{
            //echo "ไม่มีมีค่า";
            $search_name3 ="";
        }
        
    
    if($search_name == "" && $search_name2 == "" && $search_name3 == "" ){

        $sql="SELECT * FROM article
        left join type_article on type_article.type_article_id = article.type_article_id
         ";

    }else{

        $sql = "SELECT * FROM ( 
            SELECT ROW_NUMBER() OVER (ORDER BY m.article_id DESC) as row,
            m.article_id, m.article_name_th , ta.type_article_name
            FROM article AS m
            left join type_article as ta on ta.type_article_id = m.type_article_id
            WHERE m.article_id is not null ".$search_name." ".$search_name2." ".$search_name3." ) AS tb
    
        WHERE tb.row > ".$data_first." AND tb.row <= ".$data_last;

    }

// echo $sql;
    $result = $conn->query($sql); //or die($conn->error);
    $fetch = $result->fetch_assoc();
    $nom_row = $result->num_rows;

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;

?>
    <div class="container">    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col">ชื่อบทความ</th>
                    <th scope="col">สาขา</th>
                    <th scope="col" style="width: 20%">Download</th>
                    <th scope="col" style="width: 15%">ประเมิน</th>  
                    <th scope="col" style="width: 15%" >วันที่</th>                                 
                </tr>
                </thead>
                <tbody>
<?php             $selectall=1; 
                if($nom_row >0)
                {
                    do{ 
?>                   
                    <tr>
                    <th scope="row" style="padding-bottom: 6px; padding-top: 6px;"><?php echo $selectall; ?></th>
                    <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["article_name_th"]  ?></td>
                    <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["type_article_name"]  ?></td>
                    <td style="padding-bottom: 6px; padding-top: 6px;"><a href="../files_work/<?php echo $fetch["attach_article"] ?>">ดาวน์โหลด</a></td>
                    <td style="padding-bottom: 6px; padding-top: 6px;"><a href="assessment.php?article_id=<?php echo $fetch['article_id']; ?>" > <button class="btn btn-outline-secondary btn-sm">ประเมิน</button></a></td>
                    <td style="padding-bottom: 6px; padding-top: 6px;">1 มิถุนายน 2558</td>
                    </tr>
                    

<?php
                    $selectall++; 
                    }while($fetch = $result->fetch_assoc()); 
                }   
                else
                {

                }
?>
                </tbody>
            </table>   
        </div>      
    </div>

<?php
}
?>
