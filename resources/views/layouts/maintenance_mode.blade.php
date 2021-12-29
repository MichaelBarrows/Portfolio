<!DOCTYPE html>
<html>
    <head>
        <title>Michael Barrows</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                background-color: #333;
                padding: 0;
                margin: 0;
                font-family: 'Raleway', sans-serif;
            }
            body div.hex-bg-container {
                width: 100vw;
                min-height: 100vh;
                background: center url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(40, 40, 40)' viewBox='0 0 100 169.5'%3E%3Cpolygon points='50,34.75 93.5,59.75 93.5,109.75 50,134.75 6.5,109.75 6.5,59.75'%3E%3C/polygon%3E%3Cpolygon points='0,-50 43.5,-25 43.5,25 0,50 -43.5,25 -43.5,-25'%3E%3C/polygon%3E%3Cpolygon points='100,-50 143.5,-25 143.5,25 100,50 56.5,25 56.5,-25'%3E%3C/polygon%3E%3Cpolygon points='0,119.5 43.5,144.5 43.5,194.5 0,219.5 -43.5,194.5 -43.5,144.5'%3E%3C/polygon%3E%3Cpolygon points='100,119.5 143.5,144.5 143.5,194.5 100,219.5 56.5,194.5 56.5,144.5'%3E%3C/polygon%3E%3C/svg%3E");
                background-size: 25px;
                background-attachment: fixed;
                -webkit-background-attachment: fixed;
                -moz-background-attachment: fixed;
                -o-background-attachment: fixed;
            }
            .container {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 100vw;
            }
            @media only screen and (max-device-width: 800px) {
                .container .semi-transparent-blue {
                    background-color: #0099CC;
                    opacity: 0.75;
                    max-width: 100vw;
                }
            }
            .container .semi-transparent-blue {
                background-color: #0099CC;
                opacity: 0.75;
                padding: 7.5vw;
                max-width: 100vw;
            }
            h1 {
                text-align:center;
                color: #333333;
                font-size: 3em;
                margin: 0;
            }
            h2 {
                text-align: center;
                color: #CCCCCC;
                font-size: 1.75em;
            }
            .links {
                display: block;
                margin-top: 20px;
                text-align: center;
            }
            a:link, a:visited {
                padding: 10px;
                margin: 10px;
                border: 3px solid #333333;
                border-radius: 5px;
                color: #333333;
                font-weight: 700;
                text-decoration: none;
                display: inline-block;
            }
            a:hover, a:active {
                background-color: #333333;
                color: #0099CC;
            }
        </style>
    </head>
    <body>
        <div class="hex-bg-container">
            <div class="container">
                <div class="semi-transparent-blue">
                    <h1>Michael Barrows</h1>
                    <h2>Come back soon!</h2>
                    <div class="links">
                        <a href="{{ \App\Models\SiteSetting::GITHUB_URL }}" target="_blank">GitHub</a>
                        <a href="{{ \App\Models\SiteSetting::LINKEDIN_URL }}" target="_blank">LinkedIn</a>
                        <a href="mailto:contact@michaelbarrows.com">contact@michaelbarrows.com</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
