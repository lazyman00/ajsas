<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>วารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</title>
  <!-- Custom fonts for this template-->
  <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
  <!-- Custom styles for this template-->
  <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../../bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../bootstrap/vendor/jquery/jquery.validate.min.js"></script>
  <script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../../bootstrap/js/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../../bootstrap/vendor/chart.js/Chart.min.js"></script>
  <!-- Page level plugins -->
  <script src="../../bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../../bootstrap/js/js/demo/datatables-demo.js"></script>
  <link href="../../bootstrap/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="../../bootstrap/js/js/bootstrap-toggle.min.js"></script>
  <!-- Page level custom scripts -->

  <!-- sweetalert --> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>

  <!-- select2 --> 
  <link rel="stylesheet" href="../../bootstrap/css/select2.css">
  <script src="../../bootstrap/js/select2.js"></script>
  
  <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    <style>
      .errors{
        color:red;
      }
      #name_add_row-error
      {
          color: "rad";
      }
      .toggle-handle{
        background-color: white;
      }
      .toggle-off{
        background-color: #E8E8E8;
      }
      a.nav-link::after{
        display: none;
      }
      input[type=radio] {
          width: 20px;
          height: 20px;
      }
      .add_pointer{
        cursor: pointer;
      }
      .modal-footer{
        display: block;
        text-align: -webkit-center;
      }
      .form-control:disabled, .form-control[readonly] {
          background-color: #e9ecef00;
          opacity: 1;
          color: #495057;
          background-color: #F5F5F5;
          border-color: #bccbda;
          outline: 0;
          box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0);  
          cursor: default;
      }
      .sech {
            padding:0 10px;
            height: 33px;
            box-sizing: border-box;
            border: 1px solid #CFCFCF;
            border-radius: 4px;
        }
        .sech:focus {     
            border: 1px solid #17a2b8;  
        }
        .sele_c {
            padding:0 10px;
            height: 40px;
            box-sizing: border-box;
            border: 1px solid #CFCFCF;
            border-radius: 4px;
        }
        .sele_c:focus {     
            border: 1px solid #17a2b8;  
        }
        /* thai */
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraBGwCYdA.woff2) format('woff2');
        unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
      }
      /* vietnamese */
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraaGwCYdA.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
      }
      /* latin-ext */
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcrabGwCYdA.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
      }
      /* latin */
      @font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraVGwA.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
      }
        body{
        font-family: 'Kanit';
      }div{
        font-family: 'Kanit';
      }h3{
        font-family: 'Kanit';
      }
      .select2-container .select2-selection--single {
          width:260px;
          height: 40px !important;
          border: 1px solid #CFCFCF;
          border-radius: 5px;
      }
      .select2-results__options{
          font-size:14px !important;
      }
      .select2-selection__rendered {
          font-size: 14px;
      }

    </style>

  </head>