<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Meta Taglar burada -->
    <meta charset="UTF-8">

    <!-- Tittle Taglar burada -->
    <title>Smart Cafe</title>

    <!-- Custom css dosyamızın yolu -->
    <link rel="stylesheet" href="css/style.css">


    <!-- Qr Code İnclude File -->
    <script type="text/javascript" src="llqrcode.js"></script>
    <script type="text/javascript">
    // QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c = 0;
var stype = 0;
var gUM = false;
var webkit = false;
var moz = false;
var v = null;

var imghtml = '<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>' +
    '<div id="imghelp">drag and drop a QRCode here' +
    '<br>or select a file' +
    '<input type="file" onchange="handleFiles(this.files)"/>' +
    '</div>' +
    '</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
}

function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
}

function drop(e) {
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var files = dt.files;
    if (files.length > 0) {
        handleFiles(files);
    } else
    if (dt.getData('URL')) {
        qrcode.decode(dt.getData('URL'));
    }
}

function handleFiles(f) {
    var o = [];

    for (var i = 0; i < f.length; i++) {
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

                qrcode.decode(e.target.result);
            };
        })(f[i]);
        reader.readAsDataURL(f[i]);
    }
}

function initCanvas(w, h) {
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if (stype != 1)
        return;
    if (gUM) {
        try {
            gCtx.drawImage(v, 0, 0);
            try {
                qrcode.decode();
            } catch (e) {
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        } catch (e) {
            console.log(e);
            setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function oku(a) {
    return a;
}


var okunan = oku();

<?php $cikti= "<script>document.write(okunan)</script>"; ?>

function read(a) {
    // var html = "<br>";
    if (a == "smart-cafe") {
        // document.getElementById("table_id").innerHTML = a;
        // location.href = "product.php";

    } else {
        document.getElementById("result").innerHTML = "Lütfen masanızdaki qr kodu okutunuz!!!!";
        location.href = "index.html";
    }
    // if (a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
    //     html += "<a target='_blank' href='" + a + "'>" + a + "</a><br>";
    // html += "<b>" + htmlEntities(a) + "</b><br><br>";
    // document.getElementById("result").innerHTML = html;

}

function isCanvasSupported() {
    var elem = document.createElement('canvas');
    return !!(elem.getContext && elem.getContext('2d'));
}

function success(stream) {
    if (webkit)
        v.src = window.URL.createObjectURL(stream);
    else
    if (moz) {
        v.mozSrcObject = stream;
        v.play();
    } else
        v.src = stream;
    gUM = true;
    setTimeout(captureToCanvas, 500);
}

function error(error) {
    gUM = false;
    return;
}

function load() {
    if (isCanvasSupported() && window.File && window.FileReader) {
        initCanvas(800, 600);
        qrcode.callback = read;
        document.getElementById("mainbody").style.display = "inline";
        setwebcam();
    } else {
        document.getElementById("mainbody").style.display = "inline";
        document.getElementById("mainbody").innerHTML = '<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>' +
            '<br><p id="mp2">sorry your browser is not supported</p><br><br>' +
            '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
    }
}

function setwebcam() {

    var options = true;
    if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
        try {
            navigator.mediaDevices.enumerateDevices()
                .then(function(devices) {
                    devices.forEach(function(device) {
                        if (device.kind === 'videoinput') {
                            if (device.label.toLowerCase().search("back") > -1)
                                options = {
                                    'deviceId': {
                                        'exact': device.deviceId
                                    },
                                    'facingMode': 'environment'
                                };
                        }
                        console.log(device.kind + ": " + device.label + " id = " + device.deviceId);
                    });
                    setwebcam2(options);
                });
        } catch (e) {
            console.log(e);
        }
    } else {
        console.log("no navigator.mediaDevices.enumerateDevices");
        setwebcam2(options);
    }

}

function setwebcam2(options) {
    console.log(options);
    document.getElementById("result").innerHTML = "Sipariş verebilmek için lütfen qr kodu okutunuz.";
    if (stype == 1) {
        setTimeout(captureToCanvas, 500);
        return;
    }
    var n = navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v = document.getElementById("v");


    if (n.getUserMedia) {
        webkit = true;
        n.getUserMedia({
            video: options,
            audio: false
        }, success, error);
    } else
    if (n.webkitGetUserMedia) {
        webkit = true;
        n.webkitGetUserMedia({
            video: options,
            audio: false
        }, success, error);
    } else
    if (n.mozGetUserMedia) {
        moz = true;
        n.mozGetUserMedia({
            video: options,
            audio: false
        }, success, error);
    }

    document.getElementById("qrimg").style.opacity = 0.2;
    document.getElementById("webcamimg").style.opacity = 1.0;

    stype = 1;
    setTimeout(captureToCanvas, 500);
}

function setimg() {
    document.getElementById("result").innerHTML = "";
    if (stype == 2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity = 1.0;
    document.getElementById("webcamimg").style.opacity = 0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);
    qrfile.addEventListener("dragover", dragover, false);
    qrfile.addEventListener("drop", drop, false);
    stype = 2;
}
    </script>
    <script type="text/javascript" src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap Cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>

<body style="height: 100vh">
    <div id="main">
        <!-- Header-->

        <h1 class="title custom-font">Smart Cafe</h1>
        <h2 class="slogan">Siparişini online ver ayağına gelsin</h2>
        <img src="img/img.png" alt="" width="100px">

        <!-- Main Body
                Webcam and İmage Process
            -->
        <div class="selector" id="webcamimg" onclick="setwebcam()" align="left"></div>
        <div class="selector" id="qrimg" onclick="setimg()" align="right"></div>

        <!-- Outdiv -->
        <center id="mainbody">
            <div id="outdiv"></div>
        </center>

        <!-- Result -->

        <div id="result" style="color:#efedeb">

        </div>
        <div id="table_id"></div>


    </div>

    <!--.container -->

    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <!-- Qr Js -->
    <script type="text/javascript">
        load();
    </script>


    <!-- Bootstrap Cdns-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>

</html>

<?php
     if ($cikti=='smart-cafe'){
        echo "<script>alert('hello world');</script>";    
    }else{
        echo "no";
    }
?>