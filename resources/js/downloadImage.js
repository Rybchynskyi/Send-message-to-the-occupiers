document.getElementById('convert').addEventListener('click', render);

function render(){
    html2canvas(document.getElementById('certificate'), {
        windowWidth: 1250,
    }).then(function(canvas) {
        saveAs(canvas.toDataURL(), 'certificate.png');
    });
}

function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}
