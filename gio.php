<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BING MAPS SNS</title>
    <style>
        html,
        body {
            height: 100%;
            color: white;
        }

        body {
            padding: 0;
            margin: 0;
            background: #333;
        }

        h1 {
            padding: 0;
            margin: 0;
            font-size: 50%;
            color: white;
        }

        #address {
            overflow: auto;
            height: 100%;
        }

        #address div {
            border-bottom: 1px solid #888;
            font-size: 12px;
        }

        #view_area {
            float: left;
            color: #fff;
            width: 27%;
            margin-left: 20px;
        }
    </style>
</head>

<body>

    <header>BING MAPS SNS</header>
    <div style="
            text-align: right;
            background-color: white;">
        <a href="todo_logout.php">logout</a></div>
    <!-- MAP[START] -->
    <div id="myMap" style="position:relative;float:left;width:70%;height:98%;"></div>
    <form action="gio_create.php" method="POST">
        <div id="view_area">
            <h3>Reverse Geocode(Event:Click!)</h3>

            <p id="loclng">
                <p id="address"></p>
            </p>
        </div>
        <div id="inputForm" style="display:none;">

            <table>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td id="loclng">
                    <td id="address"></td>
                    </td>
                </tr>


                <div>
                    Title: <input id="title" type="text" name="title">
                </div>
                <div>
                    Description: <input id="text" type="text" name="text">
                </div>
                <div>
                    <button>submit</button>
                </div>
                <!-- <tr>
                        <td>Title</td>
                        <td><input id="title" type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input id="text" type="text" name="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button onclick="saveData()" style="float:right;">submit</button></td>
                        <input type="button" value="Save" onclick="saveData()" style="float:right;" /> 
                    </tr> -->
    </form>
    </table>
    </div>
    <!-- MAP[END] -->


    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AsE6MP5LI_-oz488txR7bhIZsd9jdbqR1qYg4CI5v0bn6MwSd34ya8t24Q8Ws3By' async defer></script>
    <script>
        //Reverse Geocode
        let map, searchManager, loc, i = 0;

        function GetMap() {
            map = new Microsoft.Maps.Map('#myMap', {});



            //Make a request to reverse geocode the center of the map.
            // loc = map.getCenter();
            // reverseGeocode();

            //Map Change Event add.
            Microsoft.Maps.Events.addHandler(map, 'click', function(e) {
                loc = e.location;
                reverseGeocode(); //Reverse Geocode


                currentPushpin = new Microsoft.Maps.Pushpin(e.location);
                //Add a click event to the pushpin.
                Microsoft.Maps.Events.addHandler(currentPushpin, 'click', pushpinClicked);
                //Add the pushpin to the map.
                map.entities.push(currentPushpin);
                //Open up an input form here the user can enter in details for pushpin.
                document.getElementById('inputForm').style.display = '';
            });
            infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
                visible: false
            });
            infobox.setMap(map)
        }

        function reverseGeocode() {
            //If search manager is not defined, load the search module.
            if (!searchManager) {
                //Create an instance of the search manager and call the reverseGeocode function again.
                Microsoft.Maps.loadModule('Microsoft.Maps.Search', function() {
                    searchManager = new Microsoft.Maps.Search.SearchManager(map);
                    reverseGeocode();
                });
            } else {
                // const loc = loc;
                const searchRequest = {
                    location: loc,
                    callback: function(r) {
                        //Create custom Pushpin
                        let pin = new Microsoft.Maps.Pushpin(loc, {
                            // title: r.name, //PushPin:title
                            // //subTitle: loc,     //PushPin:subtitle
                            // text: `${++i}` //PushPin:text
                        });
                        map.entities.push(pin); //Add pushPin

                        //data is #address.
                        const place = document.createElement("input"); //create "DIV"
                        place.setAttribute("type", "text");
                        element.name = "place";
                        input1.setAttribute("value", ` (${i}) ${r.name}  ${loc}`);
                        // place.innerText = `(${i}) ${r.name}  ${loc}`; //Create "html or text"
                        document.querySelector("#address").insertBefore(place, document.querySelector("#address").firstElementChild); //prepend
                    },
                    errorCallback: function(e) {
                        //If there is an error, alert the user about it.
                        alert("Unable to reverse geocode location.");
                    }
                };
                //Make the reverse geocode request.
                searchManager.reverseGeocode(searchRequest);
            }
        }

        function saveData() {
            //Get the data from form and add it to the pushpin
            currentPushpin.metadata = {
                title: document.getElementById('title').value,
                text: document.getElementById('text').value
            };
            //Optionally save this data somewhere (like a database or local storage).

            //Clear the fields in the form and then hide the form.
            document.getElementById('title').value = '';
            document.getElementById('text').value = '';
            document.getElementById('inputForm').style.display = 'none';
        }

        function pushpinClicked(e) {
            if (e.target.metadata) {
                infobox.setOptions({
                    location: e.target.getLocation(),
                    title: e.target.metadata.title,
                    description: e.target.metadata.text,
                    visible: true
                });
            }
        }
    </script>
</body>

</html>