<!-- the whole site is wrapped in a container div to give it some margin on the sides -->
<!-- closing container div can be found in the footer -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">






<style>
    .navbar-nav>li>div
    {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 7px;
    }
    .nav>li>div
    {
        position:relative;
        display: block;
        padding: 10px 7px;
    }
    .navbar-nav>li>a
    {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .nav>li>a
    {
        position:relative;
        display: block;
        padding: 10px 7px;
    }
</style>











<nav class=" bg-light noPrint navbar navbar-expand-md navbar-dark  bg-dark" style="margin-bottom: 0px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right">

            <li><a href="<?php echo BASE_URL . 'index.php' ?>">Home</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user']['username'] ?> </a>

                    <?php if (isAdmin($_SESSION['user']['id'])): ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL . 'admin/profile.php' ?>">Profile</a></li>
                            <li><a href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Dashboard</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . 'signup.php' ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="<?php echo BASE_URL . 'login.php' ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif; ?>
            <li>

                <div class="dropdown noPrint" >
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Provinces
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="provleg"  >provinces</a>
                        <script>
                            var t = 0;
                            var d=document.getElementById("provleg");

                            var pov="<img id='pov' style='height: 170px;width: 170px;' src='assets/images/prov.png' />";

                            d.addEventListener("click",function() {

                                if (t == 0) {

                                    $('div#legendeprov').append(pov);

                                    t=1;

                                }
                                else if(t>0) {
                                    $('div#legendeprov > img#pov').remove();
                                    t=0;

                                }
                            });
                        </script>

                        <a class="dropdown-item" id="tac">tauxAC</a>
                        <script>
                            var k = 0;
                            var d=document.getElementById("tac");

                            var tac="<img id='tac' style='height: 170px;width: 170px;' src='assets/images/TauxAC.png' />";

                            d.addEventListener("click",function() {

                                if (k == 0) {

                                    $('div#legendeprov').append(tac);

                                    k=1;

                                }
                                else if(k>0) {
                                    $('div#legendeprov > img#tac').remove();
                                    k=0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="loc">localites</a>
                        <script>
                            var l = 0;
                            var d=document.getElementById("loc");

                            var loc="<img id='loc' style='height: 170px;width: 170px;' src='assets/images/loc.png' />";

                            d.addEventListener("click",function() {

                                if (l == 0) {

                                    $('div#legendeprov').append(loc);

                                    l=1;

                                }
                                else if(l>0) {
                                    $('div#legendeprov > img#loc').remove();
                                    l=0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="gcleg">GC</a>
                        <script>
                            var g = 0;
                            var d=document.getElementById("gcleg");

                            var gcm="<img id='gcm' style='height: 170px;width: 170px;' src='assets/images/GC.png' />";

                            d.addEventListener("click",function() {

                                if (g == 0) {

                                    $('div#legendeprov').append(gcm);

                                    g=1;

                                }
                                else if(g>0) {
                                    $('div#legendeprov > img#gcm').remove();
                                    g=0;

                                }
                            });
                        </script>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown noPrint">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        communes
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="comleg"  >communes</a>
                        <script>
                            var cc = 0;
                            var d=document.getElementById("comleg");

                            var com="<img  id='com' style='height: 170px;width: 170px;' src='assets/images/Com.png' />";

                            d.addEventListener("click",function() {

                                if (cc == 0) {

                                    $('div#legendecom').append(com);

                                    cc=1;

                                }
                                else if(cc>0) {
                                    $('div#legendecom > img#com').remove();
                                    cc=0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="menleg"  >Men</a>
                        <script>
                            var me = 0;
                            var d=document.getElementById("menleg");

                            var men="<img id='men' style='height: 170px;width: 170px;' src='assets/images/Men.png' />";

                            d.addEventListener("click",function() {

                                if (me == 0) {

                                    $('div#legendecom').append(men);

                                    me=1;

                                }
                                else if(me>0) {
                                    $('div#legendecom > img#men').remove();
                                    me=0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="densileg"  >Densite</a>
                        <script>
                            var de = 0;
                            var d=document.getElementById("densileg");

                            var densi="<img id='densi' style='height: 170px;width: 170px;' src='assets/images/Densite.png' />";

                            d.addEventListener("click",function() {

                                if (de == 0) {

                                    $('div#legendecom').append(densi);

                                    de=1;

                                }
                                else if(de>0) {
                                    $('div#legendecom > img#densi').remove();
                                    de=0;

                                }
                            });
                        </script>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown noPrint">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        regions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="regleg"  >regions</a>
                        <script>
                            var reg = 0;
                            var d=document.getElementById("regleg");

                            var regg="<img id='regg' style='height: 170px;width: 170px;' src='assets/images/Reg.png' />";

                            d.addEventListener("click",function() {

                                if (reg == 0) {

                                    $('div#legendereg').append(regg);

                                    reg=1;

                                }
                                else if(reg>0) {
                                    $('div#legendereg> img#regg').remove();
                                    reg=0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="densleg"  >Men</a>
                        <script>
                            var rd = 0;
                            var d=document.getElementById("densleg");

                            var rdm="<img id='rdm' style='height: 170px;width: 170px;' src='assets/images/RDensite.png' />";

                            d.addEventListener("click",function() {

                                if (rd  == 0) {

                                    $('div#legendereg').append(rdm);

                                    rd =1;

                                }
                                else if(rd >0) {
                                    $('div#legendereg> img#rdm').remove();
                                    rd =0;

                                }
                            });
                        </script>
                        <a class="dropdown-item" id="cdrleg"  >Densite</a>
                        <script>
                            var cdr = 0;
                            var d=document.getElementById("cdrleg");

                            var cdd="<img id='cdd' style='height: 170px;width: 170px;' src='assets/images/CDR.png' />";

                            d.addEventListener("click",function() {

                                if (cdr == 0) {

                                    $('div#legendereg').append(cdd);

                                    cdr=1;

                                }
                                else if(cdr>0) {
                                    $('div#legendereg > img#cdd').remove();
                                    cdr=0;

                                }
                            });
                        </script>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown noPrint">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        your layers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="addedlayer"  >layer1</a>
                    </div>
                </div>
            </li>
            <li>
                <a class="noPrint">
                    <button  class="btn btn-primary"  onclick="toggle2()">measure</button>
                    <div id="container" class="menumeasure" style="display: none">
                        <form class="form-inline">
                            <label>Measurement type &nbsp;</label>
                            <select id="type">
                                <option value="length">Length (LineString)</option>
                                <option value="area">Area (Polygon)</option>
                            </select>
                            <label class="checkbox">
                                <input type="checkbox" id="geodesic">
                                use geodesic measures
                            </label>
                        </form>
                        <script>
                            function toggle2()
                            {
                                var box=$(".menumeasure");
                                if(box.css('display')=='block')
                                {
                                    console.log(box.attr('style','display')=='block');
                                    box.attr('style','display:none');
                                }
                                else
                                {
                                    console.log(box.attr('style','display')=='none');
                                    box.attr('style','display:block');
                                }
                            }
                        </script>
                    </div>

                </a>

            </li>
            <li>
                <a>

                    <button  class="btn btn-primary" onclick="window.print()">Export PDF</button>

                </a>
                <script>
                    /*id="export-pdf"*/
                    /*<div id="export" onclick="toggle()">Export</div>
               <div id="container" class="menu" style="display: none">

                   <form class="form" class="form-group" style="display: -webkit-inline-flex;margin-bottom: 0px">
                       <label>Page size </label>
                       <select id="format" class="form-control" style="max-width: 25%">
                           <option value="a0">A0 (slow)</option>
                           <option value="a1">A1</option>
                           <option value="a2">A2</option>
                           <option value="a3">A3</option>
                           <option value="a4" selected>A4</option>
                           <option value="a5">A5 (fast)</option>
                       </select>
                       <label>Resolution </label>
                       <select id="resolution" class="form-control" style="max-width: 25%">
                           <option value="72">72 dpi (fast)</option>
                           <option value="150">150 dpi</option>
                           <option value="300">300 dpi (slow)</option>
                       </select>
                   </form>
                  </div>*/
                    function toggle()
                    {
                        var box=$(".menu");
                        if(box.css('display')=='block')
                        {
                            console.log(box.attr('style','display')=='block');
                            box.attr('style','display:none');
                        }
                        else
                        {
                            console.log(box.attr('style','display')=='none');
                            box.attr('style','display:block');
                        }
                    }
                </script>
            </li>
            <li id="lilayer">

                <a>
                    <button  class="btn btn-primary"  onclick="toggle()">AddLayer</div>
                    <div id="container" class="menu" style="display: none">
                <input type="url" id="txt" placeholder="Enter your wms"/>
                    <input type="text" id="lname" placeholder="Enter your layer name"/>
                <input type="button" id="btnl" value="AddLayer" />
                <script>

                    function addlayer () {

                        /*window.location.href = nickname.value;*/
                        var value = document.getElementById("txt");
                        var name= document.getElementById("lname");
                        console.log(name.value.toString());
                        var layer = new ol.layer.Tile({

                            source: new ol.source.TileWMS({

                                url: value.value.toString(),

                                params: {

                                    'LAYERS': name.value,

                                    'TRANSPARENT': 'true',

                                    'TILED':true,

                                    'WIDTH': 640,

                                    'HEIGHT': 480
                                },
                                projection: 'EPSG:3857'
                            })
                        });
                        layer.set('name',name.value);
                        map.addLayer(layer);
                        var string=value.value.toString();
                        var indexs=string.indexOf('wms');
                        var indexe=string.indexOf('er/');
                        var part1 =string.substring(0,indexe+3);
                        var part2= string.substring(indexs);
                        var final = part1+part2;


                        var cites=string.indexOf('er/');
                        var res1=string.substring(cites+3);
                        var citee=res1.indexOf('wms');
                        var res2=res1.substring(0,citee-1);


                        var ad = 0;

                        console.log(final);
                        console.log(res2);
                        var srci =final+"?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=130&HEIGHT=20&LAYER="+res2+":"+name.value;
                        var lay="<img id='lay' style='height: 170px;width: 170px;' />";
                        var dd=document.getElementById("addedlayer");
                        document.getElementById("added").style.visibility='visible';
                        dd.addEventListener("click",function() {

                            if (ad == 0) {

                                $('div#added').append(lay);
                                document.getElementById('lay').src=srci;

                                ad=1;

                            }
                            else if(ad>0) {
                                $('div#added > img#lay').remove();
                                ad=0;

                            }
                        });
                        var li=document.getElementById("lilayer");

                       if($('#'+name.value))
                       {
                           var btttn=document.createElement("BUTTON");
                           btttn.innerHTML="Remove" + name.value;
                           btttn.id=name.value;

                           btttn.addEventListener('click',function(e)
                           {

                               var layersToRemove = [];
                               map.getLayers().forEach(function (layer) {
                                   console.log(layer.get('name'));
                                   if (layer.get('name') != undefined && layer.get('name') === name.value) {
                                       layersToRemove.push(layer);
                                   }
                               });

                               var len = layersToRemove.length;
                               for(var i = 0; i < len; i++) {
                                   map.removeLayer(layersToRemove[i]);
                               }
                               li.removeChild(btttn);
                           });
                           li.appendChild(btttn);
                       }

                    };

                    document.getElementById("btnl").addEventListener('click', addlayer);


                </script>
                    </div>
                </a>

            </li>


        </ul>
    </div>
</nav>



