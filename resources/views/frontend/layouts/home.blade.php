<!DOCTYPE html>
<html lang="En">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="doctor appointment, doctor booking">
<meta name="author" content="Doctor Booking">
<meta property="og:url" content="javascript:void(0);">
<meta property="og:type" content="website">
<meta property="og:title" content="Doctors Appointment Website">
<meta property="og:description" content="The responsive professional offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
<meta property="og:image" content="assets/img/preview-banner.jpg">
<meta name="twitter:card" content="summary_large_image">
<title>{{ config('app.name') }}</title>

<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<style type="text/css">
@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0900-097F,U+1CD0-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FF;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Poppins;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
</style>
<style type="text/css">
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:200;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts//normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:300;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:400;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:500;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:600;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:700;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:800;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0370-03FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}
@font-face {font-family:Inter;font-style:normal;font-weight:900;src:url(assets/fonts/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}
</style>

<link rel="stylesheet" href="assets/css/feather.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/aos.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/responsive-tabs.css">

</head>
<body>

<div class="main-wrapper">
    
    <header class="header header-custom header-fixed header-one">
    	<div class="hdr-top">
        	<div class="container">
                <div class="col-lg-6 col-sm-6 col-12 float-start aos" data-aos="fade-up">
                    <div class="hdr-top-left">
                        <a href=""><i class="feather-phone-call"></i> +90 123 456 7890</a>
                        <a href="javascript:void(0);"><i class="feather-mail"></i> info@minidoctor.com</a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12 float-end aos" data-aos="fade-up">
                    <div class="hdr-top-right">
                        <ul>
                            <li><a href="">CAREER</a></li>
                            <li><a href="">CONSULT US</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        </span>
                    </a>
                    <a href="index.html" class="navbar-brand logo"><img src="assets/img/logo.png" class="img-fluid" alt="Logo"></a>
                    <a href="" class="logo-language">Pakistan</a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.html" class="menu-logo"><img src="assets/img/logo.png" class="img-fluid" alt="Logo"></a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);"><i class="fas fa-times"></i></a>
                    </div>
                    <ul class="main-nav">
                        <li class="has-submenu megamenu active"><a href="javascript:void(0);">HOME</a></li>
                        <li class="has-submenu"><a href="javascript:void(0);">SERVICES</a></li>
                        <li class="has-submenu"><a href="javascript:void(0);">OFFERS</a></li>
                        <li class="has-submenu"><a href="javascript:void(0);">OUR BLOGS</a></li>
                        <li class="has-submenu"><a href="javascript:void(0);">CONTACT US</a></li>
                        <li class="searchbar"><a href="javascript:void(0);"><i class="feather-search"></i></a>
                            <div class="togglesearch">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <button type="submit" class="btn">Search</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="login-link"><a href="javascript:void(0);">Login / Signup</a></li>
                        <li class="register-btn"><a href="javascript:void(0);" class="btn reg-btn"><i class="feather-user"></i>Register</a></li>
                        <li class="register-btn"><a href="javascript:void(0);" class="btn btn-primary log-btn"><i class="feather-lock"></i>Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos" data-aos="fade-up">
                        <h1>Consult <span>Best Doctors</span> Your Nearby Location.</h1>
                        <img src="assets/img/icons/header-icon.svg" class="header-icon" alt="header-icon">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                        <a href="javascript:void(0);" class="btn">Start a Consult</a>
                        <div class="banner-arrow-img"><img src="assets/img/down-arrow-img.png" class="img-fluid" alt="down-arrow"></div>
                    </div>
                    <div class="search-box-one aos" data-aos="fade-up">
                        <form action="#">
                            <div class="search-input search-line"><i class="feather-search bficon"></i>
                                <div class=" mb-0"><input type="text" class="form-control" placeholder="Search doctors, clinics, hospitals, etc"></div>
                            </div>
                            <div class="search-input search-map-line"><i class="feather-map-pin"></i>
                                <div class=" mb-0">
                                    <input type="text" class="form-control" placeholder="Location">
                                    <a class="current-loc-icon current_location" href="javascript:void(0);"><i class="feather-crosshair"></i></a>
                                </div>
                            </div>
                            <div class="search-input search-calendar-line"><!--<i class="feather-calendar"></i>-->
                                <div class=" mb-0">
                                	<select type="text" class="form-control input-select">
                                		<option>Hair Transplant</option>
                                        <option>Plastic Surgery</option>
                                        <option>Otopedic</option>
                                        <option>Dentistty</option>
                                        <option>RhinoplastyHINOPLASTY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-search-btn">
                                <button class="btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img aos" data-aos="fade-up"><img src="assets/img/banner-img.png" class="img-fluid" alt="patient-image">
                        <div class="banner-img1"><img src="assets/img/banner-img1.png" class="img-fluid" alt="checkup-image"></div>
                        <div class="banner-img2"><img src="assets/img/banner-img2.png" class="img-fluid" alt="doctor-slide"></div>
                        <div class="banner-img3"><img src="assets/img/banner-img3.png" class="img-fluid" alt="doctors-list"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section class="pricing-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3 col-sm-6 col-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                    	<div class="specialities-img">
                            <span><img src="assets/img/health-img.jpg" alt="heart-image"></span>
                        </div>
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-title">
                                        <h4>Health Check</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                    	<div class="specialities-img">
                            <span><img src="assets/img/specialist.jpg" alt="heart-image"></span>
                        </div>
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-title">
                                        <h4>Hire a Specialist</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                    	<div class="specialities-img">
                            <span><img src="assets/img/medical.jpg" alt="heart-image"></span>
                        </div>
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-title">
                                        <h4>Medical Tourism</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                    	<div class="specialities-img">
                            <span><img src="assets/img/consult.jpg" alt="heart-image"></span>
                        </div>
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-title">
                                        <h4>Consult us</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="specialities-section-one">
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-header-one section-header-slider">
                        <h2 class="section-title">Specialities</h2>
                    </div>
                </div>
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="owl-nav slide-nav-1 text-end nav-control"></div>
                </div>
            </div>
            <div class="owl-carousel specialities-slider-one owl-theme aos" data-aos="fade-up">
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-01.svg" alt="heart-image"></span>
                        </div>
                        <h3>Obstetrician And Gynaecologists</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-02.svg" alt="brain-image"></span>
                        </div>
                        <h3>Neurology</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-03.svg" alt="kidney-image"></span>
                        </div>
                        <h3>Urology</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-04.svg" alt="bone-image"></span>
                        </div>
                        <h3>Orthopedic</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-05.svg" alt="dentist"></span>
                        </div>
                        <h3>Dentist</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-06.svg" alt="eye-image"></span>
                        </div>
                        <h3>Ophthalmology</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="specialities-item">
                        <div class="specialities-img">
                            <span><img src="assets/img/specialities/specialities-02.svg" alt="brain-image"></span>
                        </div>
                        <h3>Neurology</h3>
                    </div>
                </div>
            </div>
            <div class="specialities-btn aos" data-aos="fade-up"><a href="javascript:void(0);" class="btn">See All Specialities</a></div>
        </div>
    </section>

    <section class="doctors-section">
        <div class="container">
        	
            <div class="card">
                <div class="card-body product-description">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img1"><img src="assets/img/banner-fifteen-ryt.png" class="img-fluid fa-flip-horizontal" alt="User Image"></div>
                            <div class="doc-info-cont product-cont">
                                <h2 class="section-title">We can help you to find doctor</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                <div class="search-box-two aos" data-aos="fade-up">
                                    <form action="#">
                                        <div class="search-input search-line2"><i class="feather-search bficon"></i>
                                            <div class=" mb-0"><input type="text" class="form-control" placeholder="Search doctors, clinics, hospitals, etc"></div>
                                        </div>
                                        <div class="form-search-btn">
                                            <button class="btn" type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!--<div class="appointments">
                <div class="appointment-list">
                    <div class="profile-info-widget">
                        <a href="patient-profile.html" class="booking-doc-img">
                            <img src="assets/img/patients/patient11.jpg" alt="User Image">
                        </a>
                        <div class="profile-det-info">
                            <h3><a href="patient-profile.html">Harry Williams</a></h3>
                            <div class="patient-details">
                                <h5><i class="far fa-clock"></i> 3 Nov 2023, 6.00 PM</h5>
                                <h5><i class="fas fa-map-marker-alt"></i> Colorado, United States</h5>
                                <h5><i class="fas fa-envelope"></i> <a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="abc3cad9d9d2dcc2c7c7c2cac6d8ebced3cac6dbc7ce85c8c4c6">[email&#160;protected]</a></h5>
                                <h5 class="mb-0"><i class="fas fa-phone"></i> +1 303 607 7075</h5>
                            </div>
                        </div>
                    </div>
                    <div class="appointment-action">
                        <a href="#" class="btn btn-sm bg-info-light" data-bs-toggle="modal" data-bs-target="#appt_details">
                            <i class="far fa-eye"></i> View
                        </a>
                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                            <i class="fas fa-check"></i> Accept
                        </a>
                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>-->        
        	<!--<div class="card-body pt-0">
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
                        </li>
                    </ul>
                </nav>

                <div class="tab-content pt-0">
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-03.jpg" class="img-fluid" alt="Ruby Perrin"></div>
                                        </a>
                                        <div class="doctor-amount">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Ruby Perrin</a>
                                                <p>Cardiology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (35)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-04.jpg" class="img-fluid" alt="Darren Elder"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Darren Elder</a>
                                                <p>Neurology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.0</span> (20)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Florida, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-05.jpg" class="img-fluid" alt="Sofia Brient"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Sofia Brient</a>
                                                <p>Urology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (30)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-02.jpg" class="img-fluid" alt="Paul Richard"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Paul Richard</a>
                                                <p>Orthopedic</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.3</span> (45)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-01.jpg" class="img-fluid" alt="John Doe"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. John Doe</a>
                                                <p>Dentist</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.4</span> (50)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> California, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                        <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-03.jpg" class="img-fluid" alt="Ruby Perrin"></div>
                                        </a>
                                        <div class="doctor-amount">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Ruby Perrin</a>
                                                <p>Cardiology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (35)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-04.jpg" class="img-fluid" alt="Darren Elder"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Darren Elder</a>
                                                <p>Neurology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.0</span> (20)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Florida, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-05.jpg" class="img-fluid" alt="Sofia Brient"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Sofia Brient</a>
                                                <p>Urology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (30)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-02.jpg" class="img-fluid" alt="Paul Richard"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Paul Richard</a>
                                                <p>Orthopedic</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.3</span> (45)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-01.jpg" class="img-fluid" alt="John Doe"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. John Doe</a>
                                                <p>Dentist</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.4</span> (50)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> California, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                        <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-03.jpg" class="img-fluid" alt="Ruby Perrin"></div>
                                        </a>
                                        <div class="doctor-amount">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Ruby Perrin</a>
                                                <p>Cardiology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (35)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-04.jpg" class="img-fluid" alt="Darren Elder"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Darren Elder</a>
                                                <p>Neurology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.0</span> (20)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Florida, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-05.jpg" class="img-fluid" alt="Sofia Brient"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Sofia Brient</a>
                                                <p>Urology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (30)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-02.jpg" class="img-fluid" alt="Paul Richard"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Paul Richard</a>
                                                <p>Orthopedic</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.3</span> (45)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-01.jpg" class="img-fluid" alt="John Doe"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. John Doe</a>
                                                <p>Dentist</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.4</span> (50)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> California, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <div class="owl-carousel doctor-slider-one owl-theme aos" data-aos="fade-up">
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-03.jpg" class="img-fluid" alt="Ruby Perrin"></div>
                                        </a>
                                        <div class="doctor-amount">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Ruby Perrin</a>
                                                <p>Cardiology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (35)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Newyork, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-04.jpg" class="img-fluid" alt="Darren Elder"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Darren Elder</a>
                                                <p>Neurology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.0</span> (20)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Florida, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-05.jpg" class="img-fluid" alt="Sofia Brient"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Sofia Brient</a>
                                                <p>Urology</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.5</span> (30)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Georgia, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-02.jpg" class="img-fluid" alt="Paul Richard"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. Paul Richard</a>
                                                <p>Orthopedic</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.3</span> (45)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> Michigan, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-profile-widget">
                                    <div class="doc-pro-img">
                                        <a href="javascript:void(0);">
                                            <div class="doctor-profile-img"><img src="assets/img/doctors/doctor-01.jpg" class="img-fluid" alt="John Doe"></div>
                                        </a>
                                    </div>
                                    <div class="doc-content">
                                        <div class="doc-pro-info">
                                            <div class="doc-pro-name">
                                                <a href="javascript:void(0);">Dr. John Doe</a>
                                                <p>Dentist</p>
                                            </div>
                                            <div class="reviews-ratings">
                                                <p>
                                                    <span><i class="fas fa-star"></i> 4.4</span> (50)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="doc-pro-location">
                                            <p><i class="feather-map-pin"></i> California, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
			</div>-->      
        </div>
    </section>
    
    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center aos" data-aos="fade-up">
                    <div class="section-header-one">
                        <h2 class="section-title">Packages</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 col-sm-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span><img src="assets/img/icons/price-icon1.svg" alt="icon"></span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For</p>
                                        <h4>Individuals</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$99 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Lorem ipsum dolor amet, consectetur </li>
                                        <li>Lorem ipsum amet, consectetur </li>
                                        <li>Lorem ipsum dolor amet, consectetur </li>
                                        <li>Lorem ipsum amet, consectetur </li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="login-email.html" class="btn">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 aos" data-aos="fade-up">
                    <div class="card pricing-card pricing-card-active">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span><img src="assets/img/icons/price-icon2.svg" alt="icon"></span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For</p>
                                        <h4>Clinic</h4>
                                    </div>
                                    <div class="pricing-tag">
                                        <span>Popular</span>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$199 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Lorem ipsum dolor amet, consectetur</li>
                                        <li>Lorem ipsum amet, consectetur</li>
                                        <li>Neque porro quisquam est, qui dolorem</li>
                                        <li>Lorem ipsum dolor amet, consectetur</li>
                                        <li>Lorem ipsum amet, consectetur</li>
                                        <li>Sed ut perspiciatis unde</li>
                                        <li>Nemo enim ipsam voluptatem</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="login-email.html" class="btn">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 aos" data-aos="fade-up">
                    <div class="card pricing-card">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span><img src="assets/img/icons/price-icon3.svg" alt="icon"></span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For</p>
                                        <h4>Hospital</h4>
                                    </div>
                                </div>
                                <div class="pricing-header-text">
                                    <p>Lorem ipsum dolor consectetur adipiscing elit,sed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$399 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Lorem ipsum dolor amet, consectetur </li>
                                        <li>Lorem ipsum amet, consectetur </li>
                                        <li>Lorem ipsum dolor amet, consectetur </li>
                                        <li>Lorem ipsum amet, consectetur </li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="login-email.html" class="btn">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="work-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 work-img-info aos" data-aos="fade-up">
                    <div class="work-img"><img src="assets/img/work-img.png" class="img-fluid" alt="doctor-image"></div>
                </div>
                <div class="col-lg-8 col-md-12 work-details">
                    <div class="section-header-one aos" data-aos="fade-up">
                        <h5>How it Works</h5>
                        <h2 class="section-title">4 easy steps to get your solution</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="assets/img/icons/work-01.svg" alt="search-doctor-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Search Doctor</h5>
                                    <p>Lorem ipsum dolor consectetur adipiscing elit, tempor incididunt labore dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="assets/img/icons/work-02.svg" alt="doctor-profile-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Check Doctor Profile</h5>
                                    <p>Lorem ipsum dolor consectetur adipiscing elit, tempor incididunt labore dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="assets/img/icons/work-03.svg" alt="calendar-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Schedule Appointment</h5>
                                    <p>Lorem ipsum dolor consectetur adipiscing elit, tempor incididunt labore dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="assets/img/icons/work-04.svg" alt="solution-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Get Your Solution</h5>
                                    <p>Lorem ipsum dolor consectetur adipiscing elit, tempor incididunt labore dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 aos" data-aos="fade-up">
                        	<div class="col-lg-4 col-md-6 col-6 float-start aos p-2 mb-3" data-aos="fade-up">
                                <div class="pricing-info">
                                    <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Register as a Doctor</a></div>
                                </div>
                            </div>
                        	<div class="col-lg-4 col-md-6 col-6 float-start aos p-2 mb-3" data-aos="fade-up">
                                <div class="pricing-info">
                                    <div class="pricing-btn"><a href="javascript:void(0);" class="btn">Make an Appointment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="articles-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aos" data-aos="fade-up">
                    <div class="section-header-one text-center">
                        <h2 class="section-title">Latest Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex aos" data-aos="fade-up">
                    <div class="articles-grid w-100">
                        <div class="articles-info">
                            <div class="articles-left">
                                <a href="javascript:void(0);">
                                    <div class="articles-img"><img src="assets/img/blog/blog-11.jpg" class="img-fluid" alt="John Doe"></div>
                                </a>
                            </div>
                            <div class="articles-right">
                                <div class="articles-content">
                                    <ul class="articles-list nav">
                                        <li><i class="feather-user"></i> John Doe</li>
                                        <li><i class="feather-calendar"></i> 13 Aug, 2023</li>
                                    </ul>
                                    <h4><a href="javascript:void(0);">Making your clinic painless visit?</a></h4>
                                    <p>Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                    <a href="javascript:void(0);" class="btn">View Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-6 col-md-6 d-flex aos" data-aos="fade-up">
                <div class="articles-grid w-100">
                    <div class="articles-info">
                        <div class="articles-left">
                            <a href="javascript:void(0);">
                                <div class="articles-img"><img src="assets/img/blog/blog-12.jpg" class="img-fluid" alt="Darren Elder"></div>
                            </a>
                        </div>
                        <div class="articles-right">
                            <div class="articles-content">
                                <ul class="articles-list nav">
                                    <li><i class="feather-user"></i> Darren Elder</li>
                                    <li><i class="feather-calendar"></i> 10 Sep, 2023</li>
                                </ul>
                                <h4><a href="javascript:void(0);">What are the benefits of Online Doctor Booking?</a></h4>
                                <p>Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                <a href="javascript:void(0);" class="btn">View Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex aos" data-aos="fade-up">
                <div class="articles-grid w-100">
                    <div class="articles-info">
                        <div class="articles-left">
                            <a href="javascript:void(0);">
                                <div class="articles-img"><img src="assets/img/blog/blog-13.jpg" class="img-fluid" alt="Ruby Perrin"></div>
                            </a>
                        </div>
                        <div class="articles-right">
                            <div class="articles-content">
                                <ul class="articles-list nav">
                                    <li><i class="feather-user"></i> Ruby Perrin</li>
                                    <li><i class="feather-calendar"></i> 30 Oct, 2023</li>
                                </ul>
                                <h4><a href="javascript:void(0);">Benefits of consulting with an Online Doctor</a></h4>
                                <p>Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                <a href="javascript:void(0);" class="btn">View Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex aos" data-aos="fade-up">
                <div class="articles-grid w-100">
                    <div class="articles-info">
                        <div class="articles-left">
                            <a href="javascript:void(0);">
                                <div class="articles-img"><img src="assets/img/blog/blog-14.jpg" class="img-fluid" alt="Sofia Brient"></div>
                            </a>
                        </div>
                        <div class="articles-right">
                            <div class="articles-content">
                                <ul class="articles-list nav">
                                    <li><i class="feather-user"></i> Sofia Brient</li>
                                    <li><i class="feather-calendar"></i> 08 Nov, 2023</li>
                                </ul>
                                <h4><a href="javascript:void(0);">5 Great reasons to use an Online Doctor</a></h4>
                                <p>Sed perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                <a href="javascript:void(0);" class="btn">View Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-one text-center aos" data-aos="fade-up">
                        <h5>Get Your Answer</h5>
                        <h2 class="section-title">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 aos" data-aos="fade-up">
                    <div class="faq-img"><img src="assets/img/faq-img.png" class="img-fluid" alt="img">
                        <div class="faq-patients-count">
                            <div class="faq-smile-img"><img src="assets/img/icons/smiling-icon.svg" alt="icon"></div>
                            <div class="faq-patients-content">
                                <h4><span class="count-digit">95</span>k+</h4>
                                <p>Happy Patients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="faq-info aos" data-aos="fade-up">
                        <div class="accordion" id="faq-details">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="javascript:void(0);collapseOne" aria-expanded="true" aria-controls="collapseOne">Can i make an Appointment Online with White Plains Hospital Kendi?</a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="javascript:void(0);faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="javascript:void(0);collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Can i make an Appointment Online with White Plains Hospital Kendi?</a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="javascript:void(0);faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="javascript:void(0);collapseThree" aria-expanded="false" aria-controls="collapseThree">Can i make an Appointment Online with White Plains Hospital Kendi?</a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="javascript:void(0);faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="javascript:void(0);collapseFour" aria-expanded="false" aria-controls="collapseFour">Can i make an Appointment Online with White Plains Hospital Kendi?</a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="javascript:void(0);faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="javascript:void(0);collapseFive" aria-expanded="false" aria-controls="collapseFive">Can i make an Appointment Online with White Plains Hospital Kendi?</a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="javascript:void(0);faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider slick">
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img"><img src="assets/img/clients/client-01.jpg" class="img-fluid" alt="John Doe"></div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <h6><span>John Doe</span> New York</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img"><img src="assets/img/clients/client-02.jpg" class="img-fluid" alt="Amanda Warren"></div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <h6><span>Amanda Warren</span> Florida</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img"><img src="assets/img/clients/client-03.jpg" class="img-fluid" alt="Betty Carlson"></div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <h6><span>Betty Carlson</span> Georgia</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img"><img src="assets/img/clients/client-04.jpg" class="img-fluid" alt="Veronica"></div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <h6><span>Veronica</span> California</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img"><img src="assets/img/clients/client-05.jpg" class="img-fluid" alt="Richard"></div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <h6><span>Richard</span> Michigan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partners-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-one text-center aos" data-aos="fade-up">
                        <h2 class="section-title">Our Partners</h2>
                    </div>
                </div>
            </div>
            <div class="partners-info aos" data-aos="fade-up">
                <ul class="owl-carousel partners-slider d-flex">
                    <li>
                        <a href="javascript:void(0);"><img class="img-fluid" src="assets/img/disadvisor-logo.png" alt="partners"></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <footer class="footer footer-one">
        <div class="footer-top aos" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
                            </div>
                            <div class="footer-about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">For Patients</h2>
                                    <ul>
                                        <li><a href="javascript:void(0);">Search for Doctors</a></li>
                                        <li><a href="javascript:void(0);">Login</a></li>
                                        <li><a href="javascript:void(0);">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">For Doctors</h2>
                                    <ul>
                                        <li><a href="javascript:void(0);">Appointments</a></li>
                                        <li><a href="javascript:void(0);">Chat</a></li>
                                        <li><a href="javascript:void(0);">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <div class="footer-widget footer-contact">
                                    <h2 class="footer-title">Contact Us</h2>
                                    <div class="footer-contact-info">
                                        <div class="footer-address">
                                            <p><i class="feather-map-pin"></i> Turkey</p>
                                        </div>
                                        <div class="footer-address">
                                            <p><i class="feather-phone-call"></i> +90 123 456 7890</p>
                                        </div>
                                        <div class="footer-address mb-0">
                                            <p><i class="feather-mail"></i> <a href="javascript:void(0);">info@minidoctor.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="footer-widget">
                            <h2 class="footer-title">Join Our Newsletter</h2>
                            <div class="subscribe-form">
                                <form action="javascript:void(0);">
                                    <input type="email" class="form-control" placeholder="Enter Email">
                                    <button type="submit" class="btn">Submit</button>
                                </form>
                            </div>
                            <div class="social-icon">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0"> Copyright © 2024 <a href="javascript:void(0);" target="_blank">Mini Doctor</a> All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-menu">
                                <ul class="policy-menu">
                                    <li><a href="javascript:void(0);">Privacy Policy</a></li>
                                    <li><a href="javascript:void(0);">Terms and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

</div>


<div class="progress-wrap active-progress">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
	    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/feather.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/moment.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/owl.carousel.min.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/slick.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/aos.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/counter.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/backToTop.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="assets/js/script.js" type="73ab6c06ae31d3df0e85205d-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="73ab6c06ae31d3df0e85205d-|49" defer></script>

		<script>
		const $tabsToDropdown = $(".tabs-to-dropdown");

function generateDropdownMarkup(container) {
  const $navWrapper = container.find(".nav-wrapper");
  const $navPills = container.find(".nav-pills");
  const firstTextLink = $navPills.find("li:first-child a").text();
  const $items = $navPills.find("li");
  const markup = `
    <div class="dropdown d-md-none">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ${firstTextLink}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
        ${generateDropdownLinksMarkup($items)}
      </div>
    </div>
  `;
  $navWrapper.prepend(markup);
}

function generateDropdownLinksMarkup(items) {
  let markup = "";
  items.each(function () {
    const textLink = $(this).find("a").text();
    markup += `<a class="dropdown-item" href="#">${textLink}</a>`;
  });

  return markup;
}

function showDropdownHandler(e) {
  // works also
  //const $this = $(this);
  const $this = $(e.target);
  const $dropdownToggle = $this.find(".dropdown-toggle");
  const dropdownToggleText = $dropdownToggle.text().trim();
  const $dropdownMenuLinks = $this.find(".dropdown-menu a");
  const dNoneClass = "d-none";
  $dropdownMenuLinks.each(function () {
    const $this = $(this);
    if ($this.text() == dropdownToggleText) {
      $this.addClass(dNoneClass);
    } else {
      $this.removeClass(dNoneClass);
    }
  });
}

function clickHandler(e) {
  e.preventDefault();
  const $this = $(this);
  const index = $this.index();
  const text = $this.text();
  $this.closest(".dropdown").find(".dropdown-toggle").text(`${text}`);
  $this
    .closest($tabsToDropdown)
    .find(`.nav-pills li:eq(${index}) a`)
    .tab("show");
}

function shownTabsHandler(e) {
  // works also
  //const $this = $(this);
  const $this = $(e.target);
  const index = $this.parent().index();
  const $parent = $this.closest($tabsToDropdown);
  const $targetDropdownLink = $parent.find(".dropdown-menu a").eq(index);
  const targetDropdownLinkText = $targetDropdownLink.text();
  $parent.find(".dropdown-toggle").text(targetDropdownLinkText);
}

$tabsToDropdown.each(function () {
  const $this = $(this);
  const $pills = $this.find('a[data-toggle="pill"]');

  generateDropdownMarkup($this);

  const $dropdown = $this.find(".dropdown");
  const $dropdownLinks = $this.find(".dropdown-menu a");

  $dropdown.on("show.bs.dropdown", showDropdownHandler);
  $dropdownLinks.on("click", clickHandler);
  $pills.on("shown.bs.tab", shownTabsHandler);
});

		</script>
        
</body>
</html>