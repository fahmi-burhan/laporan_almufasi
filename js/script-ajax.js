// Firstlyy, Sincerely
console.log("Created by Fahmi Burhan");


// Get document object
var gantiBulan = document.getElementsByClassName("edit-bulan-btn");
var container = document.getElementById("edit-container");


// MaKe eventlistener
for ( i = 0; i < gantiBulan.length; i++) {
    gantiBulan[i].addEventListener("click", function() {
        console.log(gantiBulan[i].value);

        // Make Ajax object
        var xhr = new XMLHttpRequest();
        
        // Check is Ajax ready
        xhr.onreadystatechange = function() {
            if ( xhr.readyState == 4 && xhr.status == 200 ) {
                container.innerHTML = xhr.responseText;
            }
        }

        // Execute Ajax
        xhr.open( 'GET', 'ajax.php?bulan=' + gantiBulan[i].value, true);
        xhr.send();


    });
}