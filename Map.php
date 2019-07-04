<?php include("config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
    <!DOCTYPE html>
    <html>
<head>
    <link rel="icon" href="assets/images/JaBak.ico"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">
    <meta charset="utf-8">
    <title>JaBak WebMapping v-0.0</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custome styles -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
    <script src="assets/js/Olscript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
    <link rel="stylesheet" href="Switcher/src/ol-layerswitcher.css" />
    <link rel="stylesheet" href="Switcher/examples/layerswitcher.css" />
    <script src="https://epsg.io/3857.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="Switcher/dist/ol-layerswitcher.js"></script>
    <script src="Switcher/examples/layerswitcher.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>

        .tooltip {
            position: relative !important;
            background: rgba(0, 0, 0, 0.5) !important;
            border-radius: 4px !important;
            color: white !important;
            padding: 4px 8px !important;
            opacity: 0.7 !important;
            white-space: nowrap !important;
        };
        .tooltip-measure {
            opacity: 1 !important;
            font-weight: bold !important;
        };
        .tooltip-static {
            background-color: #ffcc33 !important;
            color: black !important;
            border: 1px solid white !important;
        };
        .tooltip-measure:before,
        .tooltip-static:before {
            border-top: 6px solid rgba(0, 0, 0, 0.5) !important;
            border-right: 6px solid transparent !important;
            border-left: 6px solid transparent !important;
            content: "" !important;
            position: absolute !important;
            bottom: -6px !important;
            margin-left: -7px !important;
            left: 50% !important;
        };
        .tooltip-static:before {
            border-top-color: #ffcc33 !important;
        };

        .ol-popup:after, .ol-popup:before {
            top: 100% !important;
            border: solid transparent !important;
            content: " " !important;
            height: 0 !important;
            width: 0 !important;
            position: absolute !important;
            pointer-events: none !important;
        }
        .ol-popup:after {
            border-top-color: white !important;
            border-width: 10px !important;
            left: 48px !important;
            margin-left: -10px !important;
        }
        .ol-popup:before {
            border-top-color: #cccccc !important;
            border-width: 11px !important;
            left: 48px !important;
            margin-left: -11px !important;
        }
        .ol-popup-closer {
            text-decoration: none !important;
            position: absolute !important;
            top: 2px !important;
            right: 8px !important;
        }
        .ol-popup-closer:after {
            content: "✖" !important;
        }
        .ol-popup {
            position: absolute !important;
            min-width: 180px !important;
            background-color: white !important;
            -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2)) !important;
            filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2)) !important;
            padding: 15px !important;
            border-radius: 10px !important;
            border: 1px solid #ccc !important;
            bottom: 12px !important;
            left: -50px !important;
        }
    </style>
</head>
<body>
<div class="ToPrint">

    <img src="assets/images/download.jpg" style="">
    </br>
    <h1 style="left: 50%;margin:auto;border: 9px solid black;text-align: center;" >Report</h1>
    </br>
    </br>


</div>


<?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
<?php include(INCLUDE_PATH . "/layouts/messages.php") ?>

<div id="map" class="map"  style="height: 600px ; max-height: 600px;" ></div>

<div id="popup" class="ol-popup noPrint">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
    <div id="popup-content"></div>
</div>
<table class="table table-dark">
    <thead >
    <tr><td>Legend</td></tr>
    </thead>
</table>
<div class="row-fluid ">
    <div >
        <div class="span12" style="position: center">

            <div>
                <div id="allleg">
                    <div class="legendeprov" id="legendeprov">

                    </div>
                    <div class="legendecom" id="legendecom">

                    </div>
                    <div class="legendereg" id="legendereg">

                    </div>
                    <div class="added" id="added" style="visibility: hidden">

                    </div>
                </div>
            </div>


        </div>
    </div>

</body>
<script>
    var wgs84Sphere = new ol.Sphere(6378137);



    var source = new ol.source.Vector();

    var vector = new ol.layer.Vector({
        source: source,
        style: new ol.style.Style({
            fill: new ol.style.Fill({
                color: 'rgba(255, 255, 255, 0.2)'
            }),
            stroke: new ol.style.Stroke({
                color: '#ffcc33',
                width: 2
            }),
            image: new ol.style.Circle({
                radius: 7,
                fill: new ol.style.Fill({
                    color: '#ffcc33'
                })
            })
        })
    });


    /**
     * Currently drawn feature.
     * @type {ol.Feature}
     */
    var sketch;


    /**
     * The help tooltip element.
     * @type {Element}
     */
    var helpTooltipElement;


    /**
     * Overlay to show the help messages.
     * @type {ol.Overlay}
     */
    var helpTooltip;


    /**
     * The measure tooltip element.
     * @type {Element}
     */
    var measureTooltipElement;


    /**
     * Overlay to show the measurement.
     * @type {ol.Overlay}
     */
    var measureTooltip;


    /**
     * Message to show when the user is drawing a polygon.
     * @type {string}
     */
    var continuePolygonMsg = 'Click to continue drawing the polygon';


    /**
     * Message to show when the user is drawing a line.
     * @type {string}
     */
    var continueLineMsg = 'Click to continue drawing the line';


    /**
     * Handle pointer move.
     * @param {ol.MapBrowserEvent} evt The event.
     */
    var pointerMoveHandler = function(evt) {
        if (evt.dragging) {
            return;
        }
        /** @type {string} */

        var helpMsg = 'Click to start drawing';

        if (sketch) {
            var geom = (sketch.getGeometry());

            if (geom instanceof ol.geom.Polygon) {
                helpMsg = continuePolygonMsg;
            } else if (geom instanceof ol.geom.LineString) {

                helpMsg = continueLineMsg;
            }
        }

        helpTooltipElement.innerHTML = helpMsg;
        helpTooltip.setPosition(evt.coordinate);

        helpTooltipElement.classList.remove('hidden');
    };










    var controls = [
        new ol.control.Attribution(),
        new ol.control.MousePosition({
            undefinedHTML: 'outside',
            projection: 'EPSG:4326',
            coordinateFormat: function(coordinate) {
                return ol.coordinate.format(coordinate, '{x}, {y}', 4);
            }
        }),
        new ol.control.OverviewMap({
            collapsed: false
        }),
        new ol.control.Rotate({
            autoHide: false
        }),
        new ol.control.ScaleLine(),
        new ol.control.Zoom(),
        new ol.control.ZoomSlider(),
        new ol.control.ZoomToExtent(),
        new ol.control.FullScreen()
    ];

    var image = new ol.style.Circle({
        radius: 3,
        fill: new ol.style.Fill({
            color: 'red'
        }),
        stroke: new ol.style.Stroke({color: 'black', width: 1})
    });
    var image2 = new ol.style.Circle({
        radius: 0,
        fill: new ol.style.Fill({
            color: 'rgba(195,231,58,1.00)'
        }),
        stroke: new ol.style.Stroke({color: 'black', width: 1})
    });
    var StyleMP=new ol.style.Style({
        geometry: 'MultiPolygon',
        stroke: new ol.style.Stroke({
            color: 'red',
            width: 1
        }),
        fill: new ol.style.Fill({
            color: 'rgba(255,9,88,0.1)'
        })
    });
    var styles2 = {
        'Point': new ol.style.Style({
            image: image2
        })
    };
    var styles = {
        'Point': new ol.style.Style({
            image: image
        }),
        'LineString': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'green',
                width: 1
            })
        }),
        'MultiLineString': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'green',
                width: 1
            })
        }),
        'MultiPoint': new ol.style.Style({
            image: image
        }),
        'MultiPolygon': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'black',
                width: 1
            }),
            fill: new ol.style.Fill({
                color: 'rgba(255, 255, 0, 0.1)'
            })
        }),
        'Polygon': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'blue',
                lineDash: [4],
                width: 3
            }),
            fill: new ol.style.Fill({
                color: 'rgba(0, 0, 255, 0.1)'
            })
        }),
        'GeometryCollection': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'magenta',
                width: 2
            }),
            fill: new ol.style.Fill({
                color: 'magenta'
            }),
            image: new ol.style.Circle({
                radius: 10,
                fill: null,
                stroke: new ol.style.Stroke({
                    color: 'magenta'
                })
            })
        }),
        'Circle': new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'black',
                width: 1
            }),
            fill: new ol.style.Fill({
                color: 'rgb(0,0,0)'
            })
        })
    };

    var styleFunction = function(feature) {

        if (feature.get('NOMBRE_DE_') >23.00 && feature.get('NOMBRE_DE_')<=165.80) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(247,252,245,1.00)'
                })
            });
        }
        if (feature.get('NOMBRE_DE_') >165.80 && feature.get('NOMBRE_DE_')<=308.60) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(202, 234, 195, 1.00)'
                })
            });
        }
        if (feature.get('NOMBRE_DE_') >308.60 && feature.get('NOMBRE_DE_')<=451.40) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(123,200,124,1.00)'
                })
            });
        }
        if (feature.get('NOMBRE_DE_') >451.40&& feature.get('NOMBRE_DE_')<=594.20) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(42,146,74,1.00)'
                })
            });
        }
        if (feature.get('NOMBRE_DE_') >594.20&& feature.get('NOMBRE_DE_')<=737.00) {
            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(0,68,27,1.00)'
                })
            });
        }

        else {

            return styles[feature.getGeometry().getType()];
        }
    };

    var styleFunction2 = function(feature) {
        if (feature.get('TAUX_D_ACC') >0 && feature.get('TAUX_D_ACC')<20) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 1.5,
                    fill: new ol.style.Fill({
                        color: 'rgba(195,231,58,1.00)'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        if (feature.get('TAUX_D_ACC') >20 && feature.get('TAUX_D_ACC')<40) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 3,
                    fill: new ol.style.Fill({
                        color: 'rgba(195,231,58,1.00)'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('TAUX_D_ACC') >40 && feature.get('TAUX_D_ACC')<60) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 4.5,
                    fill: new ol.style.Fill({
                        color: 'rgba(195,231,58,1.00)'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('TAUX_D_ACC') >60 && feature.get('TAUX_D_ACC')<80) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 6,
                    fill: new ol.style.Fill({
                        color: 'rgba(195,231,58,1.00)'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('TAUX_D_ACC') >80 && feature.get('TAUX_D_ACC')<100) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 7.5,
                    fill: new ol.style.Fill({
                        color: 'rgba(195,231,58,1.00)'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }

        else {

            return styles2[feature.getGeometry().getType()];
        }
    };



    var baseM = new ol.layer.Group({
        'title': 'Base maps',
        layers: [
            new ol.layer.Group({
                title: 'Water color with labels',
                type: 'base',
                combine: true,
                visible: false,
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.Stamen({
                            layer: 'watercolor'
                        })
                    }),
                    new ol.layer.Tile({
                        source: new ol.source.Stamen({
                            layer: 'terrain-labels'
                        })
                    })
                ]
            }),
            new ol.layer.Tile({
                title: 'Water color',
                type: 'base',
                visible: false,
                source: new ol.source.Stamen({
                    layer: 'watercolor'
                })
            }),
            new ol.layer.Tile({
                title: 'OSM',
                type: 'base',
                visible: true,
                source: new ol.source.OSM()
            }),
            new ol.layer.Tile({
                title:'Bing',
                type:'base',
                visible:'false',
                source: new ol.source.BingMaps({
                    key: 'AsNRBCzD6pzav7SNJ_zixj1OKUL96uZzJpInCx_GtRd6WEm0YatPf4JePcp608RB',
                    imagerySet: 'AerialWithLabels',
                })}),
            new ol.layer.Tile({
                title:'Catrocdn',
                type:'base',
                visible:'false',
                source: new ol.source.XYZ({
                    url:'http://{1-4}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',
                })
            }),
            new ol.layer.Tile({
                title:'WorldTopoEsri',
                type:'base',
                source:new ol.source.XYZ({
                    attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                        'rest/services/World_Topo_Map/MapServer">ArcGIS</a>',
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                        'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
                })
            }),
            new ol.layer.Tile({
                title:'WorldImagery',
                type:'base',
                source:new ol.source.XYZ({
                    attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                        'rest/services/World_Imagery/MapServer">ArcGIS</a>',
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                        'World_Imagery/MapServer/tile/{z}/{y}/{x}'
                })
            }),
            new ol.layer.Tile({
                title:'ShadedRelief',
                type:'base',
                source:new ol.source.XYZ({
                    attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                        'rest/services/World_Shaded_Relief/MapServer">ArcGIS</a>',
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                        'World_Shaded_Relief/MapServer/tile/{z}/{y}/{x}'
                })
            }),
            new ol.layer.Tile({
                title:'TerrainBase',
                type:'base',
                source:new ol.source.XYZ({
                    attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                        'rest/services/World_Terrain_Base/MapServer">ArcGIS</a>',
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                        'World_Terrain_Base/MapServer/tile/{z}/{y}/{x}'
                })
            }),
            new ol.layer.Tile({
                title:'worldstreet',
                type:'base',
                source:new ol.source.XYZ({
                    attributions: 'Tiles © <a href="https://services.arcgisonline.com/ArcGIS/' +
                        'rest/services/World_Street_Map/MapServer">ArcGIS</a>',
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                        'World_Street_Map/MapServer/tile/{z}/{y}/{x}'
                })
            })





        ]
    });






    var provincesG=new ol.layer.Group(
        {
            'title':'Provinces',
            layers : [
                new ol.layer.Vector({
                    title:'Provinces',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Pov/pov.geojson",

                    }),
                    style:styleFunction
                }),
                new ol.layer.Vector({
                    title:'Locations',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Pov/loc.geojson",

                    }),
                    style:styleFunction
                }),
                new ol.layer.Vector({
                    title:'TauxAc',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Pov/taux.geojson",

                    }),
                    style:styleFunction2
                })

            ]
        });

    var wmslayers=new ol.layer.Group(
        {
            'title':'wms',
            layers : [
                new ol.layer.Vector({
                    title:'Provinces',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Pov/pov.geojson",

                    }),
                   /* style:styleFunction*/
                })
            ]
        });

    var styleFunctionCom = function(feature) {

        if (feature.get('POP04') >0 && feature.get('POP04')<=6742) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba( 255, 255, 255, 1.00 )'
                })
            });
        }
        if (feature.get('POP04') >6742 && feature.get('POP04')<=12101) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba( 255, 128, 128, 1.00 )'
                })
            });
        }
        if (feature.get('POP04') >12101 && feature.get('POP04')<=520000) {

            return new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'black',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba( 255, 0, 0, 1.00 )'
                })
            });
        }


        else {

            return styles[feature.getGeometry().getType()];
        }
    };
    var styleFunctionMen = function(feature) {
        if (feature.get('MEN04') >=0 && feature.get('MEN04')<=15497) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 2,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        if (feature.get('MEN04') >=15497 && feature.get('MEN04')<=30994) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 6,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('MEN04') >30994 && feature.get('MEN04')<46491) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 10,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('MEN04') >=46491 && feature.get('MEN04')<=61988) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 14,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('MEN04') >=61988 && feature.get('MEN04')<=77485) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 18,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }

        else {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 2,
                    fill: new ol.style.Fill({
                        color: 'rgba( 243, 166, 178, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
    };
    var styleFunctionDens = function(feature) {
        if (feature.get('Dens04') >=0 && feature.get('Dens04')<=129) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 3.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        if (feature.get('Dens04') >=129 && feature.get('Dens04')<=258) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 5.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('Dens04') >=258 && feature.get('Dens04')<=387) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 12.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('Dens04') >=387 && feature.get('Dens04')<=516) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 15.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        else {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 4,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
    };
    var communesG=new ol.layer.Group(
        {
            'title':'Communes',
            layers : [
                new ol.layer.Vector({
                    title:'Communes',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Com/Communes.geojson",

                    }),
                    style:styleFunctionCom
                }),
                new ol.layer.Vector({
                    title:'Men',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Com/Men.geojson",

                    }),
                    style:styleFunctionMen
                }),
                new ol.layer.Vector({
                    title:'Densite',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Com/Densite.geojson",

                    }),
                    style:styleFunctionDens
                })

            ]
        });

    var styleFunctionReg = function(feature) {
        return new ol.style.Style({
            stroke: new ol.style.Stroke({
                color: 'black',
                width: 1.7
            }),
            fill: new ol.style.Fill({
                color: 'rgba( 244, 241, 25, 1.00 )'
            })
        });
    };
    var styleFunctionRD = function(feature) {
        if (feature.get('DENSITE') >=1 && feature.get('DENSITE')<=8) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 3.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        if (feature.get('DENSITE') >=8 && feature.get('DENSITE')<=68) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 5.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('DENSITE') >=68 && feature.get('DENSITE')<=87) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 12.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('DENSITE') >=87 && feature.get('DENSITE')<=176) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 15.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('DENSITE') >=176 && feature.get('DENSITE')<=2157) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 15.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        else {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 4,
                    fill: new ol.style.Fill({
                        color: 'rgba( 53, 203, 213, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
    };
    var styleFunctionCDR = function(feature) {
        if (feature.get('CLAS_DENS') >=1 && feature.get('CLAS_DENS')<=25) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 2.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 255, 158, 23, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        if (feature.get('CLAS_DENS') >=25 && feature.get('CLAS_DENS')<=85) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 4.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 255, 158, 23, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('CLAS_DENS') >=85 && feature.get('CLAS_DENS')<=101) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 6.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 255, 158, 23, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }if (feature.get('CLAS_DENS') >=101 && feature.get('CLAS_DENS')<=111) {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 8.5,
                    fill: new ol.style.Fill({
                        color: 'rgba( 255, 158, 23, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
        else {

            return new ol.style.Style({image: new ol.style.Circle({
                    radius: 3,
                    fill: new ol.style.Fill({
                        color: 'rgba( 111, 111, 182, 1.00 )'
                    }),
                    stroke: new ol.style.Stroke({color: 'black', width: 1})
                })});
        }
    };

    var zone=new ol.layer.Group(
        {
            title:'data',
            layers:
        [
            new ol.layer.Vector({
        title:'zone',
        visible:false,
        source:new ol.source.Vector({
            format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
            url:"assets/Geojson/geomat/zone.geojson",

        })
    }),
            new ol.layer.Tile({
                title:"roads",
                visible:false,
                source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': 'roadsclip',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
            }),
            new ol.layer.Tile({
                title:"places",
                visible:false,
                source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': 'placesclip',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
            }),
            new ol.layer.Tile({
                title:"nat",
                visible:false,
                source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': 'naturalclip',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
            }),
            new ol.layer.Tile({
                title:"poi",
                visible:false,
                source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': 'pointsclip',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
            }),
            new ol.layer.Tile({
                title:"landuse",
                visible:false,
                source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': 'landuseclip',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
            })

        ]
        });
    var RegionG=new ol.layer.Group(
        {
            'title':'Regions',
            layers : [
                new ol.layer.Vector({
                    title:'Region',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Reg/Region.geojson",

                    }),
                    style:styleFunctionReg
                }),
                new ol.layer.Vector({
                    title:'Densite',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Reg/RDensite.geojson",

                    }),
                    style:styleFunctionRD
                }),
                new ol.layer.Vector({
                    title:'CD',
                    visible:false,
                    source:new ol.source.Vector({
                        format:new ol.format.GeoJSON({featureProjection:'EPSG:3857'}),
                        url:"assets/Geojson/Reg/CDR.geojson",

                    }),
                    style:styleFunctionCDR
                })

            ]
        });

    var bin1898 = new ol.layer.Group(
        {
            title:"Geomatics",
            layers :
                [
                    new ol.layer.Tile({
                        title:"18-981",
                        visible:false,
                    source: new ol.source.TileWMS({

                    url: 'http://localhost:8181/geoserver/cite/wms',

                    params: {

                        'LAYERS': '18-981',

                        'TRANSPARENT': 'true',

                        'WIDTH': 640,

                        'HEIGHT': 480
                    },
                    projection: 'EPSG:3857'
                })
                }),
                    new ol.layer.Tile({
                        title:"18-81",
                        visible:false,
                        source: new ol.source.TileWMS({

                            url: 'http://localhost:8181/geoserver/cite/wms',

                            params: {

                                'LAYERS': '18-81',

                                'TRANSPARENT': 'true',

                                'WIDTH': 640,

                                'HEIGHT': 480
                            },
                            projection: 'EPSG:3857'
                        })
                    }),
                    new ol.layer.Tile({
                        title:"08-981",
                        visible:false,
                        source: new ol.source.TileWMS({

                            url: 'http://localhost:8181/geoserver/cite/wms',

                            params: {

                                'LAYERS': '08-981',

                                'TRANSPARENT': 'true',

                                'WIDTH': 640,

                                'HEIGHT': 480
                            },
                            projection: 'EPSG:3857'
                        })
                    })
        ]

        });



    var olCoordinates = ol.proj.fromLonLat([-8, 32]);
    var map = new ol.Map({
        target: document.getElementById('map'),
        layers:[baseM,provincesG,communesG,RegionG,vector,zone,bin1898],


        controls: controls,
        view: new ol.View({
            center:olCoordinates,
            zoom: 5
        })
    });

    map.on('pointermove', pointerMoveHandler);

    map.getViewport().addEventListener('mouseout', function() {
        helpTooltipElement.classList.add('hidden');
    });

    var typeSelect = document.getElementById('type');
    var geodesicCheckbox = document.getElementById('geodesic');

    var draw; // global so we can remove it later


    /**
     * Format length output.
     * @param {ol.geom.LineString} line The line.
     * @return {string} The formatted length.
     */
    var formatLength = function(line) {
        var length;
        if (geodesicCheckbox.checked) {
            var coordinates = line.getCoordinates();
            length = 0;
            var sourceProj = map.getView().getProjection();
            for (var i = 0, ii = coordinates.length - 1; i < ii; ++i) {
                var c1 = ol.proj.transform(coordinates[i], sourceProj, 'EPSG:4326');
                var c2 = ol.proj.transform(coordinates[i + 1], sourceProj, 'EPSG:4326');
                length += wgs84Sphere.haversineDistance(c1, c2);
            }
        } else {
            length = Math.round(line.getLength() * 100) / 100;
        }
        var output;
        if (length > 100) {
            output = (Math.round(length / 1000 * 100) / 100) +
                ' ' + 'km';
        } else {
            output = (Math.round(length * 100) / 100) +
                ' ' + 'm';
        }
        return output;
    };


    /**
     * Format area output.
     * @param {ol.geom.Polygon} polygon The polygon.
     * @return {string} Formatted area.
     */
    var formatArea = function(polygon) {
        var area;
        if (geodesicCheckbox.checked) {
            var sourceProj = map.getView().getProjection();
            var geom = /** @type {ol.geom.Polygon} */(polygon.clone().transform(
                sourceProj, 'EPSG:4326'));
            var coordinates = geom.getLinearRing(0).getCoordinates();
            area = Math.abs(wgs84Sphere.geodesicArea(coordinates));
        } else {
            area = polygon.getArea();
        }
        var output;
        if (area > 10000) {
            output = (Math.round(area / 1000000 * 100) / 100) +
                ' ' + 'km<sup>2</sup>';
        } else {
            output = (Math.round(area * 100) / 100) +
                ' ' + 'm<sup>2</sup>';
        }
        return output;
    };

    function addInteraction() {
        var type = (typeSelect.value == 'area' ? 'Polygon' : 'LineString');
        draw = new ol.interaction.Draw({
            source: source,
            type: /** @type {ol.geom.GeometryType} */ (type),
            style: new ol.style.Style({
                fill: new ol.style.Fill({
                    color: 'rgba(255, 255, 255, 0.2)'
                }),
                stroke: new ol.style.Stroke({
                    color: 'rgba(0, 0, 0, 0.5)',
                    lineDash: [10, 10],
                    width: 2
                }),

            })
        });
        map.addInteraction(draw);

        createMeasureTooltip();
        createHelpTooltip();

        var listener;
        draw.on('drawstart',
            function(evt) {
                // set sketch
                sketch = evt.feature;

                /** @type {ol.Coordinate|undefined} */
                var tooltipCoord = evt.coordinate;

                listener = sketch.getGeometry().on('change', function(evt) {
                    var geom = evt.target;
                    var output;
                    if (geom instanceof ol.geom.Polygon) {
                        output = formatArea(geom);
                        tooltipCoord = geom.getInteriorPoint().getCoordinates();
                    } else if (geom instanceof ol.geom.LineString) {
                        output = formatLength(geom);
                        tooltipCoord = geom.getLastCoordinate();
                    }
                    measureTooltipElement.innerHTML = output;
                    measureTooltip.setPosition(tooltipCoord);
                });
            }, this);

        draw.on('drawend',
            function() {
                measureTooltipElement.className = 'tooltip tooltip-static';
                measureTooltip.setOffset([0, -7]);
                // unset sketch
                sketch = null;
                // unset tooltip so that a new one can be created
                measureTooltipElement = null;
                createMeasureTooltip();
                ol.Observable.unByKey(listener);
            }, this);
    }


    /**
     * Creates a new help tooltip
     */
    function createHelpTooltip() {
        if (helpTooltipElement) {
            helpTooltipElement.parentNode.removeChild(helpTooltipElement);
        }
        helpTooltipElement = document.createElement('div');
        helpTooltipElement.className = 'tooltip hidden';
        helpTooltip = new ol.Overlay({
            element: helpTooltipElement,
            offset: [15, 0],
            positioning: 'center-left'
        });
        map.addOverlay(helpTooltip);
    }


    /**
     * Creates a new measure tooltip
     */
    function createMeasureTooltip() {
        if (measureTooltipElement) {
            measureTooltipElement.parentNode.removeChild(measureTooltipElement);
        }
        measureTooltipElement = document.createElement('div');
        measureTooltipElement.className = 'tooltip tooltip-measure';
        measureTooltip = new ol.Overlay({
            element: measureTooltipElement,
            offset: [0, -15],
            positioning: 'bottom-center'
        });
        map.addOverlay(measureTooltip);
    }


    /**
     * Let user change the geometry type.
     */
    typeSelect.onchange = function() {
        map.removeInteraction(draw);
        addInteraction();
    };

    addInteraction();

    var dims = {
        a0: [1189, 841],
        a1: [841, 594],
        a2: [594, 420],
        a3: [420, 297],
        a4: [297, 210],
        a5: [210, 148]
    };

    var loading = 0;
    var loaded = 0;

    /*var exportButton = document.getElementById('export-pdf');

    exportButton.addEventListener('click', function() {

        exportButton.disabled = true;
        document.body.style.cursor = 'progress';

        var format = document.getElementById('format').value;
        var resolution = document.getElementById('resolution').value;
        var dim = dims[format];
        var width = Math.round(dim[0] * resolution / 25.4);
        var height = Math.round(dim[1] * resolution / 25.4);
        var size = /** @type {ol.Size} */ (map.getSize());
    /*var extent = map.getView().calculateExtent(size);

    var source = new ol.source.OSM();

    var tileLoadStart = function() {
        ++loading;
    };

    var tileLoadEnd = function() {
        ++loaded;
        if (loading === loaded) {
            var canvas = this;
            window.setTimeout(function() {
                loading = 0;
                loaded = 0;
                var data = canvas.toDataURL('image/png');
                var pdf = new jsPDF('landscape', undefined, format);
                pdf.addImage(data, 'JPEG', 0, 0, dim[0], dim[1]);
                pdf.save('map.pdf');
                source.un('tileloadstart', tileLoadStart);
                source.un('tileloadend', tileLoadEnd, canvas);
                source.un('tileloaderror', tileLoadEnd, canvas);
                map.setSize(size);
                map.getView().fit(extent, size);
                map.renderSync();
                exportButton.disabled = false;
                document.body.style.cursor = 'auto';
            }, 100);
        }
    };

    map.once('postcompose', function(event) {
        source.on('tileloadstart', tileLoadStart);
        source.on('tileloadend', tileLoadEnd, event.context.canvas);
        source.on('tileloaderror', tileLoadEnd, event.context.canvas);
    });

    map.setSize([width, height]);
    map.getView().fit(extent, /** @type {ol.Size} */ /*(map.getSize()));
            map.renderSync();

        }, false);*/





    var layerSwitcher = new ol.control.LayerSwitcher({
        tipLabel: 'Légende' // Optional label for button
    });
    map.addControl(layerSwitcher);









    var
        container = document.getElementById('popup'),
        content_element = document.getElementById('popup-content'),
        closer = document.getElementById('popup-closer');

    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };
    var overlay = new ol.Overlay({
        element: container,
        autoPan: true,
        offset: [0, -10]
    });

    map.addOverlay(overlay);
    map.on('dblclick', function(evt)
    {
        evt.preventDefault();
        if(evt.originalEvent.ctrlKey){
            var feature = map.forEachFeatureAtPixel(evt.pixel,
                function(feature, layer) {

                    return feature;
                });

            if (feature) {
                var geometry = feature.getGeometry();
                var coord = geometry.getCoordinates();
                var content;
                if(feature.get('NUM_REG')!=undefined)
                {
                    content = '<h5>' + feature.get('NOM_REG') +  '</h5>' ;
                    content += '<h5>' +"Num: " + feature.get('NUM_REG') + '</h5>';
                    content += '<h5>' + "Clas_Dens: "+feature.get('CLAS_DENS') + '</h5>';
                    content+='<h5>' + "Densite: "+feature.get('DENSITE') + '</h5>';
                    content += "<button "+ "onclick=init("+"'assets/Geojson/Reg/Region.geojson'"+")"+">"+"To XML"+"</button>";

                }
                if(feature.get('NOM_PROV')!=undefined)
                {
                    content = '<h5>' + feature.get('NOM_PROV') +  '</h5>' ;
                    content+='<h5>' + "Code: "+feature.get('CODE_PROVI') + '</h5>';
                    content += '<h5>' +"Population: " + feature.get('POPULATION') + '</h5>';
                    content += '<h5>' + "Nombre DE: "+feature.get('NOMBRE_DE_') + '</h5>';
                    content += "<button "+ "onclick=init("+"'assets/Geojson/Pov/pov.geojson'"+")"+">"+"To XML"+"</button>";
                }
                if(feature.get('NOM')!=undefined)
                {
                    content='<h5>' + "Nom: "+feature.get('NOM') + '</h5>';
                    content += "<button "+ "onclick=init("+"'assets/Geojson/Pov/loc.geojson'"+")"+">"+"To XML"+"</button>";
                }
                if(feature.get('Dens04')!=undefined)
                {
                    content = '<h5>' +"Non Com: "+ feature.get('NOM_COMMUN') +  '</h5>' ;
                    content+='<h5>' + "Population: "+feature.get('POP04') + '</h5>';
                    content += '<h5>' +"Nbr Menage: " + feature.get('MEN04') + '</h5>';
                    content += '<h5>' + "Densite: "+feature.get('Den04') + '</h5>';
                    content += "<button "+ "onclick=init("+"'assets/Geojson/Com/Communes.geojson'"+")"+">"+"To XML"+"</button>";
                }
                if(feature.get('pauv2014_T')!=undefined)
                {
                    content='<h5>' + "Taux de pauvrete: "+feature.get('pauv2014_T') + '</h5>';
                    var link=value.value;
                    var stopp=link.indexOf("wms");
                    link=link.substring(0,stopp);
                    link+="ows?service=WFS&version=1.0.0&request=GetFeature&typeName="+res2+"%3A"+name.value+"&maxFeatures=50&outputFormat=application%2Fjson";
                    content += "<button "+ "onclick=init("+link+")"+">"+"To XML"+"</button>";
                }


                content_element.innerHTML = content;
                overlay.setPosition(coord);

                console.info(feature);
            }
        }});
    map.on('pointermove', function(e) {

        if (e.dragging) return;

        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);

        map.getTarget().style.cursor = hit ? 'pointer' : '';
    });





    function dataURIToBlob(dataURI) {

        var binStr = atob(dataURI.split(',')[1]),
            len = binStr.length,
            arr = new Uint8Array(len),
            mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

        for (var i = 0; i < len; i++) {
            arr[i] = binStr.charCodeAt(i);
        }

        return new Blob([arr], {
            type: mimeString
        });

    }

    var geoj='assets/Geojson/Reg/Region.geojson';
    function loadJSON(callback,file) {
        var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/geo+json");
        xobj.open('GET',file , true);
        xobj.onreadystatechange = function () {
            if (xobj.readyState == 4 && xobj.status == "200") {
                callback(xobj.responseText);
            }
        };
        xobj.send(null);
    }
    function init(file) {
        loadJSON(function(response) {
            var actual_JSON = JSON.parse(response);
            var hidden=document.createElement('a');
            blob=new Blob([json2xml(actual_JSON,"\r\n\t")],{type:"octet/stream"});
            var url=window.URL.createObjectURL(blob);
            hidden.href=url;
            hidden.target='_blank';
            hidden.download='MyFile.txt';
            hidden.click();
            window.URL.revokeObjectURL(url);

        },file);
    }


    function json2xml(o, tab) {
        var toXml = function(v, name, ind) {
            ind="\t";
            if (name != 'coordinates') {
                var xml = "";
                if (v instanceof Array) {
                    for (var i=0, n=v.length; i<n; i++)
                        xml += ind + toXml(v[i], name, ind+"\t") + "\n";
                }
                else if (typeof(v) == "object") {
                    var hasChild = false;
                    xml += ind + "<" + name;
                    for (var m in v) {
                        if (m.charAt(0) == "@")
                            xml += " " + m.substr(1) + "=\"" + v[m].toString() + "\"";
                        else
                            hasChild = true;
                    }
                    xml += hasChild ? ">" : "/>";
                    if (hasChild) {
                        for (var m in v) {
                            if (m == "#text")
                                xml += v[m];
                            else if (m == "#cdata")
                                xml += "<![CDATA[" + v[m] + "]]>";
                            else if (m.charAt(0) != "@")
                                xml += toXml(v[m], m, ind+"\t");
                        }
                        xml += (xml.charAt(xml.length-1)=="\n"?ind:"") + "</" + name + ">";
                    }
                }
                else {
                    xml += ind + "<" + name + ">" + v.toString() +  "</" + name + ">";
                }
                return xml;
            }}, xml="";
        var xmlf="<"+"?"+"xml version='1.0' encoding='UTF-8'"+"?"+">"+"\r\n"+"<"+"root"+">";
        xml=xmlf+xml;
        for (var m in o)
            xml += toXml(o[m], m, "");
        xml+= "<"+"/root"+">";
        return tab ? xml.replace(/\t/g, tab) : xml.replace(/\t|\n/g, "");
    };

</script>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>