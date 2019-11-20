<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="\node_modules\bootstrap\dist\css\bootstrap.min.css"> -->
    <title>send_article</title>
</head>

<body class="bg-light">
       
        <div  class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">วารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
                <a class="p-2 text-dark" href="#">บรรณาธิการ</a>
                <a class="p-2 text-dark" href="#">การส่ง</a>
                <a class="p-2 text-dark" href="#">ประกาศ</a>
                <a class="p-2 text-dark" href="#">ติดต่อ</a>
            </nav>
            <a class="btn btn-outline-primary" href="#">เข้าสู่ระบบ</a>
        </div>
       
<div class="container">
<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm"></div>


        <div class="card" >
            <div class="card-body">
                <label>หลังจากที่ผู้ทรงวุฒิฯ ประเมินและ comment ... ---> เสร็จ </label>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">รายการบทความวิชาการ (comment)</li>
                        </ol>
                    </nav>     
                    <div class="table-responsive">
                            <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col" style="width: 5%">#</th>
                                        <th scope="col">ชื่อบทความ</th>
                                        <th scope="col" style="width: 20%">ชื่อผู้ทรงวุฒิฯ</th>
                                        <th scope="col" style="width: 15%">คะแนน</th>  
                                        <th scope="col" style="width: 15%" >Download</th>                               
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row" style="padding-bottom: 6px; padding-top: 6px;">1</th>
                                        <td style="padding-bottom: 6px; padding-top: 6px;">ชื่อบทความ</td>
                                        <td style="padding-bottom: 6px; padding-top: 6px;">ชื่อผู้ทรงวุฒิฯ</td>
                                        <td style="padding-bottom: 6px; padding-top: 6px;">คะแนน</td>
                                        <td  style="padding-bottom: 6px; padding-top: 6px;">Download</td>
                                      </tr>
                                    </tbody>
                                  </table>     
                        </div>         
            </div>
        </div>
</div> 

      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>    
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('detail_th');
        function CKupdate() {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
        }
    </script>
    <script>
        CKEDITOR.replace('detail_en');
        function CKupdate() {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
        }
    </script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>