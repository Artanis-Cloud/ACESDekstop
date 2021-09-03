<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
	/* FONTS */
    @media screen {
		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 400;
		  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
		}

		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 700;
		  src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
		}

		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 400;
		  src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
		}

		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 700;
		  src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
		}
    }

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }


    /* button */
    .bubbly-button {
      font-family: "Helvetica", "Arial", sans-serif;
      display: inline-block;
      font-size: 1em;
      padding: 1em 2em;
      /* margin-top: 100px; */
      margin-bottom: 20px;
      -webkit-appearance: none;
      appearance: none;
      background-color: #ff0081;
      color: #fff;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      position: relative;
      transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
      box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);
    }
    .bubbly-button:focus {
      outline: 0;
    }
    .bubbly-button:before, .bubbly-button:after {
      position: absolute;
      content: "";
      display: block;
      width: 140%;
      height: 100%;
      left: -20%;
      z-index: -1000;
      transition: all ease-in-out 0.5s;
      background-repeat: no-repeat;
    }
    .bubbly-button:before {
      display: none;
      top: -75%;
      background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 20%, #ff0081 20%, transparent 30%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
      background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
    }
    .bubbly-button:after {
      display: none;
      bottom: -75%;
      background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
      background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
    }
    .bubbly-button:active {
      transform: scale(0.9);
      background-color: #e60074;
      box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
    }
    .bubbly-button.animate:before {
      display: block;
      animation: topBubbles ease-in-out 0.75s forwards;
    }
    .bubbly-button.animate:after {
      display: block;
      animation: bottomBubbles ease-in-out 0.75s forwards;
    }

    @keyframes topBubbles {
      0% {
        background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
      }
      50% {
        background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
      }
      100% {
        background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
        background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
      }
    }
    @keyframes bottomBubbles {
      0% {
        background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
      }
      50% {
        background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
      }
      100% {
        background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
        background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
      }
    }
</style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    <!-- Looks like you tried signing in a few too many times. Let's see if we can get you back into your account. -->
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#fff" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        {{-- <a href="#" target="_blank"> --}}
                          <img src="https://cdn.shopify.com/s/files/1/0285/7395/8276/files/AC_logo_480x480.png?v=1594041628" style="height: 150px;" alt="homepage">
                        {{-- </a> --}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#fff" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="900" >
                <tr>
                    <td bgcolor="#00BDDD" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 24px; font-weight: bold; margin: 0;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#fff" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="900" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#00BDDD" align="left" style="padding: 20px 30px 20px 30px; color: #fff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0; text-align: justify; text-justify: inter-word;">Program ini khusus buat lepasan SPM/Kolej/Diploma/Degree yang menetap di Pantai Timur (PAHANG, TERENGGANU, KELANTAN). Program ini merupakan satu platfom dimana memberi ruang kepada mereka yang masih belum bekerja dan akan diberikan Latihan Professional berkaitan Teknologi Maklumat Bersama ACES</p>
                  <br>
                  <p style="margin: 0; text-align: justify; text-justify: inter-word;">Apa Itu<span style="font-weight: 600;color: #000;"> THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM? </span>
                  <br>
                  <br>
                  THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM telah dilancarkan pada 20 Ogos 2021 sebagai satu program latihan dan kebolehpasaran bagi membentuk dan membimbing para belia dengan kerjasama pakar industri dalam usaha melahirkan lebih ramai belia berkemahiran IT yang kompetitif dan bersedia ke pasaran global serta pencari kerja (job seekers) yang berkemahiran bagi memenuhi keperluan industri semasa.
                  <br>
                  <p>Setiap graduan yang menyertai program akan diberi latihan khusus dari pakar industri untuk mempersiapkan diri dengan segala ilmu berkaitan IT. Golongan sasaran untuk program ini ialah lepasan SPM, Diploma, Ijazah Sarjana Muda, Ijazah Sarjana & PhD yang baru tamatkan pengajian dan mempunyai keinginan yang tinggi untuk mempelajari bidang IT yang penting bagi pasaran global ketika ini.</p>
                  </p>
                  <br>
                  <p style="margin: 0; text-align: justify; text-justify: inter-word;font-weight: bold;color: #000;">Syarat Kelayakan </p>
                  <p>Bagi anda yang berminat untuk menyertai program <span style="font-weight:600; color: #000;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</span>, anda perlu membuat pendaftaran terlebih dahulu dan wajib manghadiri taklimat di tempat & masa yang ditetapkan nanti (secara maya).</p>
                  <p style="margin: 0; text-align: justify; text-justify: inter-word;font-weight: bold;color: #000;"> Latihan yang diterima</p>
                  <p>Dalam program THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM anda akan diberikan latihan professional berkaitan IT bersama syarikat pelaksana. Anda akan menerima latihan yang intensif daripada syarikat pelaksana yang dilantik.</p>
                </td>
              </tr>

              <tr>
                <td bgcolor="#fff" align="left" style="padding: 20px 30px 40px 30px; color: #000; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >
                  <p>Anda akan diberikan 2 jenis latihan iaitu Software Development & Creative Multimedia juga “on job training” modul latihan merangkumi;</p>
                  <ul>
                    <li style="font-weight: bold;">Video Editing</li>
                    <li style="font-weight: bold;">3D Modeling</li>
                    <li style="font-weight: bold;">Unity</li>
                    <li style="font-weight: bold;">Basic Programming</li>
                    <li style="font-weight: bold;">Intermediate Programming</li>
                  </ul>
                  <p>Manakala dalam “on job training”, anda akan menerima elaun bulanan sebanyak <b>RM 1,100.00</b> sebulan sepanjang program (6 bulan).</p>
                </td>
              </tr>

              <tr>
                <td bgcolor="#00BDDD" align="left" style="padding: 20px 30px 20px 30px; color: #fff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0; text-align: justify; text-justify: inter-word;font-weight: bold;color: #000;">Kenapa Anda Perlu Rebut Peluang Ini? </p>
                  <p><span style="font-weight:600; color: #000;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</span> ialah program yang bagus kerana ianya boleh mengurangkan kadar pengangguran dan isu gaji tidak setaraf. Bukan itu sahaja, ianya juga melatih anda supaya mampu mempunyai kerjaya sendiri sebagai “freelancer”.</p>
                  <p>Latihan yang disediakan dalam <span style="font-weight:600; color: #000;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</span> juga bukan latihan yang biasa dipelajari di institusi pendidikan. Ianya adalah latihan khusus untuk industri dan dijalankan bersama pakar serta syarikat peneraju industri.</p>
                  <p>Latihan yang diterima oleh mereka yang menyertai program ini adalah latihan sebenar untuk menghadapi situasi yang lebih mencabar selepas tamat latihan nanti.</p>
                  <p>Kesimpulan</p>
                  <p><span style="font-weight:600; color: #000;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</span> ialah program yang disediakan untuk membantu anda mendapatkan latihan & pengalaman pekerjaan yang disertakan dengan elaun bulanan. Program ini dapat menyelesaikan masalah yang dihadapi oleh anda dan majikan di dalam industri. Malah modul di dalam program ini juga dicipta khusus untuk menjadikan graduan lebih berdaya saing & mempunyai asas IT yang kukuh sebelum melangkah ke dunia sebenar.</p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
              <!-- <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            {{-- <td align="center" style="border-radius: 3px;" bgcolor="#137eff"><a href="{{ url('password/resets/'.$token.'/'.$user->email) }}" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #137eff; display: inline-block;">Klik Di Sini</a></td> --}}

                            {{-- <td align="center" style="border-radius: 3px;" bgcolor="#137eff"><a href="{{ url('password/resets/'.$token.'/'.$user->ic_number) }}" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #137eff; display: inline-block;">Tetapan Semula Kata Laluan</a></td> --}}
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr> -->
            </table>
        </td>
    </tr>
    <!-- COPY CALLOUT -->
    <br>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="900" >
                <!-- HEADLINE -->

                <!-- COPY -->
                <tr>
                  <td bgcolor="#fff" align="left" style="padding: 0px 30px 20px 30px; border-radius: 0px 0px 4px 4px; color: #000; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 400; line-height: 25px;" >
                    <p style="padding-top: 5px;">Jika anda mempunyai kelayakan seperti yang dinyatakan, jangan buang masa. Cepat daftarkan diri & sertai program <span style="font-weight:600; color: #000;">THE ACES-ECER JOBS TRAIN AND PLACE PROGRAM</span>.</p>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#fff" align="center">
                    <a href="https://forms.gle/jQF1BNbxUvugsSfa6" class="bubbly-button" style="color: #fff;">Daftar Sekarang!</a>
                  </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    {{-- <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="900" >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor="#137eff" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <h2 style="font-size: 20px; font-weight: 400; color: #ffffff; margin: 0;">Perlukan bantuan?</h2>
                    <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFFFE0;">Hubungi kami di sini</a></p>
                  </td>
                </tr>
            </table>
        </td>
    </tr> --}}
    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="900" >

              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;text-align: center;">Email ini dihasilkan oleh sistem, anda tidak perlu membalas email ini.</p>
                </td>
              </tr>

              <!-- ADDRESS -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;text-align: center;">Artanis Cloud Sdn Bhd, B2-8-2, Space U8 Eco Mall, Persiaran Pasak Bumi, Seksyen U8 40150 Bukit Jelutong, Shah Alam</p>
                  <p style="margin: 0;text-align: center;">No. Tel: +603-50372811 / +603 - 5032 2450</p>
                  <!-- <p style="margin: 0;text-align: center;">No. Faks: 603-55101748</p> -->
                </td>
              </tr>
            </table>
        </td>
    </tr>
</table>

    <script>
    var animateButton = function(e) {

      e.preventDefault;
      //reset animation
      e.target.classList.remove('animate');

      e.target.classList.add('animate');
      setTimeout(function(){
        e.target.classList.remove('animate');
      },700);
      };

      var bubblyButtons = document.getElementsByClassName("bubbly-button");

      for (var i = 0; i < bubblyButtons.length; i++) {
      bubblyButtons[i].addEventListener('click', animateButton, false);
      }
    </script>
</body>
</html>
