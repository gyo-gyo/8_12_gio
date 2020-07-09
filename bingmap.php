<?php
session_start();
include('functions.php');
// 関数ファイル読み込み  
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>BING MAPS SNS
    </title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            padding: 0;
            margin: 0;
            background: #333;
        }

        header {
            height: 50px;
            color: red;
            text-align: center;
            background-color: white;

        }

        h1 {
            padding: 0;
            margin: 0;
            font-size: 50%;
            color: white;
        }

        p {
            margin: 0
        }



        button {
            width: 60px;
            height: 60px;
            background-color: #0B6125;
            color: white;
        }

        #inputForm {
            position: absolute;
            top: 200px;
            left: 250px;
            padding: 10px;
            background-color: white;
            border: 1px solid #000;
            border-radius: 10px;
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
    <div id="myMap" style="width:100%;height:98%;"></div>
    <div id="inputForm" style="display:none;">
        <table>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input id="titleTbx" type="text" /></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input id="descriptionTbx" type="text" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="Save" onclick="saveData()" style="float:right;" /></td>
            </tr>
        </table>
    </div>
    <!-- MAP[END] -->


    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AsE6MP5LI_-oz488txR7bhIZsd9jdbqR1qYg4CI5v0bn6MwSd34ya8t24Q8Ws3By' async defer></script>
    <script>
        let map, infobox, currentPushpin;

        function GetMap() {
            map = new Microsoft.Maps.Map('#myMap', {});
            //Add a click event to the map.
            Microsoft.Maps.Events.addHandler(map, 'click', mapClicked);
            //Create an infobox, but hide it. We can reuse it for each pushpin.
            infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
                visible: false
            });
            infobox.setMap(map);
        }

        function mapClicked(e) {
            //Create a pushpin.
            currentPushpin = new Microsoft.Maps.Pushpin(e.location);
            //Add a click event to the pushpin.
            Microsoft.Maps.Events.addHandler(currentPushpin, 'click', pushpinClicked);
            //Add the pushpin to the map.
            map.entities.push(currentPushpin);
            //Open up an input form here the user can enter in details for pushpin.
            document.getElementById('inputForm').style.display = '';
        }

        function saveData() {
            //Get the data from form and add it to the pushpin
            currentPushpin.metadata = {
                title: document.getElementById('titleTbx').value,
                description: document.getElementById('descriptionTbx').value
            };
            //Optionally save this data somewhere (like a database or local storage).

            //Clear the fields in the form and then hide the form.
            document.getElementById('titleTbx').value = '';
            document.getElementById('descriptionTbx').value = '';
            document.getElementById('inputForm').style.display = 'none';
        }

        function pushpinClicked(e) {
            if (e.target.metadata) {
                infobox.setOptions({
                    location: e.target.getLocation(),
                    title: e.target.metadata.title,
                    description: e.target.metadata.description,
                    visible: true
                });
            }
        }
    </script>
</body>

</html>