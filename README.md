# symfony4-horus-test


 create 2 models/classes : done
 2 methods implemented:

I.) calculate surface  : setSurface

II.) calculate diameter : setDiameter

- created routes:  TriangleController and CircleController both have its own routes.


json responses : 

1. endPoint : api/triangle/30/40/50

{
    "success": true,
    "data": {
        "descripcion": "this is nice triangle",
        "lado_a": "30",
        "lado_b": "40",
        "lado_c": "50",
        "area_surface": "600",
        "perimeter": "110"
    }
}

2. endPoint : /api/circle/8

{
    "success": true,
    "data": {
        "descripcion": "this is nice circulo",
        "radius": "8",
        "diameter": "16",
        "area_surface": "201.056",
        "perimeter_cirfumference": "50.264"
    }
}

3. endPoint : api/triangle/sumareas




{
    "succes": true,
    "sum_areas": 606
}




 -implement method for sum of areas for two given objects : take a lood at CircleService
 

- implement method for sum of diameters for two given objects : done , take a look at TriangleService
