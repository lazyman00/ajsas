<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>วารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../../fontawesome/css/fontawesome.css" >
	<link rel="stylesheet" href="../../fontawesome/css/all.css" >
	<link rel="stylesheet" href="../../fontawesome/css/brands.css" >
	<link rel="stylesheet" href="../../fontawesome/css/solid.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>
</head>
<style>
/* thai */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWzVaF5NQ.woff2) format('woff2');
  unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
}
/* vietnamese */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWoVaF5NQ.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWpVaF5NQ.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWnVaE.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
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
/* thai */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: local('Kanit ExtraLight'), local('Kanit-ExtraLight'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr5aOhWzVaF5NQ.woff2) format('woff2');
  unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
}
/* vietnamese */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: local('Kanit ExtraLight'), local('Kanit-ExtraLight'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr5aOhWoVaF5NQ.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: local('Kanit ExtraLight'), local('Kanit-ExtraLight'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr5aOhWpVaF5NQ.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: local('Kanit ExtraLight'), local('Kanit-ExtraLight'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr5aOhWnVaE.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
	body{
	font-family: 'Kanit Light';
}div{
	font-family: 'Kanit';
}h3{
	font-family: 'Kanit Light';
}option{
	font-family: 'Kanit Light';
}select{
	font-family: 'Kanit Light';
}tbody{
	font-family: 'Kanit Light';
}input{
	font-family: 'Kanit Light';
}textarea{
	font-family: 'Kanit Light';
}p1{
	font-family: 'Kanit Light';
}p{
	font-family: 'Kanit ExtraLight';
}
</style>

