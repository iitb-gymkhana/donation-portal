<?php
require_once 'sso_connect.php';
?>

<!DOCTYPE html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Let's join together and help our mess, nteen laundry, stationary shop helpers and fellow students during these trouble-some times." />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  <title>Student Donation Drive</title>

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes" />
  <link rel="icon" sizes="192x192" href="images/icon-196.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Material Design Lite">
  <link rel="apple-touch-icon-precomposed" href="images/icon-256.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="images/icon-196.png" />
  <meta name="msapplication-TileColor" content="#3372DF" />

  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-red.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <style>
    #view-source {
      position: fixed;
      /*    display: block;*/
      display: none;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
  </style>
</head>

<body>
  <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
    <?php readfile("navbar.html") ?>
    <div class="demo-ribbon"></div>
    <main class="demo-main mdl-layout__content">
      <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <div
          class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
          <!-- <div class="demo-crumbs mdl-color-text--grey-500">
              Google &gt; Material Design Lite &gt; How to install MDL
            </div> -->
          <h3>Student Donation Drive</h3>
          <p>
            The extent and intensity of this pandemic have created uncertainty and severely impacted the nation.

            Our fellow students and hostel helpers(mess, canteen, laundry, stationery shop - helpers) come from
            varying economic backgrounds and are presently scattered across the country, many of them in the rural
            heartlands of the country. Such students, helpers and their families may be facing severe infrastructural,
            medical and financial hardships. Some of the aforementioned may also come from single-parent households or
            support a larger number of dependents and have financial commitments. Let’s all come together and try to
            help them.
          </p>
          <p>
          Login via SSO and choose an amount to donate. The specified amount will be added in your Jan-Mar 2020 mess bill.
          </p>
          <!-- uncomment this to activate portal. Make sure to change or clear the database -->
          
            <?php
            $response_type = "code";
            $state = "user_login";
            $permissions = "basic profile program";
            $url = $sso_handler->gen_auth_url(
              $response_type,
              $state,
              $permissions
            );
            echo '<p><a href="' . $url . '">
                <button
                  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background: rebeccapurple;"
                >
                  Login with SSO
                </button></a
              ></p>
              <img style="margin-top: 20px;" src="images/poster.jpg">
              '; ?>
          
        </div>
      </div>

      <footer id="footer">
        <style>
          footer {
            text-align: center;
            margin-bottom: 40px;
            font-size: 16px;
            width: 100%;
          }

          footer a {
            color: #23527c
          }
        </style>
        <div class="">
          © 2020 <a href="http://gymkhana.iitb.ac.in/" target="_blank">Gymkhana, IIT Bombay</a>
        </div>
        <div>
          <a href="https://nautatva.github.io/" onclick="document.getElementById('toggle').style.display = 'block';"
            target="_blank"> Nautatava Navlakha </a>
        </div>
      </footer>     
      
    </main>
  </div>
  <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/article/" target="_blank"
    id="view-source"
    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">View
    Source</a>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>