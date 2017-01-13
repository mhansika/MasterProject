<html>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }
            [class*="col-"] {
                float: left;
                padding: 15px;
                border: 1px solid red;
            }
            .row::after {
                content: "";
                clear: both;
                display: table;
            }
            .img {
                max-width: 100%;
                height: auto;
            }
            @media only screen and (max-width: 768px) {
                /* For mobile phones: */
                [class*="col-"] {
                    width: 100%;
                }
            }
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}
        </style>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
    <div class="row">
        <div class="col-9 img">
        <img src="img/bbb.png">
        </div>
        <div class="col-9 p">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
        </div>
    </div>
    </body>
</html>