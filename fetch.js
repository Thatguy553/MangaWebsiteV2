//fetch('/../api/series/display.api.php')
//    .then(function (data) {
//        console.log(data)
//    })
async function call() {
    fetch('/../api/series/display.api.php')
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Something went wrong.");
            }
        })
        .then(data => {
            // 0th index
            let seriesUid = data[0].seriesUID;
            console.log(data);
            // do something with it
            data.forEach(Display);
            function Display(item) {
                // Find a <table> element with id="myTable":
                var table = document.getElementById("Series");

                // Create an empty <tr> element and add it to the 1st position of the table:
                var row = table.insertRow(1);

                // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                // Add some text to the new cells:
                cell1.innerHTML = item.seriesUID;
                cell2.innerHTML = item.seriesTitle;
                cell3.innerHTML = item.seriesDescription;
                cell4.innerHTML = "<button id='delete' value='" + item.seriesUID + "'>Delete</button>";
            }
            //document.getElementById("Series").innerHTML = seriesTitle;
        })
        .catch(error => {
            console.error(error);
        })
}

document.getElementById('delete').addEventListener("click", uploadImage);
function uploadImage() {
    var xhr = new XMLHttpRequest();
    xhr.setRequestHeader("Content-type", "multipart/form-data");

    xhr.open("POST", "/upload.php", true);
    xhr.setRequestHeader("Content-type", "image");

    var file = document.getElementById('delete').files[0];
    if (file) {
        var formdata = new FormData();
        formdata.append("pic", file);
        xhr.send(formdata);
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //some code
            document.getElementById('delete').innerHTML = "Changed";
        }
    };
}